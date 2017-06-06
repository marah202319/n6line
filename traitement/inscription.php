<?php 
	
	include('../header.php'); 
	
	if(isset($_POST['Inscription'])){ 
		if(!empty($_POST['Nom'])){ 
			$Nom = $_POST['Nom']; 
			if(!empty($_POST['Prénom'])){ 
				$Prénom = $_POST['Prénom'];    
				if(!empty($_POST['fonction'])){
					$fonction = $_POST['fonction'] ; 
					if(!empty($_POST['fillière'])){
						$fillière = $_POST['fillière'] ; 
					
				
				echo 'Nom : '.$Nom.'</br>' ; 
				echo 'Prénom : '.$Prénom.'</br>' ; 
				echo 'Choix : '.$fonction.'</br>' ; 
				echo 'Fillière : '.$fillière.'</br>' ; 
				
				
					}
				}
			}
		}
	}
	
	/* base de données d'anciens pour faire des requetes ' */
	
?>