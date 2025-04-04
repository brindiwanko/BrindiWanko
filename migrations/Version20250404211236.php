<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250404211236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE car_characters (user_id INTEGER NOT NULL, characterId INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, picture VARCHAR(50) NOT NULL, name VARCHAR(30) NOT NULL, level INTEGER NOT NULL, sex INTEGER NOT NULL, hp_min INTEGER NOT NULL, hp_max INTEGER NOT NULL, hp_skill_points INTEGER NOT NULL, hp_bonus INTEGER NOT NULL, hp_equipments INTEGER NOT NULL, hp_guild INTEGER NOT NULL, hp_total INTEGER NOT NULL, mp_min INTEGER NOT NULL, mp_max INTEGER NOT NULL, mp_skill_points INTEGER NOT NULL, mp_bonus INTEGER NOT NULL, mp_equipments INTEGER NOT NULL, mp_guild INTEGER NOT NULL, mp_total INTEGER NOT NULL, strength INTEGER NOT NULL, strength_skill_points INTEGER NOT NULL, strength_bonus INTEGER NOT NULL, strength_equipments INTEGER NOT NULL, strength_guild INTEGER NOT NULL, strength_total INTEGER NOT NULL, magic INTEGER NOT NULL, magic_skill_points INTEGER NOT NULL, magic_bonus INTEGER NOT NULL, magic_equipments INTEGER NOT NULL, magic_guild INTEGER NOT NULL, magic_total INTEGER NOT NULL, agility INTEGER NOT NULL, agility_skill_points INTEGER NOT NULL, agility_bonus INTEGER NOT NULL, agility_equipments INTEGER NOT NULL, agility_guild INTEGER NOT NULL, agility_total INTEGER NOT NULL, defense INTEGER NOT NULL, defense_skill_points INTEGER NOT NULL, defense_bonus INTEGER NOT NULL, defense_equipments INTEGER NOT NULL, defense_guild INTEGER NOT NULL, defense_total INTEGER NOT NULL, defense_magic INTEGER NOT NULL, defense_magic_skill_points INTEGER NOT NULL, defense_magic_bonus INTEGER NOT NULL, defense_magic_equipments INTEGER NOT NULL, defense_magic_guild INTEGER NOT NULL, defense_magic_total INTEGER NOT NULL, wisdom INTEGER NOT NULL, wisdom_skill_points INTEGER NOT NULL, wisdom_bonus INTEGER NOT NULL, wisdom_equipments INTEGER NOT NULL, wisdom_guild INTEGER NOT NULL, wisdom_total INTEGER NOT NULL, prospecting INTEGER NOT NULL, prospecting_skill_points INTEGER NOT NULL, prospecting_bonus INTEGER NOT NULL, prospecting_equipments INTEGER NOT NULL, prospecting_guild INTEGER NOT NULL, prospecting_total INTEGER NOT NULL, arena_defeate INTEGER NOT NULL, arena_victory INTEGER NOT NULL, experience INTEGER NOT NULL, experience_total INTEGER NOT NULL, skill_points INTEGER NOT NULL, gold INTEGER NOT NULL, chapter INTEGER NOT NULL, on_battle INTEGER NOT NULL, enable INTEGER NOT NULL, CONSTRAINT FK_8F6CF1FA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8F6CF1FA76ED395 ON car_characters (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
            , password VARCHAR(255) NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON users (email)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
            )
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE car_characters
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE users
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
