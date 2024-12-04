<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241204104952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amiibos (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix_achat DOUBLE PRECISION NOT NULL, date_achat DATE NOT NULL, prix_revente DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE console (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix_achat DOUBLE PRECISION NOT NULL, date_achat DATE NOT NULL, date_sortie DATE NOT NULL, prix_revente DOUBLE PRECISION NOT NULL, boite TINYINT(1) NOT NULL, couleur VARCHAR(255) NOT NULL, id_categ_id INT NOT NULL, id_jx_id INT NOT NULL, INDEX IDX_3603CFB6B8CCB787 (id_categ_id), INDEX IDX_3603CFB6CCAE4D90 (id_jx_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE jeux (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix_achat DOUBLE PRECISION NOT NULL, note INT NOT NULL, date_achat DATE NOT NULL, date_sortie DATE NOT NULL, prix_revente DOUBLE PRECISION NOT NULL, id_categ_id INT NOT NULL, INDEX IDX_3755B50DB8CCB787 (id_categ_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, id_console_id INT NOT NULL, id_jx_id INT DEFAULT NULL, id_amii_id INT NOT NULL, INDEX IDX_5A6F91CED7735D48 (id_console_id), INDEX IDX_5A6F91CECCAE4D90 (id_jx_id), INDEX IDX_5A6F91CE91569C4C (id_amii_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6B8CCB787 FOREIGN KEY (id_categ_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6CCAE4D90 FOREIGN KEY (id_jx_id) REFERENCES jeux (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DB8CCB787 FOREIGN KEY (id_categ_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CED7735D48 FOREIGN KEY (id_console_id) REFERENCES console (id)');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CECCAE4D90 FOREIGN KEY (id_jx_id) REFERENCES jeux (id)');
        $this->addSql('ALTER TABLE marque ADD CONSTRAINT FK_5A6F91CE91569C4C FOREIGN KEY (id_amii_id) REFERENCES amiibos (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6B8CCB787');
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6CCAE4D90');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DB8CCB787');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CED7735D48');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CECCAE4D90');
        $this->addSql('ALTER TABLE marque DROP FOREIGN KEY FK_5A6F91CE91569C4C');
        $this->addSql('DROP TABLE amiibos');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE console');
        $this->addSql('DROP TABLE jeux');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE `user`');
    }
}
