<?php
    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }
?>

<script>
function refresh_liste()

{

var xhr_object = null;

if(window.XMLHttpRequest)

{ // Firefox

xhr_object = new XMLHttpRequest();

}

else if(window.ActiveXObject)

{ // Internet Explorer

xhr_object = new ActiveXObject('Microsoft.XMLHTTP');

}

var method = 'GET';

var filename = './liste_ami.php';

xhr_object.open(method, filename, true);

xhr_object.onreadystatechange = function()

{

if(xhr_object.readyState == 4)

{

var tmp = xhr_object.responseText;

document.getElementById('list').innerHTML = tmp;

}

}

xhr_object.send(null);

setTimeout('refresh_liste()', 100);

}

</script>


<! DOCTYPE html>
<html lang="fr">

<head>



	
	<?php 
	session_start(); 
$login = $_SESSION['login'] ;
$name = $bdd->query('SELECT id FROM utilisateur where uha = \''.$login.'\'');
$sessionid=$name->fetch();

	$id = $_GET['id']; 
	if($sessionid = $id){
		header("location:../profil.php");
	}
	$req = $bdd->query('SELECT nom,prenom from utilisateur where id ='.$id.' ');  
	$donnees = $req->fetch(); 
	
	
	echo '<title>'.$donnees['prenom']." ".$donnees['nom'].'</title>' ; 
	
	
	?>
	
    <meta charset="utf-8" />
	<link rel="stylesheet" href="../CSS/style_profil.css" />
	
</head>

<body onload='refresh_liste(); refresh_actualite();'>

	<header>
		<h1><a href="../profil.php">
		
		<?php 
			echo '<p>'.$donnees['prenom']." ".$donnees['nom'].'</p>' ; 
		?>
		
		</a></h1>
		
	</header>
	
	<section id="contenu">
	
		<section id="accueil">
			
			<div id="accueil_gauche">
		
				<p>
				<img src="../img/profilinconnu.jpg" width="200px" height="250px" title="photo de profil" alt="photo de profil" />
				</p>
				
			</div>
			
			<div id="accueil_centre">
			
				<ul>
				
					<?php

						$rep = $bdd->query('SELECT * FROM utilisateur where id='.$id.'');
						
						
						while($donnees=$rep->fetch()){
	
							echo('<li>'.'Nom : '.$donnees['nom'].'</li>');
							echo('<li>'.'Prénom : '.$donnees['prenom'].'</li>');
							echo('<li>'.'Adresse UHA : '.$donnees['uha'].'</li>');
							echo('<li>'.'Âge : '.$donnees['age'].'</li>');
							echo('<li>'.'Adresse : '.$donnees['adresse'].'</li>');
						}
					
					?>	
				</ul>
					
			</div>
			
			<div id="accueil_droite">
			
				<div id="logo_haut">
					<p>
						<img src="../img/logo1.jpg" width="150px" height="100px" title="logo1" alt="logo1" />
					</p>
				</div>
				
				<div id="logo_bas">
				
					<p> 
						<?php
							/* Sélection de la fonction de la personne, ou affichage de la promo si étudiant */ 
							
 
							$rep2 = $bdd->query('SELECT promotion from Etudiant where id=\''.$id.'\' ');
							$promo = $rep2->fetch(); 
							echo $promo[0] ; 
							
							$rep3 = $bdd->query('SELECT fonction from administration where id=\''.$id.'\' ');
							$fonction = $rep3->fetch();
							echo $fonction[0]; 
							
						?>
					</p>
					
					
					<p>
						<?php
							
							/* affichage de la filière de la personne si étudiant */ 
							
							
							$rep2 = $bdd->query('SELECT filiere from etudiant where id = \''.$id.'\' ');
							$filiere= $rep2->fetch(); 
							
							echo $filiere[0];
						?>
					</p>
					
					
				</div>
				
			</div>
			
		</section>
		
		<section id="description">
		
			<form name = "description" method="post" >
			
				<textarea align="left" placeholder="Pas de description renseignée ... " name="description_profil" style="height: 15%; width: 100%"><?php
					$rep2 = $bdd->query('SELECT description from utilisateur where id = \''.$id.'\' ');
					$descr = $rep2->fetch(); 
					
					echo $descr[0]; 				
				?></textarea>			
			</form>
			
			
		</section>
		
		
		

		<div id="list">
		</div>
	
		<div id="actualite">
		<?php

		
		
		echo('<h2> Ses publications </h2>');
		$rep = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id where utilisateur.id = \''.$id.'\' ORDER BY date desc');

		include('./smiley.php'); 
		while($donnees=$rep->fetch()){
			echo('<div class="div_news">');
			$id_actualite = $bdd ->query('SELECT id from actualite where contenu = \''.$donnees['contenu'].'\' and titre = \''.$donnees['titre'].'\' ') ; 
			$id = $id_actualite->fetch(); 
			echo('<h2>'.$donnees['titre'].'</h2>');
			echo('<p>'.filtre_texte($donnees['contenu']).'<p>');
			if($donnees['position'] != ''){
				echo('<p>'.'À '.$donnees['position'].'</p>'); 
			}
			echo('</br>');
			echo('<p>'.$donnees['date'].'<p>');
			echo('</div>');
}


		echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
	
	?>
		
		</div>
	
	
		<form name="x" action="../chat.php" method="post">
			<input type="submit" value="Messagerie" />
		</form>

		<form method="post" action="./traitement/deconnexion.php">
			<input type="submit" name ="deconnexion" value="Se déconnecter" />
		</form>
		
		
		
		
	</section>

