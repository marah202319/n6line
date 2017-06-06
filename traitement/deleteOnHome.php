<?php

	try{ 
    $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }

echo $_GET['id']; 

$bdd->query('DELETE FROM actualite WHERE id = \''.$_GET['id'].'\' '); 
$bdd->query('DELETE FROM post WHERE idact = \''.$_GET['id'].'\' '); 

header("location:../accueil.php"); 
?>