<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210313202338 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE palestra ADD evento_id INT NOT NULL');
        $this->addSql('ALTER TABLE palestra ADD CONSTRAINT FK_C799BBF087A5F842 FOREIGN KEY (evento_id) REFERENCES eventos (id)');
        $this->addSql('CREATE INDEX IDX_C799BBF087A5F842 ON palestra (evento_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE palestra DROP FOREIGN KEY FK_C799BBF087A5F842');
        $this->addSql('DROP INDEX IDX_C799BBF087A5F842 ON palestra');
        $this->addSql('ALTER TABLE palestra DROP evento_id');
    }
}
