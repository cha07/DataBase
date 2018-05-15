<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <title>bdd</title>
</head>
<body>
<?php
include 'tbl.php';
?>
<div class="container">
<h1>Initiation aux données</h1>
<h2>EXERCICE 1</h2>
<h4>Afficher tous les gens dont le nom est palmer</h4>
<?php

$reponse = $db->query('SELECT * FROM TBL_NAME WHERE last_name=\'palmer\'');

while ($donnees = $reponse->fetch())
{
	echo $donnees['last_name'].' '. $donnees['first_name']. '<br />';
}

$reponse->closeCursor();
?>

<h2>EXERCICE 2</h2>
<h4>Afficher toutes les femmes</h4>
<?php

$reponse = $db->query('SELECT * FROM TBL_NAME WHERE gender=\'Female\'');

while ($donnees = $reponse->fetch())
{
	 echo $donnees['first_name'].' '. $donnees['last_name'].' '. $donnees['gender'].'<br />';
}

$reponse->closeCursor();
?>

<h2>EXERCICE 3</h2>
<h4>Afficher tous les états dont la lettre commence par N</h4>
<?php

$reponse = $db->query('SELECT * FROM TBL_NAME WHERE country_code LIKE \'N%\'');

while ($donnees = $reponse->fetch())
{
	 echo $donnees['country_code'].'<br />';
}

$reponse->closeCursor();
?>

<h2>EXERCICE 4</h2>
<h3>Afficher tous les emails qui contiennent google</h3>
<?php

$reponse = $db->query('SELECT * FROM TBL_NAME WHERE email LIKE \'%google%\'');

while ($donnees = $reponse->fetch())
{
	 echo $donnees['email'].'<br />';
}

$reponse->closeCursor();
?>

<h2>EXERCICE 5</h2>
<h4>Afficher la répartition par Etat et le nombre d’enregistrement par état (croissant)</h4>
<?php

$reponse = $db->query('SELECT country_code, COUNT(country_code) FROM TBL_NAME GROUP BY country_code ORDER BY COUNT(country_code) ASC');

while ($donnees = $reponse->fetch())
{
	 echo $donnees['country_code'].' '.$donnees['COUNT(country_code)'].'<br />';
}

$reponse->closeCursor();
?>

<h2>EXERCICE 6</h2>
<h4>Insérer un utilisateur, lui mettre à jour son adresse mail puis supprimer l’utilisateur</h4>
<?php

//à insérer dans insert SQL
//INSERT INTO TBL_NAME
//VALUES (NULL,'Charlotte', 'TBY', 'ctby@acs.fr', 'Female', NULL, '07/04/1983', '39000', NULL, 'LS','FR');

//pour supprimer
//DELETE FROM TBL_NAME WHERE last_name='TBY' 

//pour modifier
// edit et modifier ou depuis REQUEST : UPDATE TBL_NAME SET email ='ctby@acs.fr' WHERE last_name='TBY' 
?>

<h2>EXERCICE 7</h2>
<h4>Afficher le nombre de femme et d’homme</h4>
<?php

$reponse = $db->query('SELECT gender, COUNT(gender) FROM TBL_NAME GROUP BY gender ORDER BY COUNT(gender)');

while ($donnees = $reponse->fetch())
{
	 echo $donnees['gender'].' '.$donnees['COUNT(gender)'].'<br />';
}

$reponse->closeCursor();
?>

<h2>EXERCICE 8</h2>
<h4>Afficher l'âge de chaque personne, puis la moyenne d’âge des femmes et des hommes</h4>
<?php

//*modifier ponctuation ds sql :
//UPDATE TBL_NAME SET birth_date = replace(birth_date, '/', '-');

//modifier format date ds sql :
//UPDATE TBL_NAME SET birth_date = str_to_date(birth_date,'%d-%m-%Y'); 

//afficher âge ds sql :
//SELECT last_name, birth_date, CURDATE(), TIMESTAMPDIFF(YEAR,birth_date,CURDATE()) AS age FROM TBL_NAME ORDER BY `age` DESC;
$reponse = $db->query('SELECT last_name, first_name, birth_date, CURDATE(), TIMESTAMPDIFF(YEAR,birth_date,CURDATE()) AS age FROM TBL_NAME ORDER BY `age` DESC; ');

while ($donnees = $reponse->fetch())
{
	echo $donnees['last_name'].' '. $donnees['first_name'].' '.$donnees['age']. '<br />';
}

$reponse->closeCursor();
?>
<?php
//**moyenne âge hommes et femmes
//code qui fonctionne ms ne marche pas sur mon sql et editeur
//$reponse = $db->query('SELECT gender, birth_date, CURDATE(),
//AVG(TIMESTAMPDIFF(YEAR,birth_date,CURDATE())) AS moy_age 
//FROM TBL_NAME WHERE birth_date is not NULL GROUP BY gender');
//while ($donnees = $reponse->fetch())
//{
//echo  $donnees['gender'].'  '.ROUND($donnees['moy_age']).' ans<br>';
//}
//$reponse->closeCursor();
?>

<h2>EXERCICE 9</h2>
<h4>Créer deux nouvelles tables, une qui contient l’ensemble des membres de l’ACS, l’autre qui contient les département avec numéros et nom écrit.
Afficher le nom de chaque apprenant avec son département de résidence puis afficher le résultat dans une page php</h4>
<?php

$reponse = $db->query('SELECT * FROM ACS_MEMBERS INNER JOIN DEPARTEMENT WHERE ACS_MEMBERS.id_dept = DEPARTEMENT.num_dept ');
while ($donnees = $reponse->fetch())
	{
		echo  $donnees['prenom'].'  '.$donnees['nom_dept'].' '.$donnees['num_dept'].'<br>';
	}
	$reponse->closeCursor();

?>
</div>
</div>
</div>
</body>
</html>
