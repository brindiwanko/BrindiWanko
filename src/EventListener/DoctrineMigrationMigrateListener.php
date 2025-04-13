<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Event\ConsoleErrorEvent;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Lock\Exception\LockAcquiringException;
use Symfony\Component\Lock\LockFactory;
use Symfony\Component\Lock\LockInterface;

class DoctrineMigrationMigrateListener
{
    private ?LockInterface $migrationLock = null;
    private ?LockInterface $maintenanceLock = null;

    public function __construct(
        private LockFactory $lockFactory,
    ) {
    }

    #[AsEventListener(
        event: ConsoleEvents::COMMAND,
        priority: 300,
    )]
    public function onStartConsoleCommand(ConsoleCommandEvent $event): void
    {
        if (!$this->isMigrateCommand($event)) {
            return;
        }

        $io = $this->makeSymfonyStyle($event);

        if ($this->isMigrating($io)) {
            $event->disableCommand();
        }

        $this->startMigration($io);
        $this->processPendingMigrations($io);
    }

    #[AsEventListener(
        event: ConsoleEvents::TERMINATE,
        priority: -1,
    )]
    public function onEndConsoleCommand(ConsoleTerminateEvent $event): void
    {
        if (!$this->isMigrateCommand($event)) {
            return;
        }

        $io = $this->makeSymfonyStyle($event);

        $this->releaseMigrationLockAfterMigration($io);
        $this->releaseMaintenanceLockAfterMigration($io);
    }

    #[AsEventListener(
        event: ConsoleEvents::ERROR,
        priority: -1,
    )]
    public function onErrorCommand(ConsoleErrorEvent $event): void
    {
        if (!$this->isMigrateCommand($event)) {
            return;
        }

        $io = $this->makeSymfonyStyle($event);

        $this->releaseMigrationLockAfterMigration($io);
    }

    protected function isMigrateCommand($event): bool
    {
        $command = $event->getCommand();

        return null !== $command
            && method_exists($command, 'getName')
            && (
                'doctrine:migrations:migrate' == $command->getName()
                || 'doctrine:fixtures:load' == $command->getName()
            );
    }

    protected function isMigrating(SymfonyStyle $io): bool
    {
        try {
            $this->migrationLock = $this->lockFactory->createLock('app.lock_migration', 60);
            if (!$this->migrationLock->acquire()) {
                $io->success('Another instance locked the doctrine command process.');

                return true;
            }
        } catch (LockAcquiringException $e) {
            $io->error('Failed to acquire doctrine command lock: ' . $e->getMessage());

            return true;
        }

        return false;
    }

    protected function processPendingMigrations(SymfonyStyle $io): void
    {
        $io->note('Enabling maintenance mode...');

        try {
            $this->maintenanceLock = $this->lockFactory->createLock('app.maintenance_mode', 60);
            if (!$this->maintenanceLock->acquire()) {
                $io->warning('Failed to enable maintenance mode. Another process is already holding the lock.');
                return;
            }

            $io->success('Maintenance mode enabled.');
        } catch (LockAcquiringException $e) {
            $io->error('Failed to acquire maintenance lock: ' . $e->getMessage());
        }
    }

    protected function startMigration(SymfonyStyle $io): void
    {
        $this->migrationLock->acquire();

        $io->success('Lock doctrine command obtained.');
    }

    protected function releaseMaintenanceLockAfterMigration(SymfonyStyle $io): void
    {
        $io->note('Disabling maintenance mode...');

        try {
            $maintenanceLock = $this->lockFactory->createLock('app.maintenance_mode');
            if ($maintenanceLock->isAcquired()) {
                $maintenanceLock->release();
                $io->success('Maintenance mode disabled.');
            }
        } catch (\Exception $e) {
            $io->error('Failed to release maintenance lock: ' . $e->getMessage());
        }
    }

    protected function releaseMigrationLockAfterMigration(SymfonyStyle $io)
    {
        if ($this->migrationLock && $this->migrationLock->isAcquired()) {
            $this->migrationLock->release();
            $io->success('Lock doctrine command released.');
        }
    }

    protected function makeSymfonyStyle($event): SymfonyStyle
    {
        return new SymfonyStyle(
            $event->getInput(),
            $event->getOutput()
        );
    }
}
