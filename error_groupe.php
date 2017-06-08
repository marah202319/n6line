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

setTimeout('refresh_liste()', 3000);

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

setTimeout('refresh_chat()', 1500);

}

</script>
<?php include('./header.php'); ?>

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

					<div class="well"  </div>
					<h3> Désolé mais vous ne faites pas parti du groupe </h3>
					<p> Contactez l'administrateur du groupe pour en faire parti <p>
				<form method="post" action="./accueil.php">
				<input type="submit" name ="Redirection vers l'accueil" value="Redirection vers l'accueil">
		</form>
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
