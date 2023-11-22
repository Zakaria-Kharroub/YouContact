-- Créer la base de données contactDB
CREATE DATABASE IF NOT EXISTS contactDB;
USE contactDB;

-- Table Utilisateur
CREATE TABLE Utilisateur (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    NomUtilisateur VARCHAR(255),
    MotDePasse VARCHAR(255),
    Email VARCHAR(255),
    DateInscription DATETIME
);

-- Table Contact
CREATE TABLE Contact (
    ContactID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    Nom VARCHAR(255),
    Téléphone VARCHAR(15),
    Email VARCHAR(255),
    Adresse VARCHAR(255),
    FOREIGN KEY (UserID) REFERENCES Utilisateur(UserID)
);
