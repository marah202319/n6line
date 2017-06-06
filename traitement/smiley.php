
<?php   
/*reste plus qu'a inclure fonctions.php au bon endroit et définir $texte */ 

function filtre_texte($texte)
    {

        $texte = str_replace(":)", "<img src='http://pm1.narvii.com/6258/39f76fb4d230fe64215060dd85537c5701869a04_hq.jpg' width=4% height =4% border='0'>", $texte);
		$texte = str_replace(";)", "<img src='http://www.hey.fr/tools/emoji/ios_emoji_winking_face.png' width=4% height =4% border='0'>", $texte);
		$texte = str_replace(":|", "<img src='https://openclipart.org/image/800px/svg_to_png/30229/face-plain.png' width=4% height =4% border='0'>", $texte);
		$texte = str_replace(":(", "<img src='https://t0.rbxcdn.com/bfed6a2a142c98f8c5ebcda18b7540f9' width=4% height =4% border='0'>", $texte);
		$texte = str_replace(":o", "<img src='https://s-media-cache-ak0.pinimg.com/originals/b1/13/6c/b1136c912e6cfa93b3e1463db47bb508.png'width=4% height =4% border='0'>", $texte);
		$texte = str_replace(":p", "<img src='http://www.emoji-quiz-answers.com/wp-content/uploads/2014/11/face_with_stuck-out_tongue_and_winking_eye.png' width=4% height =4% border='0'>", $texte);
		$texte = str_replace("(a)", "<img src='http://cdn.playbuzz.com/cdn/b266283b-7187-4873-89d0-07afd58b36bb/6d9d0695-5749-4e1b-90ec-039134b43bd8.jpg'width=4% height =4% border='0'>", $texte);
		$texte = str_replace(":D", "<img src='https://s-media-cache-ak0.pinimg.com/236x/8f/b3/72/8fb372c2851cc0ecaebc4bc172d17b81.jpg' width=4% height =4% border='0'>", $texte);
		$texte = str_replace(":*", "<img src='https://s-media-cache-ak0.pinimg.com/originals/03/7e/79/037e79b2fb52127537be79110891ae3f.png' width=4% height =4% border='0'>", $texte);
        return $texte;
		
        }
?>

