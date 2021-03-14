CREATE TABLE sujets ( -- représente un sujet d'une année
    année YEAR NOT NULL,
    niveau CHAR(1) NOT NULL,
    réponses CHAR(26) NOT NULL,
    PRIMARY KEY (année, niveau)
);

CREATE TABLE commentaires ( -- réprésente les notes attribuées à un sujet par un user
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(20) NOT NULL,
    niveau CHAR(1) NOT NULL,
    année YEAR NOT NULL,
    commentaire VARCHAR(200) NOT NULL,
    date_comm TIMESTAMP NOT NULL
);
