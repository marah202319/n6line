<?php
include('header.php');
if(empty($_SESSION['login'])) {
header('Location: ./traitement/deconnexion.php');
}?> 




    <div class="container">
	

 
		 <strong>Profil  </strong> 	<form method="post" action="./traitement/deconnexion.php">
		<input type="submit" name ="deconnexion" value="Se déconnecter" />
		</form>
			<div  class="col-md-3">
			
				<div id="list">
				
				<?php include('./traitement/liste_ami.php'); ?>
					
				</div>
				
				<div id="groupe">
					<?php include('./traitement/liste_groupe.php'); ?>
				</div>
			</div>
				
				<div class="col-md-7">
					<div class="well" >
						
						
						<?php /*On récupere la publication correspondante */ 
				
						try{ 
							$bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
						}
				
						catch(Exception $e){
							die('Erreur : '.$e->getMessage()); 
						}

				
						//echo $_GET['id']; //id de l'actualité que l'on va commenter 
				
						$rep = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id WHERE actualite.id = \''.$_GET['id'].'\'  '); 
							
						include('./traitement/smiley.php'); 

						while($donnees=$rep->fetch()){
							
							echo('<div class="well">');
							echo('<h2>'.$donnees['titre'].'</h2>');
							echo('<p>'.filtre_texte($donnees['contenu']).'<p>');
							if($donnees['position'] != ''){
								echo('<p>'.'A '.$donnees['position'].'</p>'); 
							}
							echo('</br>');
							echo('<p>'.$donnees['date'].'<p>');
							echo('<p> Par <a href="./profil_autre?id='.$donnees['id'].'" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$donnees['prenom'].' '.$donnees['nom'].' </a></p>');
							echo('</div>');
						}

						?> 
						<div id ="Publication" class="row">
							
							<form name="Commenter" action="./traitement/commenter_publication.php?id=<?php echo $_GET['id']; ?>" method="post"> 
		
								<input type="textarea" placeholder="Rédigez votre commentaire ici" name="contenu" style="height: 10%; width: 100%"> 
								<input type ="submit" name="Commenter" value="Commenter" >
								
							</form>
			
						</div>
						

					<div class="well" id="actualite">
					
					<?php 
						echo('<h2>Commentaires</h2>');
	
						$request = $bdd->query('SELECT commentaire.id,commentaire.idutil,commentaire.contenu,commentaire.date FROM commentaire INNER JOIN commente on commentaire.id = commente.idcom INNER JOIN actualite on commente.idact = actualite.id AND actualite.id =\''.$_GET['id'].'\' ORDER BY commentaire.date desc ');
						
						$id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' '); 
						$id_uti = $id_utilisateur->fetch();
								
						while($donnees=$request->fetch()){
							
							echo('<div class="well">');
							if($donnees['idutil']==$id_uti[0]){
							?>
								<a href='traitement/deleteCom.php?id=<?php echo $donnees['id']; ?> '>Supprimer</a>
							<?php
							}
							echo('<p>'.'<strong>'.filtre_texte($donnees['contenu']).'</strong>'.'<p>');
							echo('<p>'.$donnees['date'].'<p>');
							
							$id_utilisateur = $bdd ->query('SELECT DISTINCT nom,prenom from utilisateur INNER JOIN commentaire ON utilisateur.id  = \''.$donnees['idutil'].'\' ') ; 
							while($id = $id_utilisateur->fetch()){
								echo('<p> Commenté par <a href="./profil_autre?id='.$donnees['idutil'].'" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$id['prenom'].' '.$id['nom'].' </a></p>');
							}
							echo('</div>');
							echo '</br>' ; 
						}
						
						echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
						?>

					</div>
						
					</div>
				</div>
			
				
				<div class="col-md-2">
					
						<div class="well"><h5> SPONSORISE</h5><p>
							<img src="../img/imag4.png" style="width:100%"/></p>
							<p>
							Retrouver nous sur <a href="#">Iariss </a>pour plus d'infos
							</p>
					
						</div>
						<h6> En6Line, 2016-2017</h6>
					
				</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./css/bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>

