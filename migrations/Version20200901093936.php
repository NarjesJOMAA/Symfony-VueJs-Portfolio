<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200901093936 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE technologies ADD groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE technologies ADD CONSTRAINT FK_4CCBFB187A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)');
        $this->addSql('CREATE INDEX IDX_4CCBFB187A45358C ON technologies (groupe_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE technologies DROP FOREIGN KEY FK_4CCBFB187A45358C');
        $this->addSql('DROP INDEX IDX_4CCBFB187A45358C ON technologies');
        $this->addSql('ALTER TABLE technologies DROP groupe_id');
    }
}
