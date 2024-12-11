<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241211093646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amiibos ADD CONSTRAINT FK_B6F161BE4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB64827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D72F9DD9F FOREIGN KEY (console_id) REFERENCES console (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('DROP INDEX IDX_5A6F91CE91569C4C ON marque');
        $this->addSql('ALTER TABLE marque DROP id_amii_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amiibos DROP FOREIGN KEY FK_B6F161BE4827B9B2');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D72F9DD9F');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DBCF5E72D');
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6BCF5E72D');
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB64827B9B2');
        $this->addSql('ALTER TABLE marque ADD id_amii_id INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_5A6F91CE91569C4C ON marque (id_amii_id)');
    }
}
