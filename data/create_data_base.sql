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
    jour_debut INTEGER,
    mois_debut INTEGER,
    jour_fin INTEGER,
    mois_fin INTEGER,
    element VARCHAR(10) CONSTRAINT dom_element CHECK(element IN ('Air', 'Terre', 'Eau', 'Feu'))
);

CREATE TABLE Personne (
    num_enregistrement INTEGER CONSTRAINT cleprim_personne PRIMARY KEY,
    nom VARCHAR(20) NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    email VARCHAR(40),
    signe_astro VARCHAR(10),
    CONSTRAINT cle_etr_Personne FOREIGN KEY (signe_astro) REFERENCES Signe(signe_astro)
);

GRANT all privileges ON Personne TO tpphp;
GRANT all privileges ON Signe TO tpphp;