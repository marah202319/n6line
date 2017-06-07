<?php
      try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }
	session_start();
	$login = $_SESSION['login'];
	$uha=$bdd->query('SELECT id from utilisateur where uha=\''.$login.'\'');
	$id = $uha->fetch();
	//echo $id['id'];

	
    if(isset($_POST['Creer'])){ 
        if(!empty($_POST['nom'])){ 
            if(!empty($_POST['contenu'])){ 
				$create=$bdd->prepare('INSERT INTO groupe(nom,description) VALUES(:nom,:description)');
				$create->execute(array('nom'=>$_POST['nom'], 'description'=> $_POST['contenu']));
				$idgroupe = $bdd->prepare('SELECT id from groupe where nom = :nom AND description = :description');
					$idgroupe->execute(array('nom'=>$_POST['nom'], 'description'=> $_POST['contenu']));
					$iday =$idgroupe->fetch();
				$admin = $bdd->query('INSERT INTO appartient VALUES ('.$id['id'].','.$iday['id'].',1)');
					header('Location: ../groupe.php');  
			}
		}
	}
	
					  
?> 