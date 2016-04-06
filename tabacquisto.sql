CREATE TABLE Acquisto(
    Descrizione VARCHAR(100),
    Dataacquisto DATE,  
    Valore DECIMAL(6,2),
    Nomenegozio VARCHAR(15),  
    UtentePropr VARCHAR(20),
    FOREIGN KEY(UtentePropr) REFERENCES Utente(Username)
     ON DELETE CASCADE
     ON UPDATE CASCADE,
    FOREIGN KEY(Nomenegozio) REFERENCES Negozio(Nome)
     ON DELETE CASCADE
     ON UPDATE CASCADE,
    PRIMARY KEY (Descrizione,Dataacquisto,Valore)
  ) ENGINE = InnoDB;
  
 CREATE TABLE Negozio(
   Nome VARCHAR(15) PRIMARY KEY,
   Indirizzo VARCHAR(20) 
 ) ENGINE = InnoDB;
  
 CREATE TABLE Tipologia(
   Nome VARCHAR(15) PRIMARY KEY
 ) ENGINE = InnoDB;
 
 CREATE TABLE Riguarda(
   Descrizione VARCHAR(100),
   Dataacquisto DATE,
   Valore DECIMAL(6,2),
   NomeTip VARCHAR(15), 
   PRIMARY KEY (Descrizione,Dataacquisto,Valore,NomeTip)
 ) ENGINE = InnoDB;

INSERT INTO Negozio(Nome) VALUES ('Coop');
INSERT INTO Negozio(Nome) VALUES ('Alì');
INSERT INTO Acquisto(Descrizione,Dataacquisto,Valore,Nomenegozio,UtentePropr)
 VALUES('Spesa','20131124','35','Coop','Luca');

INSERT INTO Tipologia(Nome) VALUES ('Alimentari');
INSERT INTO Tipologia(Nome) VALUES ('Abbigliamento');
INSERT INTO Tipologia(Nome) VALUES ('Tecnologia');
INSERT INTO Tipologia(Nome) VALUES ('Affitto');

INSERT INTO Riguarda(Descrizione,Dataacquisto,Valore,NomeTip)
 VALUES('Spesa','20131124','35','Alimentari');
 
INSERT INTO Riguarda(Descrizione,Dataacquisto,Valore,NomeTip)
 VALUES('Spesa','20131124','35','Tecnologia');
 
select Acquisto.Descrizione, Acquisto.Dataacquisto, Acquisto.Valore, Acquisto.Nomenegozio,Riguarda.NomeTip 
from Acquisto, Riguarda
where (Acquisto.Descrizione = Riguarda.Descrizione) and (Acquisto.Dataacquisto = Riguarda.Dataacquisto) and (Acquisto.Valore = Riguarda.Valore)