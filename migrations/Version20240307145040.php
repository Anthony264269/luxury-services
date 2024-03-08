<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240307145040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidacy (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat ADD candidacy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B47159B22434 FOREIGN KEY (candidacy_id) REFERENCES candidacy (id)');
        $this->addSql('CREATE INDEX IDX_6AB5B47159B22434 ON candidat (candidacy_id)');
        $this->addSql('ALTER TABLE job ADD candidacy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F859B22434 FOREIGN KEY (candidacy_id) REFERENCES candidacy (id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F859B22434 ON job (candidacy_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B47159B22434');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F859B22434');
        $this->addSql('DROP TABLE candidacy');
        $this->addSql('DROP INDEX IDX_FBD8E0F859B22434 ON job');
        $this->addSql('ALTER TABLE job DROP candidacy_id');
        $this->addSql('DROP INDEX IDX_6AB5B47159B22434 ON candidat');
        $this->addSql('ALTER TABLE candidat DROP candidacy_id');
    }
}
