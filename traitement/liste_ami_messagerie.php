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
echo('<ul>');
while($donnees=$rep->fetch()){
echo('<li><a href="chat.php?valeur='.$donnees['id'].'">'.$donnees['nom'].' '.$donnees['prenom'].'</a></li>');
}
echo('</div>');
echo('</ul>');

echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
echo('<div class="well">');
echo('<h1> Amis hors ligne :</h1>');
$rep = $bdd->query('SELECT nom,prenom,id FROM utilisateur WHERE connecte=0');
echo('<ul>');
while($donnees=$rep->fetch()){
	//echo('<a href="messagerie.php?valeur='.$donnees['id'].'">'.$donnees['nom'].' '.$donnees['prenom'].'</a>');
echo('<li><a href="chat.php?valeur='.$donnees['id'].'">'.$donnees['nom'].' '.$donnees['prenom'].'</a></li>');

 
}

echo('</ul>');
echo('</div>');
echo('</div>');
?>

