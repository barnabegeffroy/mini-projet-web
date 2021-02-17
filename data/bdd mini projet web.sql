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
    jour_debut VARCHAR(10),
    mois_debut VARCHAR(10),
    jour_fin VARCHAR(10),
    mois_fin VARCHAR(10),
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


INSERT INTO Signe VALUES('Bélier','21','03', '20','04','Feu');
INSERT INTO Signe VALUES('Taureau', '21','04', '20','05','Terre');
INSERT INTO Signe VALUES('Gémeaux', '22','05', '21','06','Air');
INSERT INTO Signe VALUES('Cancer', '22','06', '22','07','Eau');
INSERT INTO Signe VALUES('Lion', '23','07', '22','08','Feu');
INSERT INTO Signe VALUES('Vierge', '23','08', '22','09','Terre');
INSERT INTO Signe VALUES('Balance', '23','09', '22','10','Air');
INSERT INTO Signe VALUES('Scorpion', '23','10', '22','11','Eau');
INSERT INTO Signe VALUES('Sagittaire', '23','11', '21','12','Feu');
INSERT INTO Signe VALUES('Capricorne', '22','12', '20','01','Terre');
INSERT INTO Signe VALUES('Verseau', '21','01', '18','02','Air');
INSERT INTO Signe VALUES('Poisson', '19','02', '20','03','Eau');

INSERT INTO Personne VALUES(001, 'Harivel', 'Alexia', 'alexia.harivel@ensiie.fr', 'Poisson');
INSERT INTO Personne VALUES(002, 'Clavel', 'Clemence', 'clemence.clavel@ensiie.fr', 'Taureau');
INSERT INTO Personne VALUES(003, 'Gayet', 'Constant', 'constant.gayet@ensiie.fr', 'Taureau');
INSERT INTO Personne VALUES(004, 'Barnabe', 'Geffroy', 'barnabe.geffroy@ensiie.fr', 'Verseau');


----------- mettre le nom de la base de données ------------------
GRANT all privileges ON Personne TO PUBLIC

GRANT all privileges ON Signe TO PUBLIC