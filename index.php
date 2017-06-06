<!DOCTYPE html>
<html lang="fr">
    
    <head>
    
        <meta charset="utf-8">
        <title>n6line connexion</title>
	<!--	<link href="bootstrap/css/bootstrap.min.css.map" rel="stylesheet">-->
	<!--	<link href="bootstrap/css/bootstrap.css.map" rel="stylesheet">-->
	<!--	<link href="bootstrap/css/bootstrap-theme.min.css.map" rel="stylesheet">-->
	<!--	<link href="bootstrap/css/bootstrap-theme.css.map" rel="stylesheet">-->
	<!--	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
        
        <link rel="stylesheet" type="text/css" href="./css/app.css" />
   <!--     <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />-->
     <!--   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700,300" />-->
      
		
    </head>
		
	<body>
		<div class="container">
		<div class="row">
		<div class="col-xs-12">
    
			<div class="main">
            
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-sm-offset-1">
                    
					<h1>Connexion à n6line</h1>
					<h2>Le réseau social de l'ENSISA</h2>
                    
					<form role="form" class="form-horizontal" method="post" action="./traitement/connexion.php" accept-charset="utf-8">
						<div class="form-group">
							<div class="col-md-8"><input name="login" placeholder="Adresse mail uha" class="form-control" type="text" id="login"/></div>
						</div> 
                
						<div class="form-group">
							<div class="col-md-8"><input name="pass" placeholder="Mot de passe" class="form-control" type="password" id="password"/></div>
						</div> 
						
						<div class="form-group">
							<p id="q1" class="credits"><a href="./traitement/formulaire_ancien.php">Vous êtes un ancien de l'ENSISA ?</a></p>
							<p id="q2" class="credits"><a href="./traitement/register.php">Mot de passe oublié ?</a></p>
						</div>
						
						<div class="form-group">
							<div class="col-md-offset-0 col-md-8"><input style="cursor:pointer" class="btn btn-success btn btn-success" type="submit" name="connexion" value="Connexion"/></div>
							<div class="col-md-offset-0 col-md-8"><input style="cursor:pointer" class="btn btn-success btn btn-success" type="reset" name ="effacer" value="Effacer"/></div>
						</div>
            
					</form>
					
					<p class="credits">Développé par le groupe n6line</p>
					
				</div>
				</div>
        
			</div>
		</div>
		</div>
		</div>
    
    </body>
</html>