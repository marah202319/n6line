<?php 
    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }
	
 if(isset($_POST['search'])){ 	
	$search = $bdd->query('SELECT * FROM utilisateur where nom LIKE \'%'.$_POST['search'].'%\' ORDER BY nom DESC');
	$search_prenom = $bdd->query('SELECT * FROM utilisateur where prenom LIKE \'%'.$_POST['search'].'%\' ORDER BY nom DESC');
	include('./smiley.php');
	echo('<h2> Recherche de personnes : </h2>');
	while($result=$search->fetch()){
		echo('<div class="well">');
	echo('<h3><a href="../profil_autre?id='.$result['id'].'" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$result['prenom'].' '.$result['nom'].' <br /></a></h3>');
	echo('</div>');
	}
		while($result=$search_prenom->fetch()){
		echo('<div class="well">');
echo('<h3><a href="../profil_autre?id='.$result['id'].'" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$result['prenom'].' '.$result['nom'].' <br /></a></h3>');
	echo('</div>');
	}

 }
	
	?>