use ludotheque;

# Insertion de données de la table pret_p TODO
INSERT INTO pret_p (idJeuP, idEmprunteur, dateDebut, dateRendu, jeuRenduATemps,notification) VALUES ('1', '2', '2017-02-08', '2017-02-16', '1','1');

# Insertion de données de la table commentaire_jeu_p OK
INSERT INTO commentaire_jeu_p (idJeuP, commentaireJP) VALUES ('1', 'boite pas complète');

# Insertion de données de la table notation_user TODO
INSERT INTO notation_user (idNU, idUser, idNoteur, notation, typeNoteur) VALUES (NULL, '1', '2', '5', 'Emprunteur');

# Insertion de données de la table commentaire_user OK
INSERT INTO commentaire_user (idNU, commentaireU) VALUES ('1', 'sympa!');







