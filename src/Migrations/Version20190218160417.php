<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190218160417 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE stage_vacance_date_stage');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stage_vacance_date_stage (stage_vacance_id INT NOT NULL, date_stage_id INT NOT NULL, INDEX IDX_F0062E7815AE8B47 (stage_vacance_id), INDEX IDX_F0062E78E1ADB835 (date_stage_id), PRIMARY KEY(stage_vacance_id, date_stage_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE stage_vacance_date_stage ADD CONSTRAINT FK_F0062E7815AE8B47 FOREIGN KEY (stage_vacance_id) REFERENCES stage_vacance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_vacance_date_stage ADD CONSTRAINT FK_F0062E78E1ADB835 FOREIGN KEY (date_stage_id) REFERENCES date_stage (id) ON DELETE CASCADE');
    }
}
