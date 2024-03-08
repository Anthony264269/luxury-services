<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240307143236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, passport_file_id INT DEFAULT NULL, curriculum_vitae_id INT DEFAULT NULL, profil_picture_id INT DEFAULT NULL, job_category_id INT DEFAULT NULL, user_id INT DEFAULT NULL, genre_id INT DEFAULT NULL, experience_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, current_location VARCHAR(255) NOT NULL, birth_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', place_of_birth VARCHAR(255) NOT NULL, availability TINYINT(1) NOT NULL, phone VARCHAR(255) NOT NULL, registrated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', deleted_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_6AB5B471631C839D (passport_file_id), UNIQUE INDEX UNIQ_6AB5B4714AF29A35 (curriculum_vitae_id), UNIQUE INDEX UNIQ_6AB5B471D583E641 (profil_picture_id), UNIQUE INDEX UNIQ_6AB5B471712A86AB (job_category_id), UNIQUE INDEX UNIQ_6AB5B471A76ED395 (user_id), UNIQUE INDEX UNIQ_6AB5B4714296D31F (genre_id), UNIQUE INDEX UNIQ_6AB5B47146E90E27 (experience_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471631C839D FOREIGN KEY (passport_file_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B4714AF29A35 FOREIGN KEY (curriculum_vitae_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471D583E641 FOREIGN KEY (profil_picture_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471712A86AB FOREIGN KEY (job_category_id) REFERENCES job_category (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B4714296D31F FOREIGN KEY (genre_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B47146E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471631C839D');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B4714AF29A35');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471D583E641');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471712A86AB');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471A76ED395');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B4714296D31F');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B47146E90E27');
        $this->addSql('DROP TABLE candidat');
    }
}
