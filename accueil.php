<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script language="javascript" type='text/javascript'>
    function auto_deco(){
        window.location="./traitement/auto_deco.php";
    }
    setTimeout("auto_deco()",300000);
</script>


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

setTimeout('refresh_liste()', 100);

}

</script>

<script>
function refresh_actualite()

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

var filename = './traitement/actualite.php';

xhr_object.open(method, filename, true);

xhr_object.onreadystatechange = function()

{

if(xhr_object.readyState == 4)

{

var tmp = xhr_object.responseText;

document.getElementById('actualite').innerHTML = tmp;

}

}

xhr_object.send(null);

setTimeout('refresh_actualite()', 3000);

}

</script>
<script>
function refresh_chat()

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

var filename = './traitement/chat.php';

xhr_object.open(method, filename, true);

xhr_object.onreadystatechange = function()

{

if(xhr_object.readyState == 4)

{

var tmp = xhr_object.responseText;

document.getElementById('chat').innerHTML = tmp;

}

}

xhr_object.send(null);

setTimeout('refresh_chat()', 100);

}

</script>
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
          <a class="navbar-brand" href="#"><img src="./img/image1.png"></a>
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
            <li><a href="./profil.php">Profil</a>.</li>
            <li><a href="./chat.php">Messagerie</a></li>
            <li><a href="#">Groupes</a></li>
             <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>
			 <?php $id=$bdd->query('SELECT id FROM utilisateur where uha= \''.$_SESSION['login'].'\'');
					$idutil=$id->fetch();
			 $nb = $bdd->query('SELECT count(idutil) as id_util FROM notificationmessage INNER JOIN utilisateur ON notificationmessage.idutil = utilisateur.id where utilisateur.id ='.$idutil['id'].' AND notificationmessage.vu=0');
					 $nb_mess=$nb->fetch();
					echo('<li><font color="red">'.$nb_mess['id_util'].'</font></li>');
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

    <div class="container">
	

        
		 <strong>Profil  </strong> 	<form method="post" action="./traitement/deconnexion.php">
		<input type="submit" name ="deconnexion" value="Se déconnecter" />
		</form>
			<div  class="col-md-3">
				<div id="list">
				   
					
				</div>
				
				<div id="groupe">
					<?php include('./traitement/liste_groupe.php'); ?>
				</div>
			</div>
				
				<div class="col-md-7">
					<div class="well" >
						<div id ="Publication" class="row">
							
							<form name="Publier" action="./traitement/actualite.php" method="post">
							
								<input type="textarea" placeholder="Un titre" name="titre" style="height: 5%; width: 100%">
								<input type="textarea" placeholder="Où étiez-vous ? " name="position" style="height: 5%; width: 100%">
								<input type="textarea" placeholder="Rédigez votre publication ici" name="contenu" style="height: 10%; width: 100%"> 
								<input type ="submit" name="Publier" value="Publier" >
								<input type ="submit" name="Photo/video" value="Photo/vidéo" >
								
							</form>
			
						</div>
					<div class="well" id="actualite"> </div>
					</div>
				</div>
				
				<div class="col-md-2">
					
						<div class="well"><h5> SPONSORISE</h5><p>
							<img src="./img/imag4.png" style="width:100%"/></p>
							<p>
							Retrouver nous sur <a href="#">Iariss </a>pour plus d'infos
							</p>
					
						</div>
						<h6> En6Line, 2016-2017</h6>
					
				</div>
	</div>
			<div class="row">
				 <div class="chat col-md-3">
					 <div class="panel panel-primary">
					 <div class="panel-heading">
						 <h3 class=panel-title>Chat</h3></div>
						 <div class="panel-body">
						 Oussama : Salut <br/>
						 User : Comment tu vas ?<br/>
						 Oussama : bien ou quoi ?<br/>
						 user : Ouai tranquille !<br/>
						 </div>
					 </div>
				</div>
		</div>
    </div>
        

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./css/bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>
