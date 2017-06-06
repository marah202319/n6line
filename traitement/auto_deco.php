<?php

    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }

 session_start();
 
 $login = $_SESSION['login'] ; /*récupération de la variable login */
 $update = $bdd->query('UPDATE utilisateur set connecte = 0 where uha =\''.$login.'\'');
 
		session_destroy();
		header("location:../index.php");
?>