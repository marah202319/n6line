<?php

	
	function ajout_image ($chemin){	
		
		try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
		}
		
		catch(Exception $e){
			die('Erreur : '.$e->getMessage()); 
		}
		
		$login = $_SESSION['login']; 
		$id = $bdd ->query('SELECT id from utilisateur where uha = \''.$login.'\' '); 
		$id_util = $id->fetch() ;
		
		echo 'Utilisateur : '.$id_util[0].'</br>'; 
		
		$id_actu = $bdd->query('SELECT id FROM actualite WHERE fichier = \''.$_FILES['fichier']['name'].'\' '); 
		$id_actu_file = $id_actu ->fetch(); 
		
		$bdd->query('INSERT INTO image(chemin,idutil,idact) VALUES(\''.$chemin.'\' , \''.$id_util[0].'\', \''.$id_actu_file[0].'\' ) '); 
		
		
	}
	
	
	$dossier = './uploaded/';
	$fichier = basename($_FILES['fichier']['name']); 
	$taille_maxi = 100000;
	$taille = filesize($_FILES['fichier']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['fichier']['name'], '.'); 

	if(!in_array($extension, $extensions)){
		$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
	}
	
	if($taille>$taille_maxi){
     $erreur = 'Le fichier est trop gros...';
	}
	
	if(!isset($erreur)){
		$fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     
		if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier.$fichier)){
			echo 'Upload effectué avec succès !';
			$chemin = $dossier.$fichier;
			echo '</br>'.$chemin.'</br>' ; 
			ajout_image($chemin);
		}
		else{
			echo 'Echec de l\'upload !';
		}
	}
	else{
     
	 echo $erreur;
	}
	
	
		
	header("location:../profil.php"); 
	
	
?>

 
	