<?php 
		/* analyse du texte rentré en paramètre et recherche dans un fichier txt */ 
	$existe = FALSE; 
	$monfichier = fopen('.\\ressource\\mots.txt', 'r+');
	while (!feof($monfichier) && !$existe) {
		$ligne = fgets($monfichier, 1024);
		if (preg_match('|\b' . preg_quote($_POST['contenu']) . '\b|i', $ligne)){
			$existe = TRUE;
			}
			
		 if(!empty($_POST['titre'])){ 
			if (preg_match('|\b' . preg_quote($_POST['titre']) . '\b|i', $ligne)){
			$existe = TRUE;
			}
		 }
			
		}
		fclose($monfichier);
		if ($existe) {
			// echo '<p> Mot interdit détecté dans : '.$titre.' '.$contenu.' '.$position.'</p>' ;
			echo '<p> Publication impossible </p>'; 
			unset($_POST['Publier']);					
		}
			
	
		?>