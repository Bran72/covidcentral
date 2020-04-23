<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200423153456 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE question_sondage (id INT AUTO_INCREMENT NOT NULL, q1 TINYINT(1) NOT NULL, q2 VARCHAR(255) NOT NULL, q3 INT NOT NULL, q4 VARCHAR(255) NOT NULL, q5 VARCHAR(255) NOT NULL, q6 TINYINT(1) NOT NULL, q7 TINYINT(1) NOT NULL, q8 VARCHAR(255) NOT NULL, q9 TINYINT(1) NOT NULL, q10 INT NOT NULL, q12 TINYINT(1) NOT NULL, q11 TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_depistage (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, q1 INT DEFAULT NULL, q2 TINYINT(1) NOT NULL, q3 TINYINT(1) NOT NULL, q4 INT DEFAULT NULL, q5 TINYINT(1) NOT NULL, q6 TINYINT(1) NOT NULL, q7 INT DEFAULT NULL, q8 TINYINT(1) NOT NULL, INDEX IDX_B195C48FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE question_depistage ADD CONSTRAINT FK_B195C48FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD points_depistage INT DEFAULT NULL, ADD firstname VARCHAR(15) DEFAULT NULL, ADD lastname VARCHAR(15) DEFAULT NULL, ADD tel VARCHAR(15) DEFAULT NULL, ADD city VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE question_sondage');
        $this->addSql('DROP TABLE question_depistage');
        $this->addSql('ALTER TABLE user DROP points_depistage, DROP firstname, DROP lastname, DROP tel, DROP city');
    }
}
