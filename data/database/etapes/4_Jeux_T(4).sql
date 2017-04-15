use ludotheque;




# Insertion de données de la table produit_culturel_t OK
INSERT INTO produit_culturel_t (idPC, typePC, anneeSortie, description) VALUES (NULL, 'Jeux de société', '2016', 'est bon un sushi de super-méchant, surtout lorsque vous êtes un super-héros... À dire vrai, nous allons carrément vous proposer de vous mettre dans la peau d\'un auteur de comics. Vous savez, ces histoires de super-héros en collants moulants, à la cape qui ne s\'empige jamais dans les pattes ou dans un réacteur, non jamais, à la psychologie particulière (\"racontez-moi ce que vous faisiez avec vos sous-vêtements, enfant, pour maintenant les exhiber ainsi ?\"');

# Insertion de données de la table jeu_t OK
INSERT INTO jeu_t (idPC, nbJoueursMin, nbJoueursMax, nom, editeur, regles, difficulte, public, listePieces, dureePartie) VALUES (1, '2', '5', 'POW', 'Gigamic', 'Des petits dés...\r\n\r\nVous voilà attablé avec vos collègues co-auteurs et néanmoins adversaires... entre 2 et 5, c\'est parfait ! Nous pouvons éditer de la jeunesse donc à partir de 8 ans, ça passe !\r\n\r\nLes 12 tuiles de Super-héros, en bleues, sont alignées aléatoirement. Sur la ligne du dessous, il en va de même pour les 12 Super-vilains en oranges. Le premier auteur se saisit des 5 dés aux 4 symboles différents et les lance sur la table (super-force s\'abstenir à moins de devoir fouiller la ville voisine pour les retrouver...).\r\n\r\nIl aura le droit d\'améliorer son lancé s\'il le désire, et ce, jusqu\'à 2 fois. Mais pour relancer les dés, il faudra, à chaque fois, mettre un dé de côté qui ne pourra plus être modifié. Lorsque le joueur s\'estime satisfait (ou à l\'issue du troisième lancé de toute façon), il va choisir quelle face de dé s\'appliquera pour récupérer une tuile, ce qui marque la fin de son tour.\r\n\r\nLes boucliers bleus permettent d\'aller chercher un super-héros. Et le nombre de boucliers indique jusqu\'où vous pouvez aller le chercher dans la file. Avec trois boucliers, je peux prendre le premier ou le deuxième ou le troisième, voyez !\r\n\r\nLes têtes de mort oranges... eh oui, votre pouvoir de précog est impressionnant et vous avez raison, vous pourrez faire de même, mais avec les super-chantmés !', 'Moyen', 'Pour tous', NULL, '20 minutes');

# Insertion de données de la table jeu_a_pour_genre OK
INSERT INTO jeu_a_pour_genre (idPC, genre) VALUES ('1', 'Plateau');

# Insertion de données de la table a_pour_image OK
INSERT INTO a_pour_image (idPC, source) VALUES ('1', 'C:\\Users\\admin\\Pictures\\235839.jpg');

