<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
function refresh_liste2()

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

var filename = './traitement/liste_ami_messagerie.php';

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

setTimeout('refresh_liste2()', 5000);

}

</script>
<script>
function refresh_message()

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

var filename = './traitement/messagerie.php';

xhr_object.open(method, filename, true);

xhr_object.onreadystatechange = function()

{

if(xhr_object.readyState == 4)

{

var tmp = xhr_object.responseText;

document.getElementById('message').innerHTML = tmp;

}

}

xhr_object.send(null);

setTimeout('refresh_message()', 100);

}

</script>

<!- Code de securisation du retour arrière->

<?php
session_start(); 
if(empty($_SESSION['login'])) {
header('Location: ./index.php');
}?> 

<!DOCTYPE html>
<html lang="fr">
     <head>
        <meta charset="utf-8">
         <title>N6LINE</title>
        <link rel="stylesheet" href="./CSS/style.css">

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

<body onload=' refresh_liste2(),refresh_message();'>
<div class="container">
	<div id="list" class="col-md-3">

	</div>

	<div class="col-md-9">
		<div id="message">

		</div> 
		<div id="texte">
		<form method="post" action="./traitement/send.php">
						
							<table>
							<tr>
								<td><p><label for="message">Message:</label><textarea name="message" rows="5" cols="50"></textarea></p><input type="submit" name="envoyer" value="envoyer"></td>					                
							</tr>              
							</table>	
					</form>
		</div>
	</div>
</div>

<?php
 setcookie('variable',$_GET['valeur'],time()+3600) ; ?>

<form name="x" action="./accueil.php" method="post">
<input type="submit" value="Accueil">
</form>

<form method="post" action="./traitement/deconnexion.php">
	<input type="submit" name ="deconnexion" value="Se déconnecter" />
</form>

</body>