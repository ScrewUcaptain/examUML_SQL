-- first request 

SELECT m.dateMission, m.heureDebut, v.immatriculation, v.marque, v.modele, e.nom, e.prenom
FROM VehiculeExpertise v
JOIN MissionExpertise m ON v.idMission = m.idMission
JOIN Expert e ON m.idExpert = e.idExpert
ORDER BY m.dateMission ASC, m.heureDebut ASC;


-- second request

SELECT e.nom, e.prenom, COUNT(*) AS nombre_vehicules_expertises
FROM Expert e
JOIN MissionExpertise m ON e.idExpert = m.idExpert
WHERE YEAR(m.dateMission) = 2018
GROUP BY e.nom, e.prenom;


-- third request

SELECT g.idGarage, g.nom, g.ville, G.tel
FROM Garage g
JOIN MissionExpertise m ON g.idGarage = m.idGarage
GROUP BY g.idGarage, g.nom, g.ville, g.tel
HAVING COUNT(*) > 100;


--SQL for create Table 

CREATE TABLE 'nom_table' (
	'nom_colonne' 'type_colonne' 'option',
	'nom_colonne' 'type_colonne' 'option',
)

--SQL for create foreign key

ALTER TABLE 'nom_table1' ADD CONSTRAINT 'nom_contrainte' FOREIGN KEY ('id_table1') REFERENCES 'nom_table2'('id_table2');

--SQL for add data in table

INSERT INTO 'nom_table' ('nom_colonne1', 'nom_colonne2', 'nom_colonne3') VALUES ('valeur1', 'valeur2', 'valeur3');

--SQL for delete entries

DELETE FROM 'nom_table' WHERE 'condition';
-- in this case condition can be : 'id' = 58 or 'nom_colonne' = 'valeur'