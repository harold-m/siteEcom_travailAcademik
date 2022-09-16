/* CREATION DES TABLES */

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS Produits;
DROP TABLE IF EXISTS Clients;
DROP TABLE IF EXISTS Commandes;
DROP TABLE IF EXISTS LigneCommandes;

CREATE TABLE IF NOT EXISTS Produits (
    numProduit int PRIMARY KEY AUTO_INCREMENT,
    catégorie enum('téléphone', 'tablette', 'écouteurs'),
    nom varchar(50) NOT NULL DEFAULT '',
    marque varchar(50) NOT NULL DEFAULT '',
    descrip varchar(200),
    prix float,
    photo varchar(300)
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS Clients (
    numClient int PRIMARY KEY AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    motDePasse varchar(50) NOT NULL,
    nom varchar(50) NOT NULL DEFAULT '',
    prenom varchar(50) NOT NULL DEFAULT '',
    ville varchar(50) NOT NULL DEFAULT '',
    adresse varchar(50) NOT NULL DEFAULT '',
    telephone int NOT NULL 
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS Commandes (
    idCommande int NOT NULL PRIMARY KEY,
    dateCommande date NOT NULL,
    etat varchar(50) NOT NULL,
    email varchar(50),
    numClient int,
    CONSTRAINT fk_numClient FOREIGN KEY (numClient) REFERENCES Clients(numClient) ON DELETE CASCADE
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS LigneCommandes (
    idLigneCommande int NOT NULL PRIMARY KEY,
    quantite int,
    montant float,
    idCommande int,
    numProduit int,
    numClient int,
    CONSTRAINT fk_idCommande FOREIGN KEY (idCommande) REFERENCES Commandes(idCommande),
    CONSTRAINT fk_numClient2 FOREIGN KEY (numClient) REFERENCES Clients(numClient),
    CONSTRAINT fk_numProduit FOREIGN KEY (numProduit) REFERENCES Produits(numProduit)
);

/* INSERTION */

INSERT INTO Produits (numProduit, catégorie, nom, marque, descrip, prix, photo) VALUES
(1,'téléphone', 'Galaxy S9', 'Samsung', '<p> description</p>', 155, 'samsung-galaxy-s9-128-gb.jpg'),
(2,'téléphone', 'Galaxy S10E', 'Samsung', '<p> description</p>', 499.99, 'Galaxy-S10E.jpg'),
(3,'téléphone', 'iPhone X', 'Apple', '<p> description</p>', 729, 'iphone-xs-max.jpeg'),
(4,'téléphone', 'Oxygen', 'Archos', '<p> description</p>', 169, 'Archos-Oxygen-P.jpg'),
(5,'téléphone', 'Galaxy S9 v2.0', 'Samsung', '<p> description</p>', 199, 'galaxy-s9.jpg'),
(6,'écouteurs', 'airPods v1', 'Apple', '<p> description</p>', 179, 'Airpods v1.jpeg'),
(7,'écouteurs', 'airPods 2', 'Apple', '<p> description</p>', 179, 'Airpods 2.jpeg'),
(8,'écouteurs', 'EG 920', 'Samsung', '<p> description</p>', 729, 'Samsung-EG920.jpg'),
(9,'écouteurs', 'Level Active', 'Samsung', '<p> description</p>', 729, 'Samsung-Level-Active.jpg'),
(10,'écouteurs', 'Galaxy Buds Pro', 'Samsung', '<p> description</p>', 729, 'Galaxy Buds Pro.jpg'),
(11,'tablette', 'Oxygen', 'Archos', '<p> description</p>', 729, 'Archos-Oxygen.jpg'),
(12,'tablette', 'iPad Air 2', 'Apple', '<p> description</p>', 729, 'Ipad-Air-2.jpg'),
(13,'tablette', 'Galaxy view 2', 'Samsung', '<p> description</p>', 729, 'samsung-galaxy-view-2.png'),
(14,'tablette', 'Galaxy Tab S6', 'Samsung', '<p> description</p>', 729, 'Galaxy Tab S6.jpg'),
(15,'tablette', 'Oxygen 156', 'Archos', '<p> description</p>', 729, 'Archos 156.jpg');

INSERT INTO Clients (numClient, email, motDePasse, nom, prenom, ville, adresse, telephone) VALUES
(1, 'test@gmail.com', 'test', 'admin', 'admine', 'Montpellier', 'Centre', 0611223344),
(2, 'tester@gmail.com', 'tester', 'admino', 'admina', 'Montpellier', 'Nord', 0611225566);






