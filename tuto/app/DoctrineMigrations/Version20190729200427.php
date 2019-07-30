<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190729200427 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');


        $this->addSql ( " ALTER TABLE note de genre DROP FOREIGN KEY FK_6478FCEC85C4074C " );
        $this->addSql ( " DROP INDEX IDX_6478FCEC85C4074C ON genre_note " );
        // modifier
        $this->addSql('ALTER TABLE genus_note CHANGE genus_id genus_id INT NOT NULL');
        // ré-ajoute le FKEY
        $this->addSql ( " ALTER TABLE note de genre AJOUTER CONTRAINT FK_6478FCEC85C4074C CLÉ ÉTRANGÈRE (genre_id) RÉFÉRENCES genre (id) " );
        $this->addSql ( " CREATE INDEX IDX_6478FCEC85C4074C ON genre_note (genre_id) " );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE genus_note CHANGE genus_id genus_id INT DEFAULT NULL');
    }
}
