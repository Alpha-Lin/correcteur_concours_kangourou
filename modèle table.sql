CREATE TABLE sujets ( -- représente un sujet d'une année
    année YEAR NOT NULL,
    niveau CHAR(1) NOT NULL,
    réponses CHAR(26) NOT NULL,
    PRIMARY KEY (année, niveau)
);
