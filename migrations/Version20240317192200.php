<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240317192200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE song (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, artist VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__radio AS SELECT id, name, logo, url, color, types FROM radio');
        $this->addSql('DROP TABLE radio');
        $this->addSql('CREATE TABLE radio (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, types CLOB DEFAULT NULL --(DC2Type:json)
        )');
        $this->addSql('INSERT INTO radio (id, name, logo, url, color, types) SELECT id, name, logo, url, color, types FROM __temp__radio');
        $this->addSql('DROP TABLE __temp__radio');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE song');
        $this->addSql('CREATE TEMPORARY TABLE __temp__radio AS SELECT id, name, logo, url, color, types FROM radio');
        $this->addSql('DROP TABLE radio');
        $this->addSql('CREATE TABLE radio (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, types CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO radio (id, name, logo, url, color, types) SELECT id, name, logo, url, color, types FROM __temp__radio');
        $this->addSql('DROP TABLE __temp__radio');
    }
}
