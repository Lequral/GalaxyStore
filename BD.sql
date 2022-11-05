CREATE TABLE Client(
   idCl INT AUTO_INCREMENT,
   pseudo VARCHAR(50),
   mail VARCHAR(50),
   argent INT,
   mdp VARCHAR(50),
   PRIMARY KEY(idCl)
);

CREATE TABLE Planete(
   idPl INT AUTO_INCREMENT,
   nomPl VARCHAR(50),
   massPl INT,
   surf INT,
   tempPl INT,
   distPl INT,
   idCl INT,
   PRIMARY KEY(idPl),
   FOREIGN KEY(idCl) REFERENCES Client(idCl)
);

CREATE TABLE Etoile(
   idEt INT AUTO_INCREMENT,
   nomEt VARCHAR(50),
   masseEt INT,
   energie INT,
   tempEt INT,
   distEt VARCHAR(50),
   PRIMARY KEY(idEt)
);

CREATE TABLE PARTAGER(
   idCl INT,
   idEt INT,
   prct INT,
   PRIMARY KEY(idCl, idEt),
   FOREIGN KEY(idCl) REFERENCES Client(idCl),
   FOREIGN KEY(idEt) REFERENCES Etoile(idEt)
);
