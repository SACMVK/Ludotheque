use ludotheque;


# Insertion de données de la table compte OK
INSERT INTO compte (adresse,ville,email,telephone,pseudo,dateInscription,mdp,codePostal,numDept,droit) VALUES ("5 rue du trou","Rennes","bim.gmail.com","0706958473","bim","2017-01-30","jkhjh","35000","35","Utilisateur");
INSERT INTO compte (adresse,ville,email,telephone,pseudo,dateInscription,mdp,codePostal,numDept,droit) VALUES ("5 rue du plouf","Vannes","rom.gmail.com","0706958473","rom","2017-02-10","lkjks","56000","56","Administrateur");
INSERT INTO compte (adresse,ville,email,telephone,pseudo,dateInscription,mdp,codePostal,numDept,droit) VALUES ("12 place de la resistance","Rennes","calib.gmail.com","0706958473","calib","2017-01-12","oooosp","35000","35","Modérateur");

# Insertion de données de la table individu OK
INSERT INTO individu (idUser,nom,prenom,dateNaiss) VALUES (1,"Mcdaniel","Seth","2016-02-05");
INSERT INTO individu (idUser,nom,prenom,dateNaiss) VALUES (2,"Jarvis","Tad","2017-02-15");
INSERT INTO individu (idUser,nom,prenom,dateNaiss) VALUES (3,"Rom","jeff","1980-05-06");

# Insertion de données de la table user_prefere_genre OK
INSERT INTO user_prefere_genre (idUser, genre) VALUES ('2', 'Plateau');
