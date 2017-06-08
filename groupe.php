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





<?php include('./header.php'); ?>

    <div class="container">
	

        
		 <strong>Profil  </strong> 	<form method="post" action="./traitement/deconnexion.php">
		<input type="submit" name ="deconnexion" value="Se déconnecter" />
		</form>
			<div  class="col-md-3">
				<div id="list">
				   
					
				</div>
			</div>
				
				<div class="col-md-7">
					<div class="well" >
						<div id ="groupes" class="row">
						<?php include('./traitement/liste_groupe_page.php'); ?>
					<div class="well" > 							
					<form name="Créer un groupe" action="./traitement/creation_groupe.php" method="post">
							
								<input type="textarea" placeholder="Un nom" name="nom" style="height: 5%; width: 100%">
								<input type="textarea" placeholder="Description du groupe" name="contenu" style="height: 10%; width: 100%"> 
								<input type ="submit" name="Creer" value="Creer" >
								<input type ="submit" name="Photo" value="Photo" >
								
							</form></div>
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
