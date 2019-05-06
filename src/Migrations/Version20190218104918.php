<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190218104918 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stage_vacance_journee (stage_vacance_id INT NOT NULL, journee_id INT NOT NULL, INDEX IDX_3ECAD5E915AE8B47 (stage_vacance_id), INDEX IDX_3ECAD5E9CF066148 (journee_id), PRIMARY KEY(stage_vacance_id, journee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage_vacance_journee ADD CONSTRAINT FK_3ECAD5E915AE8B47 FOREIGN KEY (stage_vacance_id) REFERENCES stage_vacance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_vacance_journee ADD CONSTRAINT FK_3ECAD5E9CF066148 FOREIGN KEY (journee_id) REFERENCES journee (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE stage_vacance_journee');
    }
}
