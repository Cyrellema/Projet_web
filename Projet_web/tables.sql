CREATE TABLE IF NOT EXISTS produits (
  idProduit int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  catégorie enum('téléphone', 'tablette', 'écouteurs'),
  nom varchar(50) NOT NULL,
  descriptif varchar(60),
  marque varchar(50) NOT NULL,
  prix float,
  stock int)
ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;


INSERT INTO produits (catégorie, nom, marque, prix, descriptif) VALUES
('téléphone', 'Galaxy A20', 'Samsung', 155, 'Pas très cher mais bug beaucoup', 'https://www.cdiscount.com/pdt2/9/0/4/1/700x700/sam3344511761904/rw/samsung-galaxy-a20-3-32go-orange-reconditionne.jpg'),
('téléphone', 'Galaxy S10E', 'Samsung', 499.99, 'Il est vert', 'https://m.media-amazon.com/images/I/51IcbdWtnCL._AC_SX679_.jpg'),
('téléphone', 'iPhone X', 'Apple', 729, 'Cher pour peu', 'https://www.cdiscount.com/pdt2/5/0/6/1/700x700/non8402840030506/rw/apple-iphone-x-256gb-silver-eu-mqag2_-a.jpg'),
('tablette', 'Oxygen', 'Archos', 169, 'Ceci est une tablette', 'https://static.fnac-static.com/multimedia/Images/6A/6A/D4/BD/12440682-1505-1540-1/tsp20211201171033/Archos-101s-Oxygen-Tablette-Android-9-0-Pie-32-Go-10-1-IPS-1900-x-1200-hote-USB-Logement-microSD-3G-4G-LTE-gris.jpg'),
('tablette', 'iPad Air 2', 'Apple', 199, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/ipad-air-select-202009?wid=886&hei=1070&fmt=jpeg&qlt=80&.v=1599066777000'),
('écouteurs', 'airPods 2', 'Apple', 179, 'cher pour peu', 'https://img.20mn.fr/o_sg10PnR8Gl7C0zhKG15yk/960x614_profitez-plus-35-reduction-airpods-2-boitier-filaire-occasion-black-friday-cdiscount.jpg');

CREATE TABLE IF NOT EXISTS clients (
  email varchar(32) NOT NULL PRIMARY KEY,
  motDePasse varchar(16) NOT NULL,
  nom varchar (16) NOT NULL,
  prenom varchar (16) NOT NULL,
  adresse varchar (50) NOT NULL,
  telephone varchar (15) NOT NULL,
  photo text NOT NULL)
ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;


CREATE TABLE IF NOT EXISTS commandes(
    idCommande int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dateCommande date,
    etat varchar(30),
    email varchar (32))
ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;


CREATE TABLE IF NOT EXISTS lignesCommandes(
    idLigneCommande int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idCommande int, 
    quantite int,
    montant float,
    idProduit int)
ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci

--ALTER TABLE commandes ADD FOREIGN KEY(email) REFERENCES clients (email) ;
--ALTER TABLE lignescommandes ADD FOREIGN KEY (idCommande) REFERENCES commandes(idCommande);
--ALTER TABLE lignescommandes ADD FOREIGN KEY (idProduit) REFERENCES produits(idProduit);