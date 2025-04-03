<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250403022045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE "car_accounts" (
              id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
              pseudo VARCHAR(50) NOT NULL,
              password VARCHAR(255) NOT NULL,
              email VARCHAR(50) NOT NULL,
              roles CLOB NOT NULL --(DC2Type:json)
              ,
              secret_question VARCHAR(100) DEFAULT NULL,
              secret_answer VARCHAR(100) DEFAULT NULL,
              account_access INTEGER DEFAULT NULL,
              account_status INTEGER DEFAULT NULL,
              account_reason VARCHAR(100) DEFAULT NULL,
              account_last_action DATETIME DEFAULT NULL,
              account_last_connection DATETIME DEFAULT NULL,
              account_last_ip VARCHAR(100) DEFAULT NULL
            )
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX idx_car_accounts_pseudo ON "car_accounts" (email)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE "car_accounts"
        SQL);
    }
}
