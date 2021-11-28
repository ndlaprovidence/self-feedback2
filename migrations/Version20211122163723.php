<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122163723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repas (Id_r INT NOT NULL, date_repas DATE DEFAULT NULL, heure VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_bin`, id_tr INT NOT NULL, id_p INT NOT NULL, id_t INT NOT NULL, INDEX id_t (id_t), INDEX id_tr (id_tr), INDEX id_p (id_p), PRIMARY KEY(Id_r)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE types_de_repas (id_tr INT NOT NULL, libelle_tr VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_bin`, PRIMARY KEY(id_tr)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE types_utilisateurs (id_t INT NOT NULL, libelle_t VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_bin`, PRIMARY KEY(id_t)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateurs (id INT NOT NULL, username VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_bin`, password VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_bin`, role INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' '); }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        }
}
