<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004090208 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE choice DROP FOREIGN KEY FK_C1AB5A92F920BBA2');
        $this->addSql('DROP INDEX IDX_C1AB5A92F920BBA2 ON choice');
        $this->addSql('ALTER TABLE choice DROP value_id');
        $this->addSql('ALTER TABLE choice_value ADD description LONGTEXT NOT NULL, CHANGE result title VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE choice ADD value_id INT NOT NULL');
        $this->addSql('ALTER TABLE choice ADD CONSTRAINT FK_C1AB5A92F920BBA2 FOREIGN KEY (value_id) REFERENCES choice_value (id)');
        $this->addSql('CREATE INDEX IDX_C1AB5A92F920BBA2 ON choice (value_id)');
        $this->addSql('ALTER TABLE choice_value DROP description, CHANGE title result VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
