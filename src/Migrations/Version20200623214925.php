<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200623214925 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE media_movie (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, release_date DATE NOT NULL, summary LONGTEXT NOT NULL, trailer_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE genre ADD genre_id INT NOT NULL');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F84296D31F FOREIGN KEY (genre_id) REFERENCES media_movie (id)');
        $this->addSql('CREATE INDEX IDX_835033F84296D31F ON genre (genre_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F84296D31F');
        $this->addSql('DROP TABLE media_movie');
        $this->addSql('DROP INDEX IDX_835033F84296D31F ON genre');
        $this->addSql('ALTER TABLE genre DROP genre_id');
    }
}
