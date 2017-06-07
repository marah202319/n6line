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

var filename = './traitement/liste_ami.php';

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
	
	$req = $bdd->query('SELECT nom,prenom from utilisateur where uha =\''.$login.'\' ');  
	$donnees = $req->fetch(); 
	
	
	echo '<title>'.$donnees['prenom']." ".$donnees['nom'].'</title>' ; 
	
	
	?>
	
    <meta charset="utf-8" />
	<link rel="stylesheet" href="./CSS/style_profil.css" />
	
</head>

<body onload='refresh_liste(); refresh_actualite();'>

	<header>
		<h1><a href="profil.php">
		
		<?php 
			echo '<p>'.$donnees['prenom']." ".$donnees['nom'].'</p>' ; 
		?>
		
		</a></h1>
		
	</header>
	
	<section id="contenu">
	
		<section id="accueil">
			
			<div id="accueil_gauche">
		
				<p>
				<img src="./img/profilinconnu.jpg" width="200px" height="250px" title="photo de profil" alt="photo de profil" />
				</p>
				
			</div>
			
			<div id="accueil_centre">
			
				<ul>
				
					<?php
						$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
						$id_utilisateur = $rep->fetch(); 
						$rep = $bdd->query('SELECT * FROM utilisateur where id=\''.$id_utilisateur[0].'\' ');
						
						
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
						<img src="./img/logo1.jpg" width="150px" height="100px" title="logo1" alt="logo1" />
					</p>
				</div>
				
				<div id="logo_bas">
				
					<p> 
						<?php
							/* Sélection de la fonction de la personne, ou affichage de la promo si étudiant */ 
							
							$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
							$id_utilisateur = $rep->fetch(); 
							$rep2 = $bdd->query('SELECT promotion from Etudiant where id=\''.$id_utilisateur[0].'\' ');
							$promo = $rep2->fetch(); 
							echo $promo[0] ; 
							
							$rep3 = $bdd->query('SELECT fonction from administration where id=\''.$id_utilisateur[0].'\' ');
							$fonction = $rep3->fetch();
							echo $fonction[0]; 
							
						?>
					</p>
					
					
					<p>
						<?php
							
							/* affichage de la filière de la personne si étudiant */ 
							
							$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
							$id_utilisateur = $rep->fetch(); 
							
							$rep2 = $bdd->query('SELECT filiere from etudiant where id = \''.$id_utilisateur[0].'\' ');
							$filiere= $rep2->fetch(); 
							
							echo $filiere[0];
						?>
					</p>
					
					<p><a href="./traitement/modification_profil.php">Modifier le profil</a></p>
					
				</div>
				
			</div>
			
		</section>
		
		<section id="description">
		
			<form name = "description" method="post" >
			
				<textarea align="left" placeholder="Ecrivez quelque chose sur vous ici ... " name="description_profil" style="height: 15%; width: 100%"><?php
					$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
					$id_utilisateur = $rep->fetch(); 
					if(isset($_POST['Modifier'])){ 
						if(!empty($_POST['description_profil'])){ 
							$description = $_POST['description_profil'];
							$bdd->query('UPDATE utilisateur SET description = \''.$description.'\' where id = \''.$id_utilisateur[0].'\' ');
						}
					}
					$rep2 = $bdd->query('SELECT description from utilisateur where id = \''.$id_utilisateur[0].'\' ');
					$descr = $rep2->fetch(); 
					
					echo $descr[0]; 
					
				?></textarea>
				<input type="submit" name="Modifier" value="Modifier" >
				
			</form>
			
			
		</section>
		
			
		<div id ="Publication" >
			<form name="Publier" method="post" enctype="multipart/form-data">
		
				<input type="textarea" placeholder="Un titre" name="titre" style="height: 5%; width: 100%">
				<input type="textarea" placeholder="Où étiez-vous ? " name="position" style="height: 5%; width: 100%">
				<input type="textarea" placeholder="Rédigez votre publication ici" name="contenu" style="height: 10%; width: 100%"> 
				<input type ="submit" name="Publier" value="Publier" >
				<input type="hidden" name="MAX_FILE_SIZE" value="100000"> Fichier : <input type="file" name="fichier"> <!-- onchange="this.form.submit()" -->
				
			</form>
			
		</div>
		
		

		<div id="list">
		<?php

			echo('<h1> Amis connectés :</h1>');
			$req = $bdd->query('SELECT nom,prenom from utilisateur where uha =\''.$login.'\' ');  
			$rep = $bdd->query('SELECT nom,prenom FROM utilisateur WHERE connecte=1 AND uha !=\''.$login.'\' '); 
			
			echo('<ul>');
		
			while($donnees=$rep->fetch()){
				echo('<li>'.$donnees['nom'].' '.$donnees['prenom'].'</li>');
				}
			echo('</ul>');

			echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');

			echo('<h1> Ami hors ligne :</h1>');
			$rep = $bdd->query('SELECT nom,prenom FROM utilisateur WHERE connecte=0');
			echo('<ul>');
		
			while($donnees=$rep->fetch()){
				echo('<li>'.$donnees['nom'].' '.$donnees['prenom'].'</li>');
			}
			echo('</ul>');
		?>
		</div>
	
		<div id="actualite">
		<?php
			

			
			if(isset($_POST['Publier'])){ 
				if(!empty($_POST['contenu'])){ 
				
				
				$contenu = $_POST['contenu'];
				$titre = $_POST['titre']; 
				$time = date("Y-m-d H:i:s");
				$fichier = $_FILES['fichier']['name'] ; 
				
				include('./traitement/mots_interdits.php'); 
				
			if($existe == FALSE ){
			
			$insert_actualite = $bdd->prepare('INSERT INTO actualite(titre,contenu,position,fichier,date) VALUES( :titre , :contenu,:position, :fichier ,\''.$time.'\')'); 
			$insert_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu'], 'position' => $_POST['position'] , 'fichier' =>$_FILES['fichier']['name']));
			
			include('./traitement/upload.php'); 
			
			$id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' '); 
			$id_actualite = $bdd ->prepare('SELECT id from actualite where titre = :titre and contenu = :contenu') ; 
			$id_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu']));
			
				$id_uti = $id_utilisateur->fetch();
				$id_act = $id_actualite ->fetch(); 
			
				$insert_post = $bdd->prepare('INSERT INTO post VALUES(\''.$id_uti[0].'\',\''.$id_act[0].'\') '); 
				$insert_post ->execute(); 
				
				header("location:profil.php"); 
			}
			
			}
		
			else{
				/*echo"<script language=\"javascript\">" ; 
				echo"alert('Vous devez saisir au moins du texte pour pouvoir publier')";
				echo"</script>";*/
				header("location:profil.php"); 
				}
		}
		
		
		echo('<h2> Mes publications </h2>');
		$rep = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id where utilisateur.id = \''.$id_utilisateur[0].'\' ORDER BY date desc');

		if (isset($_FILES['fichier'])){
			echo $_FILES['fichier']['name'] ; 
		}
		
		include('./traitement/smiley.php'); 
		while($donnees=$rep->fetch()){
			echo('<div class="div_news">');
			$id_actualite = $bdd ->query('SELECT id from actualite where contenu = \''.$donnees['contenu'].'\' and titre = \''.$donnees['titre'].'\' ') ; 
			$id = $id_actualite->fetch(); 
			//echo $id[0]; 
			
			$f = $bdd->query('SELECT fichier FROM actualite INNER JOIN image ON image.idact = actualite.id AND actualite.id = \''.$id[0].'\' ' ); 
			$name_file = $f ->fetch(); 
			//echo $name_file[0];
			
			
			?>	
				<a href='./traitement/deleteOnProfile.php?id=<?php echo $id[0]; ?> '>Supprimer</a>
			<?php 
			echo('<h2>'.$donnees['titre'].'</h2>');
			
			/*
			if($donnees['fichier'] != ''){
			?>
				<img src="./uploaded/android.jpg" width="200" height="200">  
			<?php
			}*/
			
			echo('<p>'.filtre_texte($donnees['contenu']).'<p>');
			if($donnees['position'] != ''){
				echo('<p>'.'À '.$donnees['position'].'</p>'); 
			}
			echo('</br>');
			echo('<p>'.$donnees['date'].'<p>');
			?>
			
				<a href='./traitement/commenter.php?id=<?php echo $id[0]; ?> '>Commenter</a>
			
			<?php
			echo('</div>');
}


		echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
	
	?>
		
		</div>
	
		<div id="groupe">
			<?php include('./traitement/liste_groupe.php'); ?>
		</div>
		
		<form method="post" action="accueil.php">
			<input type="submit" name ="Accueil" value="Accueil" />
		</form>
		
		<form name="x" action="./chat.php" method="post">
			<input type="submit" value="Messagerie" />
		</form>

		<form method="post" action="./traitement/deconnexion.php">
			<input type="submit" name ="deconnexion" value="Se déconnecter" />
		</form>
		
		
		
		
	</section>
<?php 
	include('footer.php'); 
?>
