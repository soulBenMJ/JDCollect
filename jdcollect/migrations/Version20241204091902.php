<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241204091902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE console ADD id_categ_id INT NOT NULL, ADD id_jx_id INT NOT NULL');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6B8CCB787 FOREIGN KEY (id_categ_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6CCAE4D90 FOREIGN KEY (id_jx_id) REFERENCES jeux (id)');
        $this->addSql('CREATE INDEX IDX_3603CFB6B8CCB787 ON console (id_categ_id)');
        $this->addSql('CREATE INDEX IDX_3603CFB6CCAE4D90 ON console (id_jx_id)');
        $this->addSql('ALTER TABLE jeux ADD id_categ_id INT NOT NULL');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DB8CCB787 FOREIGN KEY (id_categ_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_3755B50DB8CCB787 ON jeux (id_categ_id)');
        $this->addSql('ALTER TABLE marque ADD id_console_id INT NOT NULL, ADD id_jx_id INT DEFAULT NULL, ADD id_amii_id INT NOT NULL');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CED7735D48 FOREIGN KEY (id_console_id) REFERENCES console (id)');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CECCAE4D90 FOREIGN KEY (id_jx_id) REFERENCES jeux (id)');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CE91569C4C FOREIGN KEY (id_amii_id) REFERENCES amiibos (id)');
        $this->addSql('CREATE INDEX IDX_5A6F91CED7735D48 ON marque (id_console_id)');
        $this->addSql('CREATE INDEX IDX_5A6F91CECCAE4D90 ON marque (id_jx_id)');
        $this->addSql('CREATE INDEX IDX_5A6F91CE91569C4C ON marque (id_amii_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6B8CCB787');
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6CCAE4D90');
        $this->addSql('DROP INDEX IDX_3603CFB6B8CCB787 ON console');
        $this->addSql('DROP INDEX IDX_3603CFB6CCAE4D90 ON console');
        $this->addSql('ALTER TABLE console DROP id_categ_id, DROP id_jx_id');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DB8CCB787');
        $this->addSql('DROP INDEX IDX_3755B50DB8CCB787 ON jeux');
        $this->addSql('ALTER TABLE jeux DROP id_categ_id');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CED7735D48');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CECCAE4D90');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CE91569C4C');
        $this->addSql('DROP INDEX IDX_5A6F91CED7735D48 ON marque');
        $this->addSql('DROP INDEX IDX_5A6F91CECCAE4D90 ON marque');
        $this->addSql('DROP INDEX IDX_5A6F91CE91569C4C ON marque');
        $this->addSql('ALTER TABLE marque DROP id_console_id, DROP id_jx_id, DROP id_amii_id');
    }
}
