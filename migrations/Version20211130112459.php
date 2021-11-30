<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130112459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE repas (id INT AUTO_INCREMENT NOT NULL, repas_id INT DEFAULT NULL, date_repas DATE NOT NULL, heure TIME DEFAULT NULL, INDEX IDX_A8D351B31D236AAA (repas_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repas_types_utilisateurs (repas_id INT NOT NULL, types_utilisateurs_id INT NOT NULL, INDEX IDX_C8B7A6A41D236AAA (repas_id), INDEX IDX_C8B7A6A490165533 (types_utilisateurs_id), PRIMARY KEY(repas_id, types_utilisateurs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types_de_repas (id INT AUTO_INCREMENT NOT NULL, libelle_tr VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types_utilisateurs (id INT AUTO_INCREMENT NOT NULL, libelle_t VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repas ADD CONSTRAINT FK_A8D351B31D236AAA FOREIGN KEY (repas_id) REFERENCES types_de_repas (id)');
        $this->addSql('ALTER TABLE repas_types_utilisateurs ADD CONSTRAINT FK_C8B7A6A41D236AAA FOREIGN KEY (repas_id) REFERENCES repas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE repas_types_utilisateurs ADD CONSTRAINT FK_C8B7A6A490165533 FOREIGN KEY (types_utilisateurs_id) REFERENCES types_utilisateurs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE avis ADD repas_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_8F91ABF01D236AAA ON avis (repas_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF01D236AAA');
        $this->addSql('ALTER TABLE repas_types_utilisateurs DROP FOREIGN KEY FK_C8B7A6A41D236AAA');
        $this->addSql('ALTER TABLE repas DROP FOREIGN KEY FK_A8D351B31D236AAA');
        $this->addSql('ALTER TABLE repas_types_utilisateurs DROP FOREIGN KEY FK_C8B7A6A490165533');
        $this->addSql('DROP TABLE repas');
        $this->addSql('DROP TABLE repas_types_utilisateurs');
        $this->addSql('DROP TABLE types_de_repas');
        $this->addSql('DROP TABLE types_utilisateurs');
        $this->addSql('DROP INDEX IDX_8F91ABF01D236AAA ON avis');
        $this->addSql('ALTER TABLE avis DROP repas_id');
    }
}
