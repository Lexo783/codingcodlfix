<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200623215938 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE media_movie_genre (media_movie_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_A7A5BF780F2984E (media_movie_id), INDEX IDX_A7A5BF74296D31F (genre_id), PRIMARY KEY(media_movie_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE media_movie_genre ADD CONSTRAINT FK_A7A5BF780F2984E FOREIGN KEY (media_movie_id) REFERENCES media_movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_movie_genre ADD CONSTRAINT FK_A7A5BF74296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE media_movie_genre');
    }
}
