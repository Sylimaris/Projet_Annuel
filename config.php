<?php
session_start();

try
	{
		$idBase = new PDO('mysql:host=localhost;dbname=bddboucherie;charset=utf8', 'root', '',
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
?>
