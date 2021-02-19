--##############################################################
--# Script SQL
--# Author: Groupe 29
--# Function: Création des relations astro_personne et astro_signe
--###############################################################
-- If tables already exist
DROP TABLE IF EXISTS astro_personne;

DROP TABLE IF EXISTS astro_signe;

CREATE TABLE astro_signe (
    nom_signe_astro VARCHAR(10) CONSTRAINT dom_nom_signe_astro CHECK(
        nom_signe_astro IN (
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

CREATE TABLE astro_personne (
    num_enregistrement VARCHAR CONSTRAINT cleprim_personne PRIMARY KEY,
    nom VARCHAR(20) NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    email VARCHAR(40),
    nom_signe_astro VARCHAR(10),
    CONSTRAINT cle_etr_Personne FOREIGN KEY (nom_signe_astro) REFERENCES astro_signe(nom_signe_astro)
);

GRANT all privileges ON astro_personne TO tpcurseurs;
GRANT all privileges ON astro_signe TO tpcurseurs;