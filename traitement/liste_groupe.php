<?php
	try{ 
		$bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
		die('Erreur : '.$e->getMessage()); 
    }
	
	$login = $_SESSION['login'] ;
	$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
	$id_utilisateur = $rep->fetch(); 
	echo('<div class="well">');	
	echo('<h2> Groupes auxquels vous appartenez  :</h2>');
	$rep = $bdd->query('SELECT distinct nom FROM groupe INNER JOIN appartient ON appartient.idGroup = groupe.id AND appartient.idUtil =\''.$id_utilisateur[0].'\' ');
	echo('<ul>');

	while($donnees=$rep->fetch()){
		echo('<li>'.$donnees['nom'].'</li>');

	}
	echo('</ul>');
echo('</div>');
	echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
?>