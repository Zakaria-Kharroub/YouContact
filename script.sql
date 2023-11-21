CREATE DATABASE contactDB
USE contactDB
USE contactDB
-- Table Utilisateur

CREATE TABLE Utilisateur (
    UserID INT PRIMARY KEY,
    NomUtilisateur VARCHAR(255),
    MotDePasse VARCHAR(255),
    Email VARCHAR(255), -- Ajout du champ email
    DateInscription DATETIME
);

-- Table Contact
CREATE TABLE Contact (
    ContactID INT PRIMARY KEY,
    UserID INT,
    Nom VARCHAR(255),
    Téléphone VARCHAR(15),
    Email VARCHAR(255),
    Adresse VARCHAR(255),
    FOREIGN KEY (UserID) REFERENCES Utilisateur(UserID)
);


