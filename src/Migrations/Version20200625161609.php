<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625161609 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE historic_media_movie (historic_id INT NOT NULL, media_movie_id INT NOT NULL, INDEX IDX_937B1F6352F34864 (historic_id), INDEX IDX_937B1F6380F2984E (media_movie_id), PRIMARY KEY(historic_id, media_movie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE historic_media_movie ADD CONSTRAINT FK_937B1F6352F34864 FOREIGN KEY (historic_id) REFERENCES historic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historic_media_movie ADD CONSTRAINT FK_937B1F6380F2984E FOREIGN KEY (media_movie_id) REFERENCES media_movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historic ADD start_date DATE DEFAULT NULL, ADD finish_date DATE NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE historic_media_movie');
        $this->addSql('ALTER TABLE historic DROP start_date, DROP finish_date');
    }
}
