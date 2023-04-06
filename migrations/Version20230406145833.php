<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230406145833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create task';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, description CLOB NOT NULL, CONSTRAINT FK_527EDB25F675F31B FOREIGN KEY (author_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_527EDB25F675F31B ON task (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE task');
    }
}
