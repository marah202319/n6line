<?php
	try{ 
    $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }

echo $_GET['id']; //ID du commentaire à supprimer 

$id_pg = $bdd->query('SELECT actualite.id FROM actualite INNER JOIN commente ON commente.idact = actualite.id AND commente.idcom = \''.$_GET['id'].'\' '); 
$id_page = $id_pg ->fetch(); 
echo $id_page[0]; 

$bdd->query('DELETE FROM commentaire WHERE id = \''.$_GET['id'].'\' ');
$bdd->query('DELETE FROM commente WHERE idcom = \''.$_GET['id'].'\' '); 

header('location:../commenter.php?id='.$id_page[0]); 
?>
