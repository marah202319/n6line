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
        <div class="row" style="">
            <div class="col-md-3" id="list" >
                <strong>Profil  </strong> <a href="#" class="btn btn-xs btn-danger"> Déconnexion</a> 
                <h4>Groupes</h4>
                <a href="#" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Groupe 1 <br /></a>
                <a href="#" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Groupe 2 <br /></a>
                <a href="#" class="btn-sm btn-info" > <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Groupe 3 <br /></a>
                <h4>Evénements</h4>
               <a href="#" class="btn-sm btn-warning"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Evénement 1 <br /></a>
                <a href="#" class="btn-sm btn-warning"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Evénement 2 <br /></a>
                <a href="#" class="btn-sm btn-warning"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Evénement 3 <br /></a>
               <h4>E-Services</h4>
                <a href="http://www.edt.iariss.fr" class="btn-sm btn-success" target="_blank"><span  aria-hidden="true"></span>Emploi du temps <br /></a>
                <a href="https://e-partage.uha.fr/" class="btn-sm btn-success" target="_blank"><span  aria-hidden="true"></span>E-partage <br /></a>
                <a href="https://www.e-formation.uha.fr/moodle/" class="btn-sm btn-success" target="_blank"><span  aria-hidden="true"></span>Moodle <br /></a>
                
                
        
      </div>
            <div class="col-md-7" >
                 <div class="well">  
                    <div class="row">
                     <div class="col-md-12">
                        <div class="col-md-6">
                          <h4>
                             <a href="profil.html" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profil<br /></a>
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
						$rep = $bdd->query('SELECT * FROM utilisateur where id=\''.$id_utilisateur[0].'\' ');
						
						
						while($donnees=$rep->fetch()){
	
							echo('Nom : '.$donnees['nom'].'</br>');
							echo('Prénom : '.$donnees['prenom'].'</br>');
							echo('Adresse UHA : '.$donnees['uha'].'</br>');
							echo('Âge : '.$donnees['age'].' ans</br>');
							echo('Adresse : '.$donnees['adresse'].'</br>');
						}
						
						?>
						</p>
						<p>
						<?php
							/* Sélection de la fonction de la personne, ou affichage de la promo si étudiant */ 
							
							$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
							$id_utilisateur = $rep->fetch(); 
							$rep2 = $bdd->query('SELECT promotion from Etudiant where id=\''.$id_utilisateur[0].'\' ');
							$promo = $rep2->fetch(); 
							echo (''.$promo[0].'') ; 
							
							$rep3 = $bdd->query('SELECT fonction from administration where id=\''.$id_utilisateur[0].'\' ');
							$fonction = $rep3->fetch();
							echo (''.$fonction[0].''); 
						?>
						</p>
						<p>
						<?php
							$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
							$id_utilisateur = $rep->fetch(); 
							
							$rep2 = $bdd->query('SELECT filiere from etudiant where id = \''.$id_utilisateur[0].'\' ');
							$filiere= $rep2->fetch(); 
							
							echo $filiere[0];
					?>	
				</p>
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
                          </div>
                        </div>
                     </div>  
                </div>
                  <div class="well"> 
                    <a href="#">Paramètres du compte</a><br/>
                    <a href="#">Changer votre photo de profil</a><br/>
                    <a href="./traitement/modification_profil.php">Modifier</a><br/>
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
			$insert_actualite = $bdd->prepare('INSERT INTO actualite(titre,contenu,position,fichier,date) VALUES( :titre , :contenu,:position, \'\' ,\''.$time.'\')'); 
			$insert_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu'], 'position' => $_POST['position']));
				$id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' '); 
						$id_actualite = $bdd ->prepare('SELECT id from actualite where titre = :titre and contenu = :contenu') ; 
			$id_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu']));
			
				$id_uti = $id_utilisateur->fetch();
				$id_act = $id_actualite ->fetch(); 
			
				$insert_post = $bdd->query('INSERT INTO post VALUES(\''.$id_uti[0].'\',\''.$id_act[0].'\') '); 
			
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
		
		
		echo('<h2> Mes publications </h2>');
								$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
						$id_utilisateur = $rep->fetch(); 
		$rep = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id where utilisateur.id = \''.$id_utilisateur[0].'\' ORDER BY date desc');

		include('./traitement/smiley.php'); 
		while($donnees=$rep->fetch()){
			echo('<div class="well">');
			$id_actualite = $bdd ->query('SELECT id from actualite where contenu = \''.$donnees['contenu'].'\' and titre = \''.$donnees['titre'].'\' ') ; 
			$id = $id_actualite->fetch(); 
						?>	
				<a href='./traitement/deleteOnProfile.php?id=<?php echo $id[0]; ?> '>Supprimer</a>
			<?php 

			echo('<h2>'.$donnees['titre'].'</h2>');
			echo('<p>'.filtre_texte($donnees['contenu']).'<p>');
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
        <div class="row">
             <div class="chat col-md-3">
                 <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class=panel-title>Chat</h3>
                     </div>
                     <div class="panel-body">
                     Oussama : Salut <br/>
                     User : Comment tu vas ?<br/>
                     Oussama : bien ou quoi ?<br/>
                     user : Ouai tranquille !<br/>
                     </div>
                 </div>
            </div>
        </div>
    </div><!-- /.container -->
        

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>
