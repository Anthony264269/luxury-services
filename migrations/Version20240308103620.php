<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240308103620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP INDEX UNIQ_6AB5B47146E90E27, ADD INDEX IDX_6AB5B47146E90E27 (experience_id)');
        $this->addSql('ALTER TABLE experience DROP experience');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP INDEX IDX_6AB5B47146E90E27, ADD UNIQUE INDEX UNIQ_6AB5B47146E90E27 (experience_id)');
        $this->addSql('ALTER TABLE experience ADD experience VARCHAR(255) NOT NULL');
    }
}
