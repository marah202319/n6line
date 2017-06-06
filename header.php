<?php
    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }
?>


<!DOCTYPE html>
<html lang="fr">
     <head>
        <meta charset="utf-8">
         <title>N6LINE</title>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
	
	<header>
		<h1><strong>Connexion à N6LINE :</strong></h1>
	</header>
	
	<div id="main" >
	
        <div id="contenu">