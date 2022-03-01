<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220301172533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, types_utilisateurs_id INT DEFAULT NULL, repas_id INT DEFAULT NULL, gout INT NOT NULL, diversite INT NOT NULL, chaleur INT NOT NULL, disponibilite INT NOT NULL, proprete INT NOT NULL, acceuil INT NOT NULL, commentaire VARCHAR(255) NOT NULL, INDEX IDX_8F91ABF090165533 (types_utilisateurs_id), INDEX IDX_8F91ABF01D236AAA (repas_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repas (id INT AUTO_INCREMENT NOT NULL, types_repas_id INT DEFAULT NULL, date_repas DATE NOT NULL, heure TIME NOT NULL, INDEX IDX_A8D351B3D2448D84 (types_repas_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types_repas (id INT AUTO_INCREMENT NOT NULL, libelle_r VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types_utilisateurs (id INT AUTO_INCREMENT NOT NULL, libelle_t VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF090165533 FOREIGN KEY (types_utilisateurs_id) REFERENCES types_utilisateurs (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF01D236AAA FOREIGN KEY (repas_id) REFERENCES repas (id)');
        $this->addSql('ALTER TABLE repas ADD CONSTRAINT FK_A8D351B3D2448D84 FOREIGN KEY (types_repas_id) REFERENCES types_repas (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF01D236AAA');
        $this->addSql('ALTER TABLE repas DROP FOREIGN KEY FK_A8D351B3D2448D84');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF090165533');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE repas');
        $this->addSql('DROP TABLE types_repas');
        $this->addSql('DROP TABLE types_utilisateurs');
        $this->addSql('DROP TABLE user');
    }
}
