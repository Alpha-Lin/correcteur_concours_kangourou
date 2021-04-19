CREATE TABLE sujets ( -- représente un sujet d'une année
    année YEAR NOT NULL,
    niveau CHAR(1) NOT NULL,
    réponses CHAR(26) NOT NULL,
    PRIMARY KEY (année, niveau)
);

CREATE TABLE utilisateurs ( -- réprésente un utilisateur
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(20) NOT NULL,
    motDePasse CHAR(97) NOT NULL,
    année_BAC YEAR NOT NULL,
    date_inscription TIMESTAMP NOT NULL,
    administrateur BOOL NOT NULL
);

CREATE TABLE commentaires ( -- réprésente les notes attribuées à un sujet par un utilisateur
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_user INT NOT NULL,
    niveau CHAR(1) NOT NULL,
    année YEAR NOT NULL,
    commentaire VARCHAR(200) NOT NULL,
    date_comm TIMESTAMP NOT NULL,
    FOREIGN KEY(id_user) REFERENCES utilisateurs(id)
);
