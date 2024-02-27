<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240227124837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employer_rdv (employer_id INT NOT NULL, rdv_id INT NOT NULL, INDEX IDX_CB8622A941CD9E7A (employer_id), INDEX IDX_CB8622A94CCE3F86 (rdv_id), PRIMARY KEY(employer_id, rdv_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employer_rdv ADD CONSTRAINT FK_CB8622A941CD9E7A FOREIGN KEY (employer_id) REFERENCES employer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employer_rdv ADD CONSTRAINT FK_CB8622A94CCE3F86 FOREIGN KEY (rdv_id) REFERENCES rdv (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employer_rdv DROP FOREIGN KEY FK_CB8622A941CD9E7A');
        $this->addSql('ALTER TABLE employer_rdv DROP FOREIGN KEY FK_CB8622A94CCE3F86');
        $this->addSql('DROP TABLE employer_rdv');
    }
}
