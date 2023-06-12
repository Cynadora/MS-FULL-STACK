--REQUETES D'INTERROGATION DE LA BDD

    1--ok Afficher la liste des commandes ( la liste doit faire apparaitre la date, les informations du client, le plat et le prix )
SELECT date_commande, nom_client, telephone_client, email_client, adresse_client, libelle, total
FROM commande 
JOIN plat  ON id_plat = plat.id;


    2--ok Afficher la liste des plats en spécifiant la catégorie
    SELECT plat.libelle, categorie.libelle
    FROM plat
    JOIN categorie ON plat.id_categorie = categorie.id;

    3--ok Afficher les catégories et le nombre de plats actifs dans chaque catégorie

    SELECT COUNT(active)
    FROM plat
    


    4--ok Liste des plats les plus vendus par ordre décroissant
    SELECT description
    FROM plat
    ORDER BY prix DESC;



    5--okLe plat le plus rémunérateur
    SELECT libelle
    FROM plat
     -- Tri des plats par le prix du + cher au - cher
    ORDER BY prix DESC 
    -- Selectionne le plat le + rémunateur de la table 
    LIMIT 1;
    


6--okListe des clients et le chiffre d'affaire généré par client (par ordre décroissant)
SELECT commande.nom_client, SUM(commande.total) AS chiffre_affaire
                   
FROM commande
GROUP BY commande.nom_client
ORDER BY total DESC;

--ECRIRE DES REQUETES DE MODIFICATION DE LA BDD
    
1--ok Ecrivez une requête permettant de supprimer les plats non actif de la base de données    
--sélectionne les plats spécifiques à supprimer (valeur 0 pour les plats non actifs)
DELETE FROM plat
WHERE plat.active = 'yes';

2--Ecrivez une requête permettant de supprimer les commandes avec le statut livré
DELETE FROM commande
WHERE etat = 'livrée';


3--/////Ecrivez un script sql permettant d'ajouter une nouvelle catégorie et un plat dans cette nouvelle catégorie.
INSERT INTO categorie (libelle, image, active)
VALUES ('Kebab', 'kebab.jpg', 'Yes');


4--/////Ecrivez une requête permettant d'augmenter de 10% le prix des plats de la catégorie 'Pizza'
UPDATE plat
SET prix = prix * 1.1
WHERE id_categorie = (SELECT id 
                        FROM categorie
                        WHERE libelle = 'Pizza');

