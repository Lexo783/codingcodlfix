<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625173940 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE media_series_genre (media_series_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_9F2E7D6977188212 (media_series_id), INDEX IDX_9F2E7D694296D31F (genre_id), PRIMARY KEY(media_series_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE media_series_genre ADD CONSTRAINT FK_9F2E7D6977188212 FOREIGN KEY (media_series_id) REFERENCES media_series (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_series_genre ADD CONSTRAINT FK_9F2E7D694296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE media_series_genre');
    }
}
