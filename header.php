<?php
session_start(); 
if(empty($_SESSION['login'])) {
header('Location: ./traitement/deconnexion.php');
}?> 

<?php
    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>N6Line</title>
<link rel="stylesheet" type="text/css" href="./CSS/style.css">

    <!-- Bootstrap core CSS -->
    <link href="./CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
          <a class="navbar-brand" href="./accueil.php"><img src="./img/image1.png"></a>
        </div>
          <div class="navbar-collapse collapse col-sm-3 col-md-3 navbar-left">
              <form class="navbar-form" action="./traitement/search_contenu.php" method="post" name="search">
                  <div class="input-group">
				  
                      <input type="text" class="form-control" placeholder="Chercher des actualités" name="search">
					  
                      <div class="input-group-btn">
                          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                      </div>
                  </div>
              </form>
          </div>
		  <div class="navbar-collapse collapse col-sm-3 col-md-3 navbar-left">
              <form class="navbar-form" action="./traitement/search_personne.php" method="post" name="search">
                  <div class="input-group">
				  
                      <input type="text" class="form-control" placeholder="Chercher des personnes" name="search">
					  
                      <div class="input-group-btn">
                          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                      </div>
                  </div>
              </form>
          </div>
        <div id="navbar" class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><a href="./profil.php">Profil</a>.</li>
            <li><a href="./chat.php">Messagerie</a></li>
            <li><a href="./groupe.php">Groupe</a></li>
             <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>
			 <?php $id=$bdd->query('SELECT id FROM utilisateur where uha= \''.$_SESSION['login'].'\'');
					$idutil=$id->fetch();
			 $nb = $bdd->query('SELECT count(idutil) as id_util FROM notificationmessage INNER JOIN utilisateur ON notificationmessage.idutil = utilisateur.id where utilisateur.id ='.$idutil['id'].' AND notificationmessage.vu=0');
					 $nb_mess=$nb->fetch();
					 echo('<li><span class="label label-pill label-danger count" aria-hidden="true" style="padding-top:0px;">'.$nb_mess['id_util'].'</span> </a></li>');
					// echo('<li><font color="red">'.$nb_mess['id_util'].'</font></li>');
					?>
					
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