<?php


    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }

echo('<div class="well">');	
echo('<div class="well">');
echo('<h2> Amis connectés :</h2>');
$rep = $bdd->query('SELECT id,nom,prenom FROM utilisateur WHERE connecte=1');
while($donnees=$rep->fetch()){
	echo('<a href="profil_autre?id='.$donnees['id'].'" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$donnees['prenom'].' '.$donnees['nom'].' <br /></a>');
}
echo('</div>');

echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
echo('<div class="well">');
echo('<h2> Amis hors ligne :</h2>');
$rep = $bdd->query('SELECT id,nom,prenom FROM utilisateur WHERE connecte=0');

while($donnees=$rep->fetch()){
// echo('<a href="#" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$donnees['prenom'].' '.$donnees['nom'].' <br /></a>');
echo('<a href="profil_autre?id='.$donnees['id'].'" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$donnees['prenom'].' '.$donnees['nom'].' <br /></a>');
}
echo('</div>');
echo('<div class="well">');	
               echo('<h2>E-Services</h2>');
                echo('<a href="http://www.edt.iariss.fr" class="btn-sm btn-success" target="_blank"><span  aria-hidden="true"></span>Emploi du temps <br /></a>');
                echo('<a href="https://e-partage.uha.fr/" class="btn-sm btn-success" target="_blank"><span  aria-hidden="true"></span>E-partage <br /></a>');
                echo('<a href="https://www.e-formation.uha.fr/moodle/" class="btn-sm btn-success" target="_blank"><span  aria-hidden="true"></span>Moodle <br /></a>');
echo('</div>');
echo('</div>');
?>

