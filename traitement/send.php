<?php

    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }
	
	session_start(); 
	$login =$_SESSION['login'];
	echo('<p>'.$login.'</p>');

 if(isset($_POST['envoyer'])){ 
        if(!empty($_POST['message'])){ 
			 
            $message = $_POST['message'];
			$datetime = date("Y-m-d H:i:s");
			
//			$titre = $bdd->quote($titre);
//			$message = $bdd ->quote($message); 
			
			echo $message.'</br>' ;  
			
			$insert_message = $bdd->query('INSERT INTO message(contenu,fichier,date) VALUES(\''.$message.'\' , \'\' , \''.$datetime.'\') '); 
			
			$id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' '); 
			$id_message = $bdd ->query('SELECT id from message where contenu = \''.$message.'\' ') ; 
			
			$id_uti = $id_utilisateur->fetch();
			//echo $id_uti[0] ;
			$id_act = $id_message ->fetch(); 
			//echo $id_act[0]; 
			
			$insert_messtrans = $bdd->query('INSERT INTO messtrans VALUES(\''.$id_uti[0].'\',\''.$_COOKIE['variable'].'\',\''.$id_act[0].'\') '); 
			
			$notif=$bdd->query('INSERT INTO notificationmessage VALUES(\''.$_COOKIE['variable'].'\',\''.$id_act[0].'\',\'0\')');
			
			
			echo 'OK!' ; 
			
			header("location:../chat.php?valeur=".$_COOKIE['variable'].""); 
			
		}
		
		else{
			/*echo"<script language=\"javascript\">" ; 
			echo"alert('Vous devez saisir au moins du texte pour pouvoir publier')";
			echo"</script>";*/
			echo('Ca marche pas');
			header("location:../chat.php?valeur=".$_COOKIE['variable'].""); 
		}
 }


?>