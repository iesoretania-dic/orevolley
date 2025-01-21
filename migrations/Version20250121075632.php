<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250121075632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arbitro (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, apellidos VARCHAR(255) NOT NULL, num_colegiado INT NOT NULL, UNIQUE INDEX UNIQ_C0670F701468B7D5 (num_colegiado), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipo (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jugador (id INT AUTO_INCREMENT NOT NULL, equipo_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, apellidos VARCHAR(255) NOT NULL, fecha_nacimiento DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', dorsal INT DEFAULT NULL, INDEX IDX_527D6F1823BFBED (equipo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logotipo (id INT AUTO_INCREMENT NOT NULL, equipo_id INT NOT NULL, nombre_fichero VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C0624BB423BFBED (equipo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partido (id INT AUTO_INCREMENT NOT NULL, local_id INT NOT NULL, visitante_id INT NOT NULL, arbitro_id INT NOT NULL, sede_id INT NOT NULL, fecha_hora DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_4E79750B5D5A2101 (local_id), INDEX IDX_4E79750BD80AA8AF (visitante_id), INDEX IDX_4E79750B66FE4594 (arbitro_id), INDEX IDX_4E79750BE19F41BF (sede_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partido_patrocinador (partido_id INT NOT NULL, patrocinador_id INT NOT NULL, INDEX IDX_C113576A11856EB4 (partido_id), INDEX IDX_C113576A43CC7822 (patrocinador_id), PRIMARY KEY(partido_id, patrocinador_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patrocinador (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sede (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jugador ADD CONSTRAINT FK_527D6F1823BFBED FOREIGN KEY (equipo_id) REFERENCES equipo (id)');
        $this->addSql('ALTER TABLE logotipo ADD CONSTRAINT FK_C0624BB423BFBED FOREIGN KEY (equipo_id) REFERENCES equipo (id)');
        $this->addSql('ALTER TABLE partido ADD CONSTRAINT FK_4E79750B5D5A2101 FOREIGN KEY (local_id) REFERENCES equipo (id)');
        $this->addSql('ALTER TABLE partido ADD CONSTRAINT FK_4E79750BD80AA8AF FOREIGN KEY (visitante_id) REFERENCES equipo (id)');
        $this->addSql('ALTER TABLE partido ADD CONSTRAINT FK_4E79750B66FE4594 FOREIGN KEY (arbitro_id) REFERENCES arbitro (id)');
        $this->addSql('ALTER TABLE partido ADD CONSTRAINT FK_4E79750BE19F41BF FOREIGN KEY (sede_id) REFERENCES sede (id)');
        $this->addSql('ALTER TABLE partido_patrocinador ADD CONSTRAINT FK_C113576A11856EB4 FOREIGN KEY (partido_id) REFERENCES partido (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partido_patrocinador ADD CONSTRAINT FK_C113576A43CC7822 FOREIGN KEY (patrocinador_id) REFERENCES patrocinador (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jugador DROP FOREIGN KEY FK_527D6F1823BFBED');
        $this->addSql('ALTER TABLE logotipo DROP FOREIGN KEY FK_C0624BB423BFBED');
        $this->addSql('ALTER TABLE partido DROP FOREIGN KEY FK_4E79750B5D5A2101');
        $this->addSql('ALTER TABLE partido DROP FOREIGN KEY FK_4E79750BD80AA8AF');
        $this->addSql('ALTER TABLE partido DROP FOREIGN KEY FK_4E79750B66FE4594');
        $this->addSql('ALTER TABLE partido DROP FOREIGN KEY FK_4E79750BE19F41BF');
        $this->addSql('ALTER TABLE partido_patrocinador DROP FOREIGN KEY FK_C113576A11856EB4');
        $this->addSql('ALTER TABLE partido_patrocinador DROP FOREIGN KEY FK_C113576A43CC7822');
        $this->addSql('DROP TABLE arbitro');
        $this->addSql('DROP TABLE equipo');
        $this->addSql('DROP TABLE jugador');
        $this->addSql('DROP TABLE logotipo');
        $this->addSql('DROP TABLE partido');
        $this->addSql('DROP TABLE partido_patrocinador');
        $this->addSql('DROP TABLE patrocinador');
        $this->addSql('DROP TABLE sede');
    }
}
