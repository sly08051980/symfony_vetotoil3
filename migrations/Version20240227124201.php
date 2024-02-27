<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240227124201 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ajouter (id INT AUTO_INCREMENT NOT NULL, jours_travailler VARCHAR(100) NOT NULL, date_entree_employer DATE NOT NULL, date_sortie_employer DATE DEFAULT NULL, date_jours_vacances DATE DEFAULT NULL, date_fin_vacances DATE DEFAULT NULL, droit_utilisateur VARCHAR(10) DEFAULT NULL, debut_repas TIME DEFAULT NULL, fin_repas TIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, prenom_animal VARCHAR(50) NOT NULL, date_naissance_animal DATE NOT NULL, date_creation_animal DATE DEFAULT NULL, date_fin_animal DATE DEFAULT NULL, images_animal VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commune (id INT AUTO_INCREMENT NOT NULL, nom_commune VARCHAR(100) NOT NULL, code_postal_commune VARCHAR(5) NOT NULL, latitude VARCHAR(50) NOT NULL, longitude VARCHAR(50) NOT NULL, nom_departement VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employer (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom_employer VARCHAR(50) NOT NULL, prenom_employer VARCHAR(50) NOT NULL, adresse_employer VARCHAR(255) NOT NULL, complement_adresse_employer VARCHAR(255) DEFAULT NULL, code_postal_employer VARCHAR(5) NOT NULL, ville_employer VARCHAR(50) NOT NULL, telephone_employer VARCHAR(10) NOT NULL, profession_employer VARCHAR(20) NOT NULL, images_employer VARCHAR(255) DEFAULT NULL, date_creation_employer DATE NOT NULL, droit_utilisateur_employer VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_DE4CF066E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom_patient VARCHAR(50) NOT NULL, prenom_patient VARCHAR(50) NOT NULL, adresse_patient VARCHAR(255) NOT NULL, complement_adresse_patient VARCHAR(255) DEFAULT NULL, code_postal_patient VARCHAR(5) NOT NULL, ville_patient VARCHAR(50) NOT NULL, telephone_patient VARCHAR(10) NOT NULL, date_creation_patient DATE NOT NULL, date_fin_patient DATE DEFAULT NULL, droit_utilisateur_patient VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_1ADAD7EBE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, race_animal VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, date_rdv DATE NOT NULL, heure TIME NOT NULL, status_rdv VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, siret VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom_societe VARCHAR(50) NOT NULL, profession_societe VARCHAR(20) NOT NULL, nom_dirigeant VARCHAR(50) NOT NULL, adresse_societe VARCHAR(255) NOT NULL, complement_adresse_societe VARCHAR(255) DEFAULT NULL, code_postal_societe VARCHAR(5) NOT NULL, ville_societe VARCHAR(50) NOT NULL, telephone_societe VARCHAR(10) NOT NULL, telephone_dirigeant VARCHAR(10) NOT NULL, email VARCHAR(100) NOT NULL, images VARCHAR(255) DEFAULT NULL, date_creation_societe DATE NOT NULL, date_resiliation_societe DATE DEFAULT NULL, date_validation_societe DATETIME DEFAULT NULL, droit_utilisateur_societe VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_19653DBD26E94372 (siret), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soigner (id INT AUTO_INCREMENT NOT NULL, acte_soins VARCHAR(255) DEFAULT NULL, traitement VARCHAR(100) DEFAULT NULL, nombre_fois BIGINT DEFAULT NULL, date_soins DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, type_animal VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ajouter');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE employer');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE societe');
        $this->addSql('DROP TABLE soigner');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
