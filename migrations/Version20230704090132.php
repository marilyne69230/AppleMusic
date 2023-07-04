<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230704090132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist_music (artist_id INT NOT NULL, music_id INT NOT NULL, INDEX IDX_AD5E1219B7970CF8 (artist_id), INDEX IDX_AD5E1219399BBB13 (music_id), PRIMARY KEY(artist_id, music_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist_music ADD CONSTRAINT FK_AD5E1219B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_music ADD CONSTRAINT FK_AD5E1219399BBB13 FOREIGN KEY (music_id) REFERENCES music (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE music DROP artists');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist_music DROP FOREIGN KEY FK_AD5E1219B7970CF8');
        $this->addSql('ALTER TABLE artist_music DROP FOREIGN KEY FK_AD5E1219399BBB13');
        $this->addSql('DROP TABLE artist_music');
        $this->addSql('ALTER TABLE music ADD artists VARCHAR(255) NOT NULL');
    }
}
