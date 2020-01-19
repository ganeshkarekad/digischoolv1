<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200119103008 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE attendance (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, class_id INT NOT NULL, subject_id INT DEFAULT NULL, date DATE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_present TINYINT(1) NOT NULL, INDEX IDX_6DE30D91A76ED395 (user_id), INDEX IDX_6DE30D91EA000B10 (class_id), INDEX IDX_6DE30D9123EDC87 (subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attendance ADD CONSTRAINT FK_6DE30D91A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE attendance ADD CONSTRAINT FK_6DE30D91EA000B10 FOREIGN KEY (class_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE attendance ADD CONSTRAINT FK_6DE30D9123EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE course CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE subject CHANGE created_at created_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE attendance');
        $this->addSql('ALTER TABLE course CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE subject CHANGE created_at created_at DATETIME DEFAULT NULL');
    }
}
