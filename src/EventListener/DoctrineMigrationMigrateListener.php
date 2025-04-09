<?php

declare(strict_types=1);

namespace App\EventListener;

use Psr\Cache\CacheItemPoolInterface;
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

    public function __construct(
        private CacheItemPoolInterface $cache,
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
            && 'doctrine:migrations:migrate' == $command->getName();
    }

    protected function isMigrating(SymfonyStyle $io): bool
    {
        try {
            $this->migrationLock = $this->lockFactory->createLock('app.lock_migration', 60);
            if (!$this->migrationLock->acquire()) {
                $io->success('Another instance locked the migration process.');

                return true;
            }
        } catch (LockAcquiringException $e) {
            $io->error('Failed to acquire migration lock: ' . $e->getMessage());

            return true;
        }

        return false;
    }

    protected function processPendingMigrations(SymfonyStyle $io): void
    {
        $io->note('Enabling maintenance mode...');

        $cacheItem = $this->cache->getItem('app.maintenance_mode');
        $cacheItem->set('1');
        $cacheItem->expiresAfter(60);
        $this->cache->save($cacheItem);

        $io->success('Maintenance enabled.');
    }

    protected function startMigration(SymfonyStyle $io): void
    {
        $cacheItem = $this->cache->getItem('app.lock_migration');
        $cacheItem->set('1');
        $cacheItem->expiresAfter(60);
        $this->cache->save($cacheItem);

        $io->success('Lock migration obtained.');
    }

    protected function releaseMaintenanceLockAfterMigration(SymfonyStyle $io)
    {
        $io->note('Disabling maintenance mode...');
        $this->cache->deleteItem('app.maintenance_mode');
        $io->success('Maintenance mode disabled.');
    }

    protected function releaseMigrationLockAfterMigration(SymfonyStyle $io)
    {
        if ($this->migrationLock && $this->migrationLock->isAcquired()) {
            $this->migrationLock->release();
            $io->success('Lock migration released.');
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
