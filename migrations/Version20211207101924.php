<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207101924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE types_utilisateurs (id INT AUTO_INCREMENT NOT NULL, libelle_t VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP INDEX IDX_8F91ABF01D236AAA ON avis');
        $this->addSql('ALTER TABLE avis CHANGE repas_id types_utilisateurs_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_8F91ABF090165533 ON avis (types_utilisateurs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF090165533');
        $this->addSql('DROP TABLE types_utilisateurs');
        $this->addSql('DROP INDEX IDX_8F91ABF090165533 ON avis');
        $this->addSql('ALTER TABLE avis CHANGE types_utilisateurs_id repas_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_8F91ABF01D236AAA ON avis (repas_id)');
    }
}
