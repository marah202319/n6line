<?php
	
	try{ 
		$bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
	}
				
	catch(Exception $e){
		die('Erreur : '.$e->getMessage()); 
	}

	session_start(); 
	$login = $_SESSION['login'] ;
	
	//echo $_GET['id'];
	
	
	if(isset($_POST['Commenter'])){ 
		if(!empty($_POST['contenu'])){ 
				
			$contenu = $_POST['contenu'];
			$time = date("Y-m-d H:i:s");
				
			include('mots_interdits.php'); 
				
			if($existe == FALSE ){
				
				
				$id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' '); 
				$id_uti = $id_utilisateur->fetch(); //Id de l'utilisateur qui va commenter la publication 
			
				$insert_commentaire = $bdd->prepare('INSERT INTO commentaire(idutil,contenu,date) VALUES(\''.$id_uti[0].'\' ,:contenu,\''.$time.'\')'); 
				$insert_commentaire->execute(array('contenu' => $_POST['contenu']));
				

				$id_com = $bdd->query('SELECT id FROM commentaire WHERE contenu = \''.$contenu.'\' AND idutil = \''.$id_uti[0].'\' '); 
				$id_commentaire = $id_com ->fetch(); 

				$insert_commente = $bdd->prepare('INSERT INTO commente(idact,idcom) VALUES(\''.$_GET['id'].'\', \''.$id_commentaire[0].'\'  ) '); 
				$insert_commente ->execute(); 
				
				header('location:commenter.php?id='.$_GET['id']); 
			}
			else{
				header('location:commenter.php?id='.$_GET['id']); 
			}
				
		}
			
		else{
			/*echo"<script language=\"javascript\">" ; 
			echo"alert('Vous devez saisir au moins du texte pour pouvoir publier')";
			echo"</script>";*/
			header('location:commenter.php?id='.$_GET['id']);  
			}
	}
			
		
		
	?>