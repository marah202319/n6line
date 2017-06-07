<?php


    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }

session_start(); 
$login = $_SESSION['login'] ;
$name = $bdd->query('SELECT nom,prenom FROM utilisateur where uha = \''.$login.'\'');
$accueil=$name->fetch();
echo ('Bienvenue '.$accueil['nom'].' '.$accueil['prenom'].' ');
	
 if(isset($_POST['Publier'])){ 
        if(!empty($_POST['contenu'])){ 
			 
			
			
//			$titre = $bdd->quote($titre);
//			$contenu = $bdd ->quote($contenu); 
			$time=date("Y-m-d H:i:s");
			echo 'contenu'.'</br>' ; 
			echo 'titre'.'</br>' ; 
			$id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' '); 
			$id_uti = $id_utilisateur->fetch();
			
			include('./mots_interdits.php'); 
			if($existe == FALSE ){ 
			$insert_actualite = $bdd->prepare('INSERT INTO actualite(titre,contenu,position,fichier,date) VALUES( :titre , :contenu,:position, \'\' ,\''.$time.'\')'); 
			$insert_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu'], 'position' => $_POST['position']));
			

			
			$id_actualite = $bdd ->prepare('SELECT id from actualite where titre = :titre and contenu = :contenu') ; 
			$id_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu']));
			

			
			
			//echo $id_uti[0] ;
			$id_act = $id_actualite ->fetch();
			
			
			$insert_post = $bdd->query('INSERT INTO post VALUES(\''.$id_uti[0].'\',\''.$id_act[0].'\') '); 
			
			echo 'OK!' ; 
			
			header("location:../accueil.php"); 
			}
						else{
			header("location:../accueil.php"); 
			}
		}
		
		else{
			/*echo"<script language=\"javascript\">" ; 
			echo"alert('Vous devez saisir au moins du texte pour pouvoir publier')";
			echo"</script>";*/
			header("location:../accueil.php"); 
		}
 }
	
	
echo('<h1> Les actualités :</h1>');
$rep = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id ORDER BY date desc');

$id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' '); 
$id_uti = $id_utilisateur->fetch();
			
include('./smiley.php'); 
include('nb_coms.php'); 

while($donnees=$rep->fetch()){
	echo('<div class="well">');
	if($donnees['id'] == $id_uti[0]){
	?>	
		<a href='./traitement/deleteOnHome.php?id=<?php echo $donnees['idact']; ?> '>Supprimer</a>
	<?php 
	}
	echo('<h2>'.$donnees['titre'].'</h2>');
	echo('<p>'.filtre_texte($donnees['contenu']).'<p>');
		if($donnees['position'] != ''){
		echo('<p>'.'A '.$donnees['position'].'</p>'); 
	}
	echo('</br>');
	echo('<p>'.$donnees['date'].'<p>');
	echo('<p> Par '.$donnees['prenom'].' '.$donnees['nom'].'<p>');
	
	?>
		<a href='./traitement/commenter.php?id=<?php echo $donnees['idact']; ?> '>Commenter <?php echo '('.count_com($donnees['idact']).')' ; ?> </a>
	<?php
	
	echo('</div>');
}


echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
?>