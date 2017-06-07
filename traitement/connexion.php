<?php
      try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }
	
    if(isset($_POST['connexion'])){ 
	echo('lol');
        if(!empty($_POST['login'])){ 
            echo('coucou');
            if(!empty($_POST['pass'])){ 
                      echo('salut');
				
				
				$req_ok = $bdd->prepare('SELECT id FROM utilisateur WHERE uha = :login and mdp = :pass');
				$req_ok->execute(array('login' => $_POST['login'], 'pass' => $_POST['pass']));
				$count_ok= $req_ok->rowCount();
				if($count_ok > 0) { 
					/* démarrage d'une session pour stocker les variables login et pass */ 
					session_start(); 
					$_SESSION['login'] = $_POST['login']; 
					//$_SESSION['pass'] = $pass;
					
					/*mise à jour du statut connecté */ 
					$update = $bdd->prepare('UPDATE utilisateur set connecte = 1 where uha = :login');
					$update->execute(array('login' => $_POST['login']));
					header("location:../accueil.php"); /*redirection vers la page d'acceuil */ 
					
				}
				else{
					header("location:../index.php"); /*redirection vers la page de connexion */ 
				}
					
				$req_ok->closeCursor();  
				 
                            }
                        }
                    }
	
	if (empty($_POST['login']) || empty($_POST['pass'])) {
        
		echo"<script language=\"javascript\">" ; 
		echo"alert('Vous devez remplir tous les champs pour pouvoir vous connecter')";
		echo"</script>";
	header("location:../index.php");
    }
	
	if(isset($_POST['effacer'])){ 
		$_POST['login'] = '' ;
		$_POST['pass'] = ''; 
	}
	
	
?> 