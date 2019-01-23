DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
  email varchar(50) NOT NULL,
  firstname varchar(30) NOT NULL,
  lastname varchar(30) NOT NULL,
  password varchar(100) NOT NULL,
  PRIMARY KEY (email)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS vendeur;
CREATE TABLE IF NOT EXISTS vendeur (
  codeVendeur varchar(10) NOT NULL,
  email varchar(50) NOT NULL,
  PRIMARY KEY (codeVendeur),
  KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE vendeur
  ADD CONSTRAINT vendeur_ibfk_1 FOREIGN KEY (email) REFERENCES users (email) ON DELETE CASCADE ON UPDATE CASCADE;


DROP TABLE IF EXISTS liste;
CREATE TABLE IF NOT EXISTS liste (
  codeListe varchar(10) NOT NULL,
  codeVendeur varchar(10) NOT NULL,
  statut varchar(50) NOT NULL,
  PRIMARY KEY (codeListe)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE liste
  ADD CONSTRAINT liste_ibfk_1 FOREIGN KEY (codeVendeur) REFERENCES vendeur(codeVendeur) ON DELETE CASCADE ON UPDATE CASCADE;



DROP TABLE IF EXISTS article;
CREATE TABLE IF NOT EXISTS article (
  codeArticle varchar(5) NOT NULL,
  codeListe varchar(10) NOT NULL,
  intitule varchar(50),
  prix int NOT NULL,
  statut varchar(50) NOT NULL,
  commentaire varchar(60),
  PRIMARY KEY (codeArticle),
  KEY codeListe (codeListe)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE article
  ADD CONSTRAINT article FOREIGN KEY (codeListe) REFERENCES liste (codeListe) ON DELETE CASCADE ON UPDATE CASCADE;

DROP TABLE IF EXISTS acheteur;
CREATE TABLE IF NOT EXISTS acheteur (
  codeArticle varchar(5) NOT NULL,
  nomAcheteur varchar(30) NOT NULL,
  PRIMARY KEY (nomAcheteur)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE acheteur
  ADD CONSTRAINT acheteur FOREIGN KEY (codeArticle) REFERENCES article (codeArticle) ON DELETE CASCADE ON UPDATE CASCADE;

