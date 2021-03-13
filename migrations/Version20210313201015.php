<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210313201015 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE palestra (id INT AUTO_INCREMENT NOT NULL, palestrante_id INT DEFAULT NULL, titulo VARCHAR(100) NOT NULL, data DATE NOT NULL, hora_inicio TIME NOT NULL, hora_fim TIME NOT NULL, descricao LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_C799BBF03CBB9C62 (palestrante_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE palestra ADD CONSTRAINT FK_C799BBF03CBB9C62 FOREIGN KEY (palestrante_id) REFERENCES palestrante (id)');
        $this->addSql('ALTER TABLE eventos ADD palestra_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eventos ADD CONSTRAINT FK_6B23BD8F5D67EAB4 FOREIGN KEY (palestra_id) REFERENCES palestra (id)');
        $this->addSql('CREATE INDEX IDX_6B23BD8F5D67EAB4 ON eventos (palestra_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eventos DROP FOREIGN KEY FK_6B23BD8F5D67EAB4');
        $this->addSql('DROP TABLE palestra');
        $this->addSql('DROP INDEX IDX_6B23BD8F5D67EAB4 ON eventos');
        $this->addSql('ALTER TABLE eventos DROP palestra_id');
    }
}
