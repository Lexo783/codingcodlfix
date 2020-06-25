<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625161145 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE historic (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historic_users (historic_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_5E4CFB8B52F34864 (historic_id), INDEX IDX_5E4CFB8B67B3B43D (users_id), PRIMARY KEY(historic_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE historic_users ADD CONSTRAINT FK_5E4CFB8B52F34864 FOREIGN KEY (historic_id) REFERENCES historic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historic_users ADD CONSTRAINT FK_5E4CFB8B67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE historic_users DROP FOREIGN KEY FK_5E4CFB8B52F34864');
        $this->addSql('DROP TABLE historic');
        $this->addSql('DROP TABLE historic_users');
    }
}
