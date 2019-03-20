CREATE TABLE Client
(
    IdClient INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	passwordClient VARCHAR(25),
	nomClient VARCHAR(50),
	prenomClient VARCHAR(50),
    mailClient VARCHAR(100),
	telClient VARCHAR(10),
    adresseClient VARCHAR(200)
)

CREATE TABLE Commande
(
	IdCommande INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	prix FLOAT,
	datePaiement DATE,
	validation INT
)

CREATE TABLE Produit
(
	IdProduit INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	animal VARCHAR (100),
	partie VARCHAR (100),
	poids FLOAT,
	prixKg FLOAT,
	note FLOAT,
	type INT
)

CREATE TABLE Vendeur
(
	IdVendeur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	passwordVendeur VARCHAR(25),
	nomVendeur VARCHAR(50),
	prenomVendeur VARCHAR(50),
    nomFerme VARCHAR(100),
	emailVendeur VARCHAR(100),
	nbVentes INT
)



