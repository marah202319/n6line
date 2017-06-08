<?php include('header.php'); ?>

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

setTimeout('refresh_liste()', 1500);

}

</script>

<?php 
	$login = $_SESSION['login'] ;
	
	$req = $bdd->query('SELECT nom,prenom from utilisateur where uha =\''.$login.'\' ');  
	$donnees = $req->fetch(); 
	
	
	echo '<title>'.$donnees['prenom']." ".$donnees['nom'].'</title>' ; 
	
	
	?>
<body onload='refresh_liste(); refresh_actualite();'>

    <div class="container">
	
	<strong>Profil  </strong> 	<form method="post" action="./traitement/deconnexion.php">
		<input type="submit" name ="deconnexion" value="Se déconnecter" />
		</form>
        <div class="row" style="">
            <div class="col-md-3" id="list" >

        
      </div>
            <div class="col-md-7" >
                 <div class="well">  
                    <div class="row">
                     <div class="col-md-12">
                        <div class="col-md-6">
                          <h4>
                             <a href="profil.html" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Groupe<br /></a>
                          </h4>
                            <p id="photoprofil">
                                <img src="imag4.png"/ style="width:60%;height:150px;">
                            </p>
                         </div>
                          <div class="col-md-6">
                           <p>
				
					<?php
						$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
						$id_utilisateur = $rep->fetch(); 
						$rep = $bdd->query('SELECT * FROM groupe where id=\''.$_GET['valeur'].'\' ');
						
						
						while($donnees=$rep->fetch()){
	
							echo('Nom : '.$donnees['nom'].'</br>');
						}
						
						?>
						</p>
						<p>
						<?php
						echo('<h4> Liste des membres </h4>');
						$membre=$bdd->query('SELECT * FROM groupe INNER JOIN appartient ON groupe.id = appartient.idGroup INNER JOIN utilisateur ON appartient.idUtil = utilisateur.id where groupe.id='.$_GET['valeur'].' ORDER BY appartient.admin DESC');
						while($mem=$membre->fetch()){
							if($mem['admin'] == 1){
								echo('<p>'.$mem['prenom'].' '.$mem['nom'].' ADMINISTRATEUR </p>');
							}
							else{
								echo('<p>'.$mem['prenom'].' '.$mem['nom'].'');
							}
							
						}
						?>
						</p>
						

				<form name = "description" method="post" >
				<textarea align="left" placeholder="Modifier la description du Groupe ... " name="description_groupe" style="height: 15%; width: 100%"><?php
						
					if(isset($_POST['Modifier'])){ 
						if(!empty($_POST['description_groupe'])){ 
							$description = $_POST['description_groupe'];
							$bdd->query('UPDATE groupe SET description = \''.$description.'\' where id = \''.$_GET['valeur'].'\' ');
						}
					}
					$rep2 = $bdd->query('SELECT description from groupe where id = \''.$_GET['valeur'].'\' ');
					$descr = $rep2->fetch(); 
					
					echo $descr[0]; 
					
				?></textarea>
									<?php
					$rep = $bdd->query('SELECT * FROM groupe INNER JOIN appartient ON groupe.id = appartient.idGroup INNER JOIN utilisateur ON appartient.idUtil = utilisateur.id where groupe.id='.$_GET['valeur'].' AND utilisateur.uha = \''.$login.'\' ');  
					$id_utilisateur = $rep->fetch(); 
						if($id_utilisateur['admin'] == 1){
                           echo('<input type="submit" name="Modifier" value="Modifier" >');
						}
						?>
				
				
			</form>
                          </div>
                        </div>
                     </div>  
                </div>
                  <div class="well"> 
				  <?php if($id_utilisateur['admin'] == 1){
                    echo('<a href="#">Supprimer le groupe</a><br/>');
                    echo('<a href="#">Changer la photo du groupe</a><br/>');
                    echo('<a href="#">Gestion des membres</a><br/>');
				  }
				  else echo('L\'accès au panel de gestion du groupe est reservé aux administrateurs');?>
                   </div>
                   <div class="well" >
			<form name="Publier" method="post">
		
				<input type="textarea" placeholder="Un titre" name="titre" style="height: 5%; width: 100%">
				<input type="textarea" placeholder="Où étiez-vous ? " name="position" style="height: 5%; width: 100%">
				<input type="textarea" placeholder="Rédigez votre publication ici" name="contenu" style="height: 10%; width: 100%"> 
				<input type ="submit" name="Publier" value="Publier" >
				<input type ="submit" name="Photo/video" value="Photo/vidéo" >
				
				
			</form>
                   </div>
            <div class="well" >
               <?php
			if(isset($_POST['Publier'])){ 
				if(!empty($_POST['contenu'])){ 
				echo '<p> OK ! </p>' ; 
				
			 
				$contenu = $_POST['contenu'];
				$titre = $_POST['titre']; 
				$time = date("Y-m-d H:i:s");
				
				include('./traitement/mots_interdits.php'); 
			if($existe == FALSE ){ 
			$insert_actualite = $bdd->prepare('INSERT INTO actualite(titre,contenu,position,fichier,date,mkgroup) VALUES( :titre , :contenu,:position, \'\' ,\''.$time.'\','.$_GET['valeur'].')'); 
			$insert_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu'], 'position' => $_POST['position']));
				$id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' '); 
						$id_actualite = $bdd ->prepare('SELECT id from actualite where titre = :titre and contenu = :contenu') ; 
			$id_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu']));
			
				$id_uti = $id_utilisateur->fetch();
				$id_act = $id_actualite ->fetch(); 
			
				$insert_post = $bdd->query('INSERT INTO post VALUES(\''.$id_uti[0].'\',\''.$id_act[0].'\',0) '); 
			
				//header("location:profil.php"); 
			}
			}
		
			else{
				/*echo"<script language=\"javascript\">" ; 
				echo"alert('Vous devez saisir au moins du texte pour pouvoir publier')";
				echo"</script>";*/
				header("location:profil.php"); 
				}
		}
		
		
		echo('<h2> Publications du groupe: </h2>');
								$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
						$id_utilisateur = $rep->fetch(); 
		$rep = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id where actualite.mkgroup='.$_GET['valeur'].' ORDER BY date desc');

		include('./traitement/smiley.php'); 
		while($donnees=$rep->fetch()){
			echo('<div class="well">');
			$id_actualite = $bdd ->query('SELECT id from actualite where contenu = \''.$donnees['contenu'].'\' and titre = \''.$donnees['titre'].'\' ') ; 
			$id = $id_actualite->fetch(); 
			$tmp = $bdd->query('SELECT * FROM groupe INNER JOIN appartient ON groupe.id = appartient.idGroup INNER JOIN utilisateur ON appartient.idUtil = utilisateur.id where groupe.id='.$_GET['valeur'].' AND utilisateur.uha = \''.$login.'\' ');  
			$util = $tmp->fetch(); 
							
						if($util['admin'] == 1){
				echo('<a href=\'./traitement/deleteOnProfile.php?id='.$id[0].'\'>Supprimer</a>');
						}
			

			echo('<h2>'.$donnees['titre'].'</h2>');
			echo('<p>'.$donnees['contenu'].'<p>');
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
            
         </div>

        

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>
