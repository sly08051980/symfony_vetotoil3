<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240227125658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soigner ADD employer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE soigner ADD CONSTRAINT FK_6F551B1941CD9E7A FOREIGN KEY (employer_id) REFERENCES employer (id)');
        $this->addSql('CREATE INDEX IDX_6F551B1941CD9E7A ON soigner (employer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soigner DROP FOREIGN KEY FK_6F551B1941CD9E7A');
        $this->addSql('DROP INDEX IDX_6F551B1941CD9E7A ON soigner');
        $this->addSql('ALTER TABLE soigner DROP employer_id');
    }
}
