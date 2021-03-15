<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210314204335 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE palestra DROP INDEX UNIQ_C799BBF03CBB9C62, ADD INDEX IDX_C799BBF03CBB9C62 (palestrante_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE palestra DROP INDEX IDX_C799BBF03CBB9C62, ADD UNIQUE INDEX UNIQ_C799BBF03CBB9C62 (palestrante_id)');
    }
}
