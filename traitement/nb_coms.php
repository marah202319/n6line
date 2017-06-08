<?php 

	function count_com($var){
		
		try{ 
		$bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
		}
		catch(Exception $e){
		die('Erreur : '.$e->getMessage()); 
		}

		$nb = $bdd->query('SELECT COUNT(*) FROM commente WHERE commente.idact = \''.$var.'\' '); 
		$nombre_coms = $nb->fetch(); 
		
		return $nombre_coms[0]; 
		
	}

?>