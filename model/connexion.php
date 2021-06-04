<?php

try
{
	//MAMP
	$db = new PDO("mysql:host=localhost;dbname=cat_mash;charset=utf8", "root", "root");

	//WAMP
	//$db = new PDO('mysql:host=localhost;dbname=cat_mash;charset=utf8', 'root', '');
}

catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}