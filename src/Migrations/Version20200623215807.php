<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200623215807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F880F2984E');
        $this->addSql('DROP INDEX IDX_835033F880F2984E ON genre');
        $this->addSql('ALTER TABLE genre DROP media_movie_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE genre ADD media_movie_id INT NOT NULL');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F880F2984E FOREIGN KEY (media_movie_id) REFERENCES media_movie (id)');
        $this->addSql('CREATE INDEX IDX_835033F880F2984E ON genre (media_movie_id)');
    }
}
