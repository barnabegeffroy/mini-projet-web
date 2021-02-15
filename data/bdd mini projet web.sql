--##############################################################
--# Script SQL
--# Author: 
--# Function: Création schéma BD
--###############################################################
-- If tables already exist
DROP TABLE IF EXISTS Personne;

DROP TABLE IF EXISTS Signe;

CREATE TABLE Signe (
    signe_astro VARCHAR(10) CONSTRAINT dom_signe_astro CHECK(
        signe_astro IN (
            'Bélier',
            'Taureau',
            'Gémeaux',
            'Cancer',
            'Lion',
            'Vierge',
            'Balance',
            'Scorpion',
            'Sagittaire',
            'Capricorne',
            'Verseau',
            'Poisson'
        )
    ) PRIMARY KEY,
    date_debut DATE,
    date_fin DATE,
    element VARCHAR(10) CONSTRAINT dom_element CHECK(element IN ('Air', 'Terre', 'Eau', 'Feu'))
);

CREATE TABLE Personne (
    num_enregistrement INTEGER CONSTRAINT cleprim_personne PRIMARY KEY,
    nom VARCHAR(20) NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    email VARCHAR(40),
    signe_astro VARCHAR(10) CONSTRAINT cle_etr_Personne FOREIGN KEY Signe(signe_astro)
);

----------- mettre le nom de la base de données ------------------
GRANT all privileges ON Personne TO -----* * * * *-------;

GRANT all privileges ON Signe TO -----* * * * *-------;