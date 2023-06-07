--1 Afficher toutes les informations concernant les employés.
SELECT * FROM employe;

--2 Afficher toutes les informations concernant les départements.
SELECT * FROM dept;

3--Afficher le nom, la date d'embauche, le numéro du supérieur, le numéro de département et le salaire de tous les employés.
SELECT nom, dateemb, nosup, nodep, salaire FROM employe;

--4 Afficher le titre de tous les employés.
SELECT titre, nom FROM employe;

--5 Afficher les différentes valeurs des titres des employés.
--Sélection de la colonne 'titre'contenant les titres des employés / DISTINCT utilisé pour ne pas avoir de doublons si plusieurs
-- employés ont le même titre il ne sera affiché qu'une seule fois
SELECT DISTINCT titre
FROM employe;

--6 Afficher le nom, le numéro d'employé et le numéro du département des employés dont le titre est « Secrétaire ».
SELECT nom, noemp, nodep FROM employe
WHERE titre = 'Secrétaire';

--7 Afficher le nom et le numéro de département dont le numéro de département est supérieur à 40
--Sélection des colonnes  nom et n° de département de la table département/ WHERE filtre les lignes dont le n° de département est 
--supérieur à 40
SELECT nom, nodep FROM dept
WHERE nodep > 40;

--8 Afficher le nom et le prénom des employés dont le nom est alphabétiquement antérieur au prénom.
SELECT nom, prenom FROM employe
WHERE nom < prenom;

--9 Afficher le nom, le salaire et le numéro du département des employés dont le titre est « Représentant », le numéro de département 
 -- est 35 et le salaire est supérieur à 20000.
SELECT nom, salaire, nodep FROM employe 
WHERE titre = 'Représentant' AND nodep = 35 AND salaire > 20000;

-- 10 Afficher le nom, le titre et le salaire des employés dont le titre est « Représentant » ou dont le titre est « Président ».
SELECT nom, titre, salaire FROM employe
WHERE titre = 'Représentant' OR titre = 'Président';

--11 Afficher le nom, le titre, le numéro de département, le salaire des employés du département 34, dont le titre est « Représentant » 
--ou « Secrétaire ».
SELECT nom, titre, nodep, salaire 
FROM employe
WHERE nodep = 34 AND (titre = 'Représentant' OR titre = 'Secrétaire');

--12 Afficher le nom, le titre, le numéro de département, le salaire des employés dont le titre est Représentant, ou dont le titre est
--Secrétaire dans le département numéro 34
SELECT nom, titre, nodep, salaire
FROM employe
--WHERE ajoute une condition pour filtrer les résultats/La condition titre sélectionne les employés dont le titre est 'Représentant' ou 'Secrétaire'
-- et sélection des employés du département 34
WHERE (titre = 'Représentant' OR titre = 'Secrétaire') AND nodep = 34;

--13 Afficher le nom, et le salaire des employés dont le salaire est compris entre 20000 et 30000.
--Sélection des colonnes nom et salaire de la table employe 
SELECT nom, salaire
FROM employe
--BETWWEEN (= entre) sélectionne uniquement les salaires compris entre 20000 et 30000
WHERE salaire BETWEEN 20000 AND 30000;

--15 Afficher le nom des employés commençant par la lettre « H »
SELECT nom FROM employe
WHERE nom LIKE 'H%';

-- 16 Afficher le nom des employés se terminant par la lettre « n ».
SELECT nom FROM employe
WHERE nom LIKE '%n';

--17 Afficher le nom des employés contenant la lettre « u » en 3ème position
--Sélection de la colonne nom de la table employe
SELECT nom FROM employe
--LIKE permet d'effectuer une recherche sur un modèle particulier (ici le nom des employés contenant la
--lettre 'u' en 3ème position)
WHERE nom LIKE '__u';

--18 Afficher le salaire et le nom des employés du service 41 classés par salaire croissant.
SELECT salaire, nom
FROM employe
WHERE nodep = 41
ORDER BY salaire ASC;


--19 Afficher le salaire et le nom des employés du service 41 classés par salaire décroissant.
SELECT salaire, nom
FROM employe
WHERE nodep = 41
ORDER BY salaire DESC;

-- 20 Afficher le titre, le salaire et le nom des employés classés par titre croissant et par salaire décroissant.
SELECT titre, salaire, nom
FROM employe
ORDER BY titre ASC, salaire DESC ;

--21 Afficher le taux de commission, le salaire et le nom des employés classés par taux de commission croissante.
SELECT tauxcom, salaire, nom
FROM employe
ORDER BY tauxcom ASC;

--22.Afficher le nom, le salaire, le taux de commission et le titre des employés dont le taux de commission n'est pas renseigné.
SELECT nom, salaire, tauxcom, titre
FROM employe
WHERE tauxcom IS NULL;

--23.Afficher le nom, le salaire, le taux de commission et le titre des employés dont le taux de commission est renseigné.
SELECT nom, salaire, tauxcom, titre
FROM employe
WHERE tauxcom IS NOT NULL;

--24.Afficher le nom, le salaire, le taux de commission, le titre des employés dont le taux de commission est inférieur à 15.
SELECT nom, salaire, tauxcom, titre
FROM employe
WHERE tauxcom < 15;

--25. Afficher le nom, le salaire, le taux de commission, le titre des employés dont le taux de commission est supérieur à 15
SELECT nom, salaire, tauxcom, titre
FROM employe
WHERE tauxcom > 15;


/* 26 Afficher le nom, le salaire, le taux de commission et la commission des employés dont le taux de commission n'est pas nul.
(la commission est calculée en multipliant le salaire par le taux de commission) */
SELECT nom, salaire, tauxcom, (salaire * tauxcom) AS commission
FROM employe
WHERE tauxcom IS NOT NULL; 



/*27. Afficher le nom, le salaire, le taux de commission, la commission des employés dont le taux de commission n'est pas nul,
classé par taux de commission croissant.*/
--Calcul la commission en * le salaire par le taux de commission/ Le résultat est renommé en tant que "commission = AS" 
SELECT nom, salaire, tauxcom, (salaire * tauxcom) AS commission
FROM employe
--WHERE filtre les résultats / Sélection des employés dont le taux de commission n'est pas nul
WHERE tauxcom IS NOT NULL
--ORDER BY tri les résultats de la colonne tauxcom par ordre croissant de taux de commission
ORDER BY tauxcom ASC;

--28. //////Afficher le nom et le prénom (concaténés) des employés. Renommer les colonnes
--Sélection de la colonne 'noemp' /Concaténation de prenom et nom/Le résultats de la concaténation est renommer 'nom_complet'
SELECT noemp, CONCAT(prenom, '', nom) AS nom_complet, nom
FROM employe;

--29. Afficher les 5 premières lettres du nom des employés.
--Extraction des 5 premières lettres de la colonne 'nom'/ La colonne est renommé avec AS
SELECT SUBSTRING(nom, 1, 5) AS cinq_premieres_lettres_du_nom
FROM employe;

--30.Afficher le nom et le rang de la lettre « r » dans le nom des employés.
SELECT nom, LOCATE('r', nom) AS nom_rang_lettre_r
FROM employe;

--31. Afficher le nom, le nom en majuscule et le nom en minuscule de l'employé dont le nom est Vrante.
--UPPER convertit une chaîne en minuscules/LOWER convertit une chaine en minuscules/AS renomme les colonnes
SELECT nom, UPPER(nom) AS nom_majuscule, LOWER(nom) AS nom_minuscule
FROM employe
-- WHERE filtre dans la colonne nom les employés dont le nom est 'Vrante'
WHERE nom = 'Vrante';



--32. Afficher le nom et le nombre de caractères du nom des employés.
--LENGTH calcul la longueur d'une chaîne de caractères (nbre de caractère qu'elle contient) AS renomme la colonne
SELECT nom, LENGTH(nom) AS nombre_caracteres_nom_employes
FROM employe;



