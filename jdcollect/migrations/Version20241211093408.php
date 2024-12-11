<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241211093408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amiibos ADD marque_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE amiibos ADD CONSTRAINT FK_B6F161BE4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('CREATE INDEX IDX_B6F161BE4827B9B2 ON amiibos (marque_id)');
        $this->addSql('DROP INDEX IDX_3603CFB6B8CCB787 ON console');
        $this->addSql('DROP INDEX IDX_3603CFB6CCAE4D90 ON console');
        $this->addSql('ALTER TABLE console ADD categorie_id INT DEFAULT NULL, DROP id_categ_id, DROP id_jx_id');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_3603CFB6BCF5E72D ON console (categorie_id)');
        $this->addSql('DROP INDEX IDX_3755B50DB8CCB787 ON jeux');
        $this->addSql('ALTER TABLE jeux ADD console_id INT DEFAULT NULL, ADD categorie_id INT DEFAULT NULL, DROP id_categ_id');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D72F9DD9F FOREIGN KEY (console_id) REFERENCES console (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_3755B50D72F9DD9F ON jeux (console_id)');
        $this->addSql('CREATE INDEX IDX_3755B50DBCF5E72D ON jeux (categorie_id)');
        $this->addSql('DROP INDEX IDX_5A6F91CECCAE4D90 ON marque');
        $this->addSql('DROP INDEX IDX_5A6F91CED7735D48 ON marque');
        $this->addSql('ALTER TABLE marque DROP id_console_id, DROP id_jx_id');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CE91569C4C FOREIGN KEY (id_amii_id) REFERENCES amiibos (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D72F9DD9F');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DBCF5E72D');
        $this->addSql('DROP INDEX IDX_3755B50D72F9DD9F ON jeux');
        $this->addSql('DROP INDEX IDX_3755B50DBCF5E72D ON jeux');
        $this->addSql('ALTER TABLE jeux ADD id_categ_id INT NOT NULL, DROP console_id, DROP categorie_id');
        $this->addSql('CREATE INDEX IDX_3755B50DB8CCB787 ON jeux (id_categ_id)');
        $this->addSql('ALTER TABLE amiibos DROP FOREIGN KEY FK_B6F161BE4827B9B2');
        $this->addSql('DROP INDEX IDX_B6F161BE4827B9B2 ON amiibos');
        $this->addSql('ALTER TABLE amiibos DROP marque_id');
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6BCF5E72D');
        $this->addSql('DROP INDEX IDX_3603CFB6BCF5E72D ON console');
        $this->addSql('ALTER TABLE console ADD id_categ_id INT NOT NULL, ADD id_jx_id INT NOT NULL, DROP categorie_id');
        $this->addSql('CREATE INDEX IDX_3603CFB6B8CCB787 ON console (id_categ_id)');
        $this->addSql('CREATE INDEX IDX_3603CFB6CCAE4D90 ON console (id_jx_id)');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CE91569C4C');
        $this->addSql('ALTER TABLE marque ADD id_console_id INT NOT NULL, ADD id_jx_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_5A6F91CECCAE4D90 ON marque (id_jx_id)');
        $this->addSql('CREATE INDEX IDX_5A6F91CED7735D48 ON marque (id_console_id)');
    }
}
