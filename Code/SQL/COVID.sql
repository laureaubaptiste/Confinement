DROP DATABASE IF EXISTS COVID;

CREATE DATABASE IF NOT EXISTS COVID;
USE COVID;
# -----------------------------------------------------------------------------
#       TABLE : HEBERGEMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS HEBERGEMENT
 (
   ID_SERVICE INT(4) NOT NULL AUTO_INCREMENT ,
   TYPE_HEBERGEMENT VARCHAR(255) NOT NULL  ,
   CAPACITE_HEBERGEMENT INTEGER(2) NOT NULL  ,
   VILLE_HEBERGEMENT VARCHAR(255) NOT NULL  ,
   DISPO_HEBERGEMENT BOOL NOT NULL  ,
   PRIX_SERVICE FLOAT(6,2) NULL  ,
   DATE_SERVICE DATE NOT NULL  
   , PRIMARY KEY (ID_SERVICE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : SERVICE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SERVICE
 (
   ID_SERVICE INT(4) NOT NULL AUTO_INCREMENT ,
   PRIX_SERVICE REAL(5,2) NULL  ,
   DATE_SERVICE DATE NOT NULL  
   , PRIMARY KEY (ID_SERVICE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PROFESSIONEL
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PROFESSIONEL
 (
   ID_PROPOSANT INT(4) NOT NULL AUTO_INCREMENT ,
   NOM_PROFESSIONNEL VARCHAR(255) NOT NULL  ,
   ADRESSE_PROPOSANT VARCHAR(255) NOT NULL  ,
   CP_PROPOSANT CHAR(32) NOT NULL  ,
   VILLE_PROPOSANT VARCHAR(255) NOT NULL  ,
   TEL_PROPOSANT CHAR(10) NOT NULL  ,
   MAIL_PROPOSANT VARCHAR(255) NOT NULL  ,
   MDP_PROPOSANT VARCHAR(255) NOT NULL  
   , PRIMARY KEY (ID_PROPOSANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : LIVRAISON_REPAS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LIVRAISON_REPAS
 (
   ID_SERVICE INT(4) NOT NULL AUTO_INCREMENT ,
   DATE_LIVRAISON DATE NOT NULL  ,
   QTE_LIVRAISON INT(4) NOT NULL  ,
   HEURE_LIVRAISON TIME NOT NULL  ,
   PRIX_SERVICE REAL(5,2) NULL  ,
   DATE_SERVICE DATE NOT NULL  
   , PRIMARY KEY (ID_SERVICE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PROPOSANT_SERVICE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PROPOSANT_SERVICE
 (
   ID_PROPOSANT INT(4) NOT NULL AUTO_INCREMENT ,
   ADRESSE_PROPOSANT VARCHAR(255) NOT NULL  ,
   CP_PROPOSANT CHAR(32) NOT NULL  ,
   VILLE_PROPOSANT VARCHAR(255) NOT NULL  ,
   TEL_PROPOSANT CHAR(10) NOT NULL  ,
   MAIL_PROPOSANT VARCHAR(255) NOT NULL  ,
   MDP_PROPOSANT VARCHAR(255) NOT NULL  
   , PRIMARY KEY (ID_PROPOSANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : SOIGNANT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SOIGNANT
 (
   ID_SOIGNANT INT(4) NOT NULL AUTO_INCREMENT ,
   NOM_SOIGNANT VARCHAR(255) NOT NULL  ,
   PRENOM_SOIGNANT VARCHAR(255) NOT NULL  ,
   ADRESSE_SOIGNANT VARCHAR(255) NOT NULL  ,
   CP_SOIGNANT VARCHAR(6) NOT NULL  ,
   TEL_SOIGNANT VARCHAR(10) NOT NULL  ,
   MAIL_SOIGNANT VARCHAR(255) NOT NULL  ,
   MDP_SOIGNANT VARCHAR(255) NOT NULL  
   , PRIMARY KEY (ID_SOIGNANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COURSE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COURSE
 (
   ID_SERVICE INT(4) NOT NULL AUTO_INCREMENT ,
   LISTE VARCHAR(255) NOT NULL  ,
   PRIX_SERVICE REAL(5,2) NULL  ,
   DATE_SERVICE DATE NOT NULL  
   , PRIMARY KEY (ID_SERVICE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TRANSPORT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TRANSPORT
 (
   ID_SERVICE INT(4) NOT NULL  ,
   TYPE_TRANSPORT VARCHAR(255) NOT NULL  ,
   TYPE_CARBURANT VARCHAR(255) NOT NULL  ,
   DISPO_TRANSPORT BOOL NOT NULL  ,
   PRIX_SERVICE REAL(5,2) NULL  ,
   DATE_SERVICE DATE NOT NULL  
   , PRIMARY KEY (ID_SERVICE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : DON_MATERIEL
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DON_MATERIEL
 (
   ID_SERVICE INT(4) NOT NULL  ,
   TYPE_MATERIEL VARCHAR(255) NOT NULL  ,
   DISPO_MATERIEL BOOL NOT NULL  ,
   PRIX_SERVICE REAL(5,2) NULL  ,
   DATE_SERVICE DATE NOT NULL  
   , PRIMARY KEY (ID_SERVICE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARTICULIER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICULIER
 (
   ID_PROPOSANT INT(4) NOT NULL  ,
   SITUATION_PARTICULIER VARCHAR(255) NOT NULL  ,
   NOM_PARTICULIER VARCHAR(255) NOT NULL  ,
   PRENOM_PARTICULIER VARCHAR(255) NOT NULL  ,
   CIVILITE_PARTICULIER VARCHAR(255) NOT NULL  ,
   ADRESSE_PROPOSANT VARCHAR(255) NOT NULL  ,
   CP_PROPOSANT CHAR(32) NOT NULL  ,
   VILLE_PROPOSANT VARCHAR(255) NOT NULL  ,
   TEL_PROPOSANT CHAR(10) NOT NULL  ,
   MAIL_PROPOSANT VARCHAR(255) NOT NULL  ,
   MDP_PROPOSANT VARCHAR(255) NOT NULL  
   , PRIMARY KEY (ID_PROPOSANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMMANDER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMANDER
 (
   ID_PROPOSANT INT(4) NOT NULL  ,
   ID_SOIGNANT INT(4) NOT NULL  ,
   DATE_COMMANDE DATE NOT NULL  ,
   DATE_LIVRAISON DATETIME NOT NULL  ,
   DEBUT_SERVICE TIME NOT NULL  ,
   FIN_SERVICE TIME NOT NULL  ,
    PRIMARY KEY (ID_PROPOSANT,ID_SOIGNANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMMANDER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMMANDER_PROPOSANT_SERVICE
     ON COMMANDER (ID_PROPOSANT ASC);

CREATE  INDEX I_FK_COMMANDER_SOIGNANT
     ON COMMANDER (ID_SOIGNANT ASC);

# -----------------------------------------------------------------------------
#       TABLE : RENDRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RENDRE
 (
   ID_SERVICE INT(4) NOT NULL  ,
   ID_PROPOSANT INT(4) NOT NULL  
   , PRIMARY KEY (ID_SERVICE,ID_PROPOSANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RENDRE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RENDRE_SERVICE
     ON RENDRE (ID_SERVICE ASC);

CREATE  INDEX I_FK_RENDRE_PROPOSANT_SERVICE
     ON RENDRE (ID_PROPOSANT ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE HEBERGEMENT 
  ADD FOREIGN KEY FK_HEBERGEMENT_SERVICE (ID_SERVICE)
      REFERENCES SERVICE (ID_SERVICE) ;


ALTER TABLE PROFESSIONEL 
  ADD FOREIGN KEY FK_PROFESSIONEL_PROPOSANT_SERVICE (ID_PROPOSANT)
      REFERENCES PROPOSANT_SERVICE (ID_PROPOSANT) ;


ALTER TABLE LIVRAISON_REPAS 
  ADD FOREIGN KEY FK_LIVRAISON_REPAS_SERVICE (ID_SERVICE)
      REFERENCES SERVICE (ID_SERVICE) ;


ALTER TABLE COURSE 
  ADD FOREIGN KEY FK_COURSE_SERVICE (ID_SERVICE)
      REFERENCES SERVICE (ID_SERVICE) ;


ALTER TABLE TRANSPORT 
  ADD FOREIGN KEY FK_TRANSPORT_SERVICE (ID_SERVICE)
      REFERENCES SERVICE (ID_SERVICE) ;


ALTER TABLE DON_MATERIEL 
  ADD FOREIGN KEY FK_DON_MATERIEL_SERVICE (ID_SERVICE)
      REFERENCES SERVICE (ID_SERVICE) ;


ALTER TABLE PARTICULIER 
  ADD FOREIGN KEY FK_PARTICULIER_PROPOSANT_SERVICE (ID_PROPOSANT)
      REFERENCES PROPOSANT_SERVICE (ID_PROPOSANT) ;


ALTER TABLE COMMANDER 
  ADD FOREIGN KEY FK_COMMANDER_PROPOSANT_SERVICE (ID_PROPOSANT)
      REFERENCES PROPOSANT_SERVICE (ID_PROPOSANT) ;


ALTER TABLE COMMANDER 
  ADD FOREIGN KEY FK_COMMANDER_SOIGNANT (ID_SOIGNANT)
      REFERENCES SOIGNANT (ID_SOIGNANT) ;


ALTER TABLE RENDRE 
  ADD FOREIGN KEY FK_RENDRE_SERVICE (ID_SERVICE)
      REFERENCES SERVICE (ID_SERVICE) ;


ALTER TABLE RENDRE 
  ADD FOREIGN KEY FK_RENDRE_PROPOSANT_SERVICE (ID_PROPOSANT)
      REFERENCES PROPOSANT_SERVICE (ID_PROPOSANT) ;
      

# -----------------------------------------------------------------------------

#       Insertion dans la base de donnée

# -----------------------------------------------------------------------------


################################################## INSERTION D'HEBERGEMENT ##################################################

INSERT INTO hebergement VALUES ('Appartement', '3', 'Boulogne-Billancourt', TRUE); 

INSERT INTO hebergement VALUES ('Appartement', '2', 'Deauville', TRUE); 

INSERT INTO hebergement VALUES ('Appartement', '1', 'Marseille', TRUE); 

INSERT INTO hebergement VALUES ('Appartement', '6', 'Paris', TRUE); 

INSERT INTO hebergement VALUES ('Appartement', '9', 'Lyon', TRUE); 


################################################## INSERTION TRANSPORT ##################################################

INSERT INTO transport VALUES ('moto', 'gazole', TRUE); 

INSERT INTO transport VALUES ('voiture', 'diesel', TRUE); 

INSERT INTO transport VALUES ('vtc', 'naturel', TRUE); 

INSERT INTO transport VALUES ('trottinette', 'naturel', TRUE); 

INSERT INTO transport VALUES ('roller', 'naturel', TRUE); 


################################################## INSERTION DON DE MATERIEL MEDICAL ##################################################

INSERT INTO livraison VALUES ('bequille', TRUE); 

INSERT INTO livraison VALUES ('gel hydroalcoolique',  TRUE); 

INSERT INTO livraison VALUES ('masque',  TRUE); 

INSERT INTO livraison VALUES ('desinfectant', TRUE); 

INSERT INTO livraison VALUES ('serviette',  TRUE); 

################################################## INSERTION PARTICULIER ##################################################

INSERT INTO particulier VALUES ('artisan', 'Dupont', 'Louis', 'Monsieur'); 

INSERT INTO particulier VALUES ('restaurateur', 'Larson', 'Nicky', 'Monsieur'); 

INSERT INTO particulier VALUES ('dj','Simpson', 'Homer', 'Monsieur'); 

INSERT INTO particulier VALUES ('maître nageur', 'Darendelle', 'Else', 'Femme'); 

INSERT INTO particulier VALUES ('ingenieur', 'Darendelle', 'Anna', 'Femme'); 


################################################## INSERTION PROFESSIONNEL ##################################################

INSERT INTO particulier VALUES ('Hopital Foch'); 

INSERT INTO particulier VALUES ('Hopital Bichat'); 

INSERT INTO particulier VALUES ('Hopital Salpetriere'); 

INSERT INTO particulier VALUES ('Hopital Americain'); 

INSERT INTO particulier VALUES ('Hopital Necker'); 


################################################## INSERTION SOIGNANT ##################################################

INSERT INTO soignant VALUES ('Durand', 'Jean', '1 Rue de Boulogne-Billancourt', '92670', 'Nanterre', '0879381539'); 

INSERT INTO soignant VALUES ('Claude', 'Francois' ,'742 Evergreen Terrace', '63693', 'Springfield', '0939555011'); 

INSERT INTO soignant VALUES ('Neutron', 'Jimmy', '542 Dragons Stand', '90454', 'Heart of Thorns', '0988231234'); 

INSERT INTO soignant VALUES ('CARA', 'Alicia', '3 rue Chateau', '50000', 'Los Angeles', '0654555125'); 

INSERT INTO soignant VALUES ('CAEN', 'Corentin', '97 Boulevard Leroy',  '10000', 'Tokyo','0628432312'); 

# -----------------------------------------------------------------------------

#       TRIGGER

# -----------------------------------------------------------------------------




Drop Trigger if exists verif_datefinlivraison;

Delimiter //
Create trigger verif_datelivraison
Before Insert 
On LIVRAISON_REPAS
For each row
Begin 
if new.DATE_LIVRAISON < curdate()
  Then 
    Signal SQLState '80000'
    Set message_text = 'Impossible';
END if;
END; //
Delimiter ;

Insert into LIVRAISON_REPAS values (null, '2020-04-20', 2, '09:00:00', 50.0, '2020-04-10');
