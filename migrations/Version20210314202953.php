<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210314202953 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eventos DROP FOREIGN KEY FK_6B23BD8F5D67EAB4');
        $this->addSql('DROP INDEX IDX_6B23BD8F5D67EAB4 ON eventos');
        $this->addSql('ALTER TABLE eventos DROP palestra_id');
        $this->addSql('ALTER TABLE palestra DROP FOREIGN KEY FK_C799BBF03CBB9C62');
        $this->addSql('DROP INDEX UNIQ_C799BBF03CBB9C62 ON palestra');
        $this->addSql('ALTER TABLE palestra DROP palestrante_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eventos ADD palestra_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eventos ADD CONSTRAINT FK_6B23BD8F5D67EAB4 FOREIGN KEY (palestra_id) REFERENCES palestra (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_6B23BD8F5D67EAB4 ON eventos (palestra_id)');
        $this->addSql('ALTER TABLE palestra ADD palestrante_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE palestra ADD CONSTRAINT FK_C799BBF03CBB9C62 FOREIGN KEY (palestrante_id) REFERENCES palestrante (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C799BBF03CBB9C62 ON palestra (palestrante_id)');
    }
}
