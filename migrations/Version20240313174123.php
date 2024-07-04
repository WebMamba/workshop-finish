<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313174123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE radio ADD COLUMN color VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE radio ADD COLUMN types CLOB DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__radio AS SELECT id, name, logo, url FROM radio');
        $this->addSql('DROP TABLE radio');
        $this->addSql('CREATE TABLE radio (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO radio (id, name, logo, url) SELECT id, name, logo, url FROM __temp__radio');
        $this->addSql('DROP TABLE __temp__radio');
    }
}
