
<?php   
/*reste plus qu'a inclure fonctions.php au bon endroit et définir $texte */ 

function filtre_texte($texte)
    {

        $texte = str_replace("|:-)", "<img src='smileys/01.gif' border='0'>", $texte);
        $texte = str_replace(";-)", "<img src='smileys/02.gif' border='0'>", $texte);
        $texte = str_replace(":-))", "<img src='smileys/03.gif' border='0'>", $texte);
        $texte = str_replace(":-)", "<img src='smileys/04.gif' border='0'>", $texte);
        $texte = str_replace(":-o", "<img src='smileys/05.gif' border='0'>", $texte);
        $texte = str_replace(":o)", "<img src='smileys/06.gif' border='0'>", $texte);
        $texte = str_replace(":-((", "<img src='smileys/07.gif' border='0'>", $texte);
        $texte = str_replace(":-(", "<img src='smileys/08.gif' border='0'>", $texte);
        $texte = str_replace("8-)", "<img src='smileys/09.gif' border='0'>", $texte);
        $texte = str_replace(":-p", "<img src='smileys/10.gif' border='0'>", $texte);
        $texte = str_replace(";-(", "<img src='smileys/11.gif' border='0'>", $texte);
        return $texte;
        }
?>

