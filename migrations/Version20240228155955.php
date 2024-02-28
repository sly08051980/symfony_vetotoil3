<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228155955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ajouter DROP droit_utilisateur');
        $this->addSql('ALTER TABLE employer DROP droit_utilisateur_employer');
        $this->addSql('ALTER TABLE patient DROP droit_utilisateur_patient');
        $this->addSql('ALTER TABLE societe DROP droit_utilisateur_societe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ajouter ADD droit_utilisateur VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE employer ADD droit_utilisateur_employer VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE patient ADD droit_utilisateur_patient VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE societe ADD droit_utilisateur_societe VARCHAR(10) NOT NULL');
    }
}
