<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200131100100 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consola (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, compania VARCHAR(255) NOT NULL, fecha_salida DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juego (id INT AUTO_INCREMENT NOT NULL, plataforma_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, desarrolladora VARCHAR(255) NOT NULL, duracion INT NOT NULL, fecha DATE DEFAULT NULL, genero VARCHAR(255) NOT NULL, estado TINYINT(1) NOT NULL, imagen VARCHAR(255) DEFAULT NULL, INDEX IDX_F0EC403DEB90E430 (plataforma_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producto (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, precio DOUBLE PRECISION DEFAULT NULL, fecha DATE DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, disponible TINYINT(1) DEFAULT NULL, imagen VARCHAR(255) DEFAULT NULL, INDEX IDX_A7BB061512469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE juego ADD CONSTRAINT FK_F0EC403DEB90E430 FOREIGN KEY (plataforma_id) REFERENCES consola (id)');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB061512469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE producto DROP FOREIGN KEY FK_A7BB061512469DE2');
        $this->addSql('ALTER TABLE juego DROP FOREIGN KEY FK_F0EC403DEB90E430');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE consola');
        $this->addSql('DROP TABLE juego');
        $this->addSql('DROP TABLE producto');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
