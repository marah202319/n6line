<?php
    include('header.php'); 
	
    if(isset($_POST['Inscription'])){ 
        if(!empty($_POST['nom'])){ 
            if(!empty($_POST['prenom'])){  
                    if(!empty($_POST['filliere'])){ 
                        if(!empty($_POST['fonction'])){ 
                            $nom = $_POST['nom '];
                            $prenom = $_POST['prenom '];
                            $filliere = $_POST['filliere '];
                            $fonction  = $_POST['fonction '];
                            
				
				
				$req_ok = $bdd->query('SELECT id FROM anciens WHERE nom =\''.$nom.'\' and prenom =\''.$prenom.'\'and filliere =\''.$filliere.'\'and fonction =\''.fonction.'\'');
				$count_ok= $req_ok->rowCount();
				if($count_ok > 0) { 
					
				    echo"<script language=\"javascript\">" ; 
		          echo"alert('un mail vous sera envoyée')";
		          echo"</script>";
					
				}
				else{
					header("location:index.php"); /*redirection vers la page de connexion */ 
				}
					
				$req_ok->closeCursor();  
				 
                            }
                        }
                    }
	
	if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['filliere'] )|| empty($_POST['fonction']) {
        
		echo"<script language=\"javascript\">" ; 
		echo"alert('Vous devez remplir tous les champs pour pouvoir vous connecter')";
		echo"</script>";

    }
	
	if(isset($_POST['effacer'])){ 
		$_POST['nom'] = '' ;
		$_POST['prenom'] = '';  
        $_POST['filliere'] = ''; 
        $_POST['fonction'] = ''; 
	}
	
	include('footer.php'); 
?> 