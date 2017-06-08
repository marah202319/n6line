<?php


    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }

	
echo('<div class="well">');	
echo('<div class="well">');
echo('<h1> Amis connectés :</h1>');
$rep = $bdd->query('SELECT nom,prenom,id FROM utilisateur WHERE connecte=1');

while($donnees=$rep->fetch()){
echo('<a href="chat.php?valeur='.$donnees['id'].'" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$donnees['nom'].' '.$donnees['prenom'].' <br /></a>');
}
echo('</div>');


echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
echo('<div class="well">');
echo('<h1> Amis hors ligne :</h1>');
$rep = $bdd->query('SELECT nom,prenom,id FROM utilisateur WHERE connecte=0');
while($donnees=$rep->fetch()){
	//echo('<a href="messagerie.php?valeur='.$donnees['id'].'">'.$donnees['nom'].' '.$donnees['prenom'].'</a>');
echo('<a href="chat.php?valeur='.$donnees['id'].'" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$donnees['nom'].' '.$donnees['prenom'].' <br /></a>');

 
}

echo('</div>');

echo('<div class="well">');	
               echo('<h2>E-Services</h2>');
                echo('<a href="http://edt.iariss.fr/" class="btn-sm btn-success" target="_blank"><span  aria-hidden="true"></span>Emploi du temps <br /></a>');
                echo('<a href="https://e-partage.uha.fr/" class="btn-sm btn-success" target="_blank"><span  aria-hidden="true"></span>E-partage <br /></a>');
                echo('<a href="https://www.e-formation.uha.fr/moodle/" class="btn-sm btn-success" target="_blank"><span  aria-hidden="true"></span>Moodle <br /></a>');
echo('</div>');
echo('</div>');
?>

