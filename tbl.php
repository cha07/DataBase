<?php

try
{
	$db = new PDO('mysql:host=localhost;dbname=CSV_DB;charset=utf8', '', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>