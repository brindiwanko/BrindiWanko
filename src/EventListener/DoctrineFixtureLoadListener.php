<?php

declare(strict_types=1);

namespace App\EventListener;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Event\ConsoleErrorEvent;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

class DoctrineFixtureLoadListener
{
    protected object $connection;

    public function __construct(
        protected EntityManagerInterface $entityManager,
    ) {
        $this->connection = $this->entityManager->getConnection()->getNativeConnection();
    }

    #[AsEventListener(
        event: ConsoleEvents::COMMAND,
        priority: 300,
    )]
    public function onStartConsoleCommand(ConsoleCommandEvent $event): void
    {
        if (!$this->isFixtureCommand($event)) {
            return;
        }

        if ($this->isMySQL()) {
            $io = $this->makeSymfonyStyle($event);
            $this->disableForeignKeyCheck($io);
        }
    }

    #[AsEventListener(
        event: ConsoleEvents::TERMINATE,
        priority: -1,
    )]
    public function onEndConsoleCommand(ConsoleTerminateEvent $event): void
    {
        if (!$this->isFixtureCommand($event)) {
            return;
        }

        if ($this->isMySQL()) {
            $io = $this->makeSymfonyStyle($event);
            $this->enableForeignKeyCheck($io);
        }
    }

    #[AsEventListener(
        event: ConsoleEvents::ERROR,
        priority: -1,
    )]
    public function onErrorCommand(ConsoleErrorEvent $event): void
    {
        if (!$this->isFixtureCommand($event)) {
            return;
        }

        if ($this->isMySQL()) {
            $io = $this->makeSymfonyStyle($event);
            $this->enableForeignKeyCheck($io);
        }
    }

    protected function disableForeignKeyCheck(SymfonyStyle $io): void
    {
        $this->connection->exec('SET FOREIGN_KEY_CHECKS = 0');
        $io->note('Disabled foreign key check.');
    }

    protected function enableForeignKeyCheck(SymfonyStyle $io): void
    {
        $this->connection->exec('SET FOREIGN_KEY_CHECKS = 1');
        $io->success('Enabled foreign key check.');
    }

    protected function isFixtureCommand($event): bool
    {
        $command = $event->getCommand();

        return null !== $command
            && method_exists($command, 'getName')
            && 'doctrine:fixtures:load' == $command->getName();
    }

    protected function makeSymfonyStyle($event): SymfonyStyle
    {
        return new SymfonyStyle(
            $event->getInput(),
            $event->getOutput()
        );
    }

    protected function isMySQL(): bool
    {
        return $this->entityManager->getConnection()->getDatabasePlatform() instanceof MySQLPlatform;
    }
}
