<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220504073154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE CLIENT ADD CONSTRAINT FK_37BCC3D311D3633A FOREIGN KEY (ID) REFERENCES user (ID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE FORMULE ADD typeFormule VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE FORMULEAVECCHAUFFEUR DROP FOREIGN KEY FK_FORMULEAVECCHAUFFEUR_FORMULE');
        $this->addSql('ALTER TABLE FORMULEAVECCHAUFFEUR DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE FORMULEAVECCHAUFFEUR DROP LIBELLE, CHANGE ID IDFormule INT NOT NULL');
        $this->addSql('ALTER TABLE FORMULEAVECCHAUFFEUR ADD CONSTRAINT FK_92CC0F7B62179F FOREIGN KEY (IDFormule) REFERENCES FORMULE (IDFormule) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE FORMULEAVECCHAUFFEUR ADD PRIMARY KEY (IDFormule)');
        $this->addSql('ALTER TABLE FORMULESANSCHAUFFEUR DROP FOREIGN KEY FK_FORMULESANSCHAUFFEUR_FORMULE');
        $this->addSql('ALTER TABLE FORMULESANSCHAUFFEUR DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE FORMULESANSCHAUFFEUR DROP LIBELLE, CHANGE ID IDFormule INT NOT NULL');
        $this->addSql('ALTER TABLE FORMULESANSCHAUFFEUR ADD CONSTRAINT FK_A178D1B9B62179F FOREIGN KEY (IDFormule) REFERENCES FORMULE (IDFormule) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE FORMULESANSCHAUFFEUR ADD PRIMARY KEY (IDFormule)');
        $this->addSql('ALTER TABLE LOCATION ADD typeLoca VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE LOCAVECCHAUFFEUR DROP FOREIGN KEY FK_LOCAVECCHAUFFEUR_LOCATION');
        $this->addSql('ALTER TABLE LOCAVECCHAUFFEUR DROP DATELOCATION, DROP MONTANTREGLE, DROP DATEHEUREDEPARTPREVU, DROP DATEHEURERETOURPREVU, DROP DATEHEUREDEPARTREEL, DROP DATEHEURERETOURREEL');
        $this->addSql('ALTER TABLE LOCAVECCHAUFFEUR ADD CONSTRAINT FK_59EFC79862D6E0B7 FOREIGN KEY (NUMLOCATION) REFERENCES LOCATION (NUMLOCATION) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE LOCSANSCHAUFFEUR DROP FOREIGN KEY FK_LOCSANSCHAUFFEUR_LOCATION');
        $this->addSql('ALTER TABLE LOCSANSCHAUFFEUR DROP DATELOCATION, DROP MONTANTREGLE, DROP DATEHEUREDEPARTPREVU, DROP DATEHEURERETOURPREVU, DROP DATEHEUREDEPARTREEL, DROP DATEHEURERETOURREEL');
        $this->addSql('ALTER TABLE LOCSANSCHAUFFEUR ADD CONSTRAINT FK_F1BBD6D662D6E0B7 FOREIGN KEY (NUMLOCATION) REFERENCES LOCATION (NUMLOCATION) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE SALARIE DROP FOREIGN KEY FK_SALARIE_USER');
        $this->addSql('ALTER TABLE SALARIE DROP NOM, DROP PRENOM, DROP LOGIN, DROP MOTDEPASSE');
        $this->addSql('ALTER TABLE SALARIE ADD CONSTRAINT FK_BDCBC40011D3633A FOREIGN KEY (ID) REFERENCES user (ID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE USER ADD typeUser VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE CLIENT DROP FOREIGN KEY FK_37BCC3D311D3633A');
        $this->addSql('ALTER TABLE FORMULE DROP typeFormule');
        $this->addSql('ALTER TABLE FORMULEAVECCHAUFFEUR DROP FOREIGN KEY FK_92CC0F7B62179F');
        $this->addSql('ALTER TABLE FORMULEAVECCHAUFFEUR DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE FORMULEAVECCHAUFFEUR ADD LIBELLE CHAR(32) DEFAULT NULL, CHANGE IDFormule ID INT NOT NULL');
        $this->addSql('ALTER TABLE FORMULEAVECCHAUFFEUR ADD CONSTRAINT FK_FORMULEAVECCHAUFFEUR_FORMULE FOREIGN KEY (ID) REFERENCES FORMULE (IDFormule)');
        $this->addSql('ALTER TABLE FORMULEAVECCHAUFFEUR ADD PRIMARY KEY (ID)');
        $this->addSql('ALTER TABLE FORMULESANSCHAUFFEUR DROP FOREIGN KEY FK_A178D1B9B62179F');
        $this->addSql('ALTER TABLE FORMULESANSCHAUFFEUR DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE FORMULESANSCHAUFFEUR ADD LIBELLE CHAR(32) DEFAULT NULL, CHANGE IDFormule ID INT NOT NULL');
        $this->addSql('ALTER TABLE FORMULESANSCHAUFFEUR ADD CONSTRAINT FK_FORMULESANSCHAUFFEUR_FORMULE FOREIGN KEY (ID) REFERENCES FORMULE (IDFormule)');
        $this->addSql('ALTER TABLE FORMULESANSCHAUFFEUR ADD PRIMARY KEY (ID)');
        $this->addSql('ALTER TABLE LOCATION DROP typeLoca');
        $this->addSql('ALTER TABLE LOCAVECCHAUFFEUR DROP FOREIGN KEY FK_59EFC79862D6E0B7');
        $this->addSql('ALTER TABLE LOCAVECCHAUFFEUR ADD DATELOCATION DATE DEFAULT NULL, ADD MONTANTREGLE CHAR(32) DEFAULT NULL, ADD DATEHEUREDEPARTPREVU DATETIME DEFAULT NULL, ADD DATEHEURERETOURPREVU DATETIME DEFAULT NULL, ADD DATEHEUREDEPARTREEL DATETIME DEFAULT NULL, ADD DATEHEURERETOURREEL DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE LOCAVECCHAUFFEUR ADD CONSTRAINT FK_LOCAVECCHAUFFEUR_LOCATION FOREIGN KEY (NUMLOCATION) REFERENCES LOCATION (NUMLOCATION)');
        $this->addSql('ALTER TABLE LOCSANSCHAUFFEUR DROP FOREIGN KEY FK_F1BBD6D662D6E0B7');
        $this->addSql('ALTER TABLE LOCSANSCHAUFFEUR ADD DATELOCATION DATE DEFAULT NULL, ADD MONTANTREGLE CHAR(32) DEFAULT NULL, ADD DATEHEUREDEPARTPREVU DATETIME DEFAULT NULL, ADD DATEHEURERETOURPREVU DATETIME DEFAULT NULL, ADD DATEHEUREDEPARTREEL DATETIME DEFAULT NULL, ADD DATEHEURERETOURREEL DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE LOCSANSCHAUFFEUR ADD CONSTRAINT FK_LOCSANSCHAUFFEUR_LOCATION FOREIGN KEY (NUMLOCATION) REFERENCES LOCATION (NUMLOCATION)');
        $this->addSql('ALTER TABLE SALARIE DROP FOREIGN KEY FK_BDCBC40011D3633A');
        $this->addSql('ALTER TABLE SALARIE ADD NOM CHAR(32) DEFAULT NULL, ADD PRENOM CHAR(32) DEFAULT NULL, ADD LOGIN CHAR(32) DEFAULT NULL, ADD MOTDEPASSE VARCHAR(512) DEFAULT NULL');
        $this->addSql('ALTER TABLE SALARIE ADD CONSTRAINT FK_SALARIE_USER FOREIGN KEY (ID) REFERENCES USER (ID)');
        $this->addSql('ALTER TABLE user DROP typeUser');
    }
}