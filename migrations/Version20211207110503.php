<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207110503 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE repas (id INT AUTO_INCREMENT NOT NULL, types_repas_id INT DEFAULT NULL, date_repas DATE NOT NULL, heure TIME NOT NULL, INDEX IDX_A8D351B3D2448D84 (types_repas_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types_repas (id INT AUTO_INCREMENT NOT NULL, libelle_r VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repas ADD CONSTRAINT FK_A8D351B3D2448D84 FOREIGN KEY (types_repas_id) REFERENCES types_repas (id)');
        $this->addSql('ALTER TABLE avis ADD repas_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_8F91ABF01D236AAA ON avis (repas_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF01D236AAA');
        $this->addSql('ALTER TABLE repas DROP FOREIGN KEY FK_A8D351B3D2448D84');
        $this->addSql('DROP TABLE repas');
        $this->addSql('DROP TABLE types_repas');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF090165533');
        $this->addSql('DROP INDEX IDX_8F91ABF01D236AAA ON avis');
        $this->addSql('ALTER TABLE avis DROP repas_id');
    }
}
