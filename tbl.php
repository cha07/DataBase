<?php

try
{
	$db = new PDO('mysql:host=localhost;dbname=CSV_DB;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>