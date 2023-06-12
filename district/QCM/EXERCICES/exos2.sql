-- LES JOINTURES

1 -- ok Rechercher le prénom des employés et le numéro de la région de leur département.
--Sélection de la colonne prenom et n° de la région
SELECT prenom, noregion
--Sélection de la table employe
FROM employe
--Joindre la table 'dept' sur la condition que le n° de département de la table dept soit égal au n° de département de la table employe
JOIN dept ON dept.nodept = employe.nodep;

2--////////Rechercher le numéro du département, le nom du département, le nom des employés classés par numéro de département (renommer les
--tables utilisées)

SELECT nodept as 'Numéro département', dept.nom as 'Nom département', employe.nom as 'Nom employé'
FROM employe
JOIN dept ON nodept = nodep
ORDER BY nodept;


3--ok Rechercher le nom des employés du département Distribution
SELECT employe.nom
FROM employe
JOIN dept ON employe.nodep = dept.nodept
WHERE dept.nom = 'Distribution';


4--okRechercher le nom et le salaire des employés qui gagnent plus que leur patron, et le nom et le salaire de leur patron.
SELECT employe.nom, employe.salaire, patron.nom, patron.salaire
FROM employe
JOIN employe patron ON employe.nosup = patron.noemp 
WHERE employe.salaire > patron.salaire;



5--okkk  Rechercher le nom et le titre des employés qui ont le même titre que Amartakaldire
SELECT nom, titre
FROM employe
WHERE titre =(SELECT titre FROM employe WHERE nom = 'Amartakaldire');



6--ok Rechercher le nom, le salaire et le numéro de département des employés qui gagnent plus qu'un seul employé du département 31,
--classés par numéro de département et salaire
SELECT nom, salaire, nodep
FROM employe
WHERE salaire > ANY
(SELECT salaire FROM employe WHERE nodep = 31);

7--ok Rechercher le nom, le salaire et le numéro de département des employés qui gagnent plus que tous les employés du département 31,
--classés par numéro de département et salaire.
SELECT nom, salaire, nodep
FROM employe
WHERE salaire > ALL
(SELECT salaire FROM employe WHERE nodep = 31);

8--ok Rechercher le nom et le titre des employés du service 31 qui ont un titre que l'on trouve dans le département 32.
SELECT nom, titre
FROM employe
WHERE nodep = '31' AND titre IN 
(SELECT titre FROM employe WHERE nodep = '32');



9--ok Rechercher le nom et le titre des employés du service 31 qui ont un titre l'on ne trouve pas dans le département 32.
SELECT nom, titre
FROM employe
WHERE nodep = '31' AND titre NOT IN 
(SELECT titre FROM employe WHERE nodep = '32');


10-- okk  Rechercher le nom, le titre et le salaire des employés qui ont le même titre et le même salaire que Fairent.
SELECT nom, titre, salaire
FROM employe
WHERE titre IN (SELECT titre FROM employe WHERE nom = 'Fairent')
AND salaire IN (SELECT salaire FROM employe WHERE nom = 'Fairent');

-- REQUETES EXTERNES/ LEFT JOIN/ RIGHT JOIN

11--ok-Rechercher le numéro de département, le nom du département, le nom des employés, en affichant aussi les départements dans lesquels
--il n'y a personne, classés par numéro de département.
SELECT nodept, dept.nom, employe.nom 
FROM dept
LEFT JOIN employe ON nodep = nodept
ORDER BY nodept;

-- FONCTIONS DE GROUPE/AVG(moyenne) MIN(minimum) MAX(maximum)  SUM(somme) COUNT(dénombrement)
-- LES GROUPES/ GROUP BY

1-- ok Calculer le nombre d'employés de chaque titre
SELECT titre, COUNT(*) AS nbre_employes
FROM employe
GROUP BY titre;


2-- okCalculer la moyenne des salaires et leur somme, par région
SELECT AVG(salaire) AS moyenne_salaires, SUM(salaire) AS somme_salaires
FROM employe
LEFT JOIN dept ON dept.nodept = employe.nodep
GROUP BY noregion;

3--ok Afficher les numéros des départements ayant au moins 3 employés.
SELECT nodept
FROM employe
LEFT JOIN dept ON dept.nodept = employe.nodep
GROUP BY nodept
HAVING COUNT(*) = 3;


4--ok Afficher les lettres qui sont l'initiale d'au moins trois employés.
-- ex FIGHTER (nom 2,3) on compte 2 ce qui nous mène après le F puis on avance de 3 on obtient IGH
SELECT SUBSTR(prenom,1, 1) AS 'Initiale', COUNT(*) AS `Nombre d'initiales`
FROM employe
GROUP BY `Initiale`
HAVING COUNT(`Initiale`) >= 3;

5.--ok Rechercher le salaire maximum et le salaire minimum parmi tous les salariés et l'écart entre les deux.
SELECT MAX(salaire) AS salaire_max, MIN(salaire) AS salaire_min, MAX(salaire) - MIN(salaire) AS ecart
FROM employe;


6.--ok Rechercher le nombre de titres différents.
SELECT COUNT(DISTINCT titre) 
FROM employe

7.--ok Pour chaque titre, compter le nombre d'employés possédant ce titre.
SELECT titre, COUNT(*) AS nombre_employes
FROM employe
GROUP BY titre
HAVING COUNT(*);

8. --/////Pour chaque nom de département, afficher le nom du département et le nombre d'employés.
SELECT dept.nom, COUNT(*) AS nombre_employes
FROM employe
LEFT JOIN dept ON dept.nodept = employe.nodep
GROUP BY nom
HAVING COUNT(*);

