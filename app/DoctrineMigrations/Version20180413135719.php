<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

// Add Posts table with fk to the Categories

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180413135719 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Posts (post_id INT AUTO_INCREMENT NOT NULL, post_category_id INT DEFAULT NULL, post_title VARCHAR(150) NOT NULL, post_text LONGTEXT NOT NULL, posted_date DATE NOT NULL, updated_date DATE NOT NULL, INDEX IDX_499C95FEFE0617CD (post_category_id), PRIMARY KEY(post_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Posts ADD CONSTRAINT FK_499C95FEFE0617CD FOREIGN KEY (post_category_id) REFERENCES Categories (category_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE Posts');
    }
}
