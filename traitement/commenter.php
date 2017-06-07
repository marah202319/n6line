<?php
session_start(); 
if(empty($_SESSION['login'])) {
header('Location: ./traitement/deconnexion.php');
}?> 


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>N6Line</title>
<link rel="stylesheet" type="text/css" href="../CSS/style.css">

    <!-- Bootstrap core CSS -->
    <link href="../CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <style>
          .chat{
              position:fixed;
              right:20px;
              bottom:0px;
          }
     
          
          .navbar-inverse .navbar-nav>li>a {
              color:white;
          }
           .navbar-inverse .navbar-nav>li>a:hover {
               color:#abb9f8;
          }
      </style>
  
  </head>

  <body style=" background: #aaa;" onload='refresh_liste(); refresh_actualite(); refresh_chat();'>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="../img/image1.png"></a>
        </div>
          <div class="navbar-collapse collapse col-sm-3 col-md-3 navbar-left">
              <form class="navbar-form" role="search">
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Chercher" name="q">
                      <div class="input-group-btn">
                          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                      </div>
                  </div>
              </form>
          </div>
        <div id="navbar" class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><a href="../profil.php">Profil</a>.</li>
            <li><a href="../chat.php">Messagerie</a></li>
            <li><a href="#">Groupes</a></li>
             <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>
              <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
              <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
			  
			  
             
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-lock" 
aria-hidden="true"></span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Créer une page</a></li>
            <li><a href="#">Créer un groupe</a></li>
            <li><a href="#">Créer un événement </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Signaler un problème</a></li>
            <li><a href="#">Aide</a></li>
          </ul>
        </li>
      </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
	

 
		 <strong>Profil  </strong> 	<form method="post" action="deconnexion.php">
		<input type="submit" name ="deconnexion" value="Se déconnecter" />
		</form>
			<div  class="col-md-3">
			
				<div id="list">
				
				<?php include('liste_ami.php'); ?>
					
				</div>
				
				<div id="groupe">
					<?php include('liste_groupe.php'); ?>
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
							
						include('./smiley.php'); 

						while($donnees=$rep->fetch()){
							
							echo('<div class="well">');
							echo('<h2>'.$donnees['titre'].'</h2>');
							echo('<p>'.filtre_texte($donnees['contenu']).'<p>');
							if($donnees['position'] != ''){
								echo('<p>'.'A '.$donnees['position'].'</p>'); 
							}
							echo('</br>');
							echo('<p>'.$donnees['date'].'<p>');
							echo('<p> Par '.$donnees['prenom'].' '.$donnees['nom'].'<p>');
							echo('</div>');
						}

						?> 
						<div id ="Publication" class="row">
							
							<form name="Commenter" action="commenter_publication.php?id=<?php echo $_GET['id']; ?>" method="post"> 
		
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
								<a href='deleteCom.php?id=<?php echo $donnees['id']; ?> '>Supprimer</a>
							<?php
							}
							echo('<p>'.'<strong>'.filtre_texte($donnees['contenu']).'</strong>'.'<p>');
							echo('<p>'.$donnees['date'].'<p>');
							
							$id_utilisateur = $bdd ->query('SELECT DISTINCT nom,prenom from utilisateur INNER JOIN commentaire ON utilisateur.id  = \''.$donnees['idutil'].'\' ') ; 
							while($id = $id_utilisateur->fetch()){
								echo 'Commenté par : '.$id['nom'].' '.$id['prenom'] ; 
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

