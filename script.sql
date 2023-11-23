
DROP DATABASE IF EXISTS contactDB;

-- Créer une nouvelle base de données
CREATE DATABASE contactDB;

USE contactDB;


CREATE TABLE Utilisateur (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    NomUtilisateur VARCHAR(255),
    MotDePasse VARCHAR(255),
    Email VARCHAR(255),
    DateInscription DATETIME
) ENGINE=InnoDB;


CREATE TABLE Contact (
    ContactID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    Nom VARCHAR(255),
    telephone VARCHAR(15),
    Email VARCHAR(255),
    Adresse VARCHAR(255),
    FOREIGN KEY (UserID) REFERENCES Utilisateur(UserID)
) ENGINE=InnoDB;
