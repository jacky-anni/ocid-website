<?php

//upload.class

session_start();
require'../class/Fonctions.php';
require'../class/Query.php';
require'../class/bdd/bdd.php';
require'../class/Article.php';

	if(isset($_POST["image"]))
	{

		$data = $_POST["image"];

		$image_array_1 = explode(";", $data);

		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);

		$id= rand(100,999).rand(100,999);

		$name=time().$id;
		
		$imageName ="../dist/img/photos/".$name.'.png';
		$photo ="dist/img/photos/".$name.'.png';

		file_put_contents($imageName, $data);
		echo '<img src="'.$photo.'" class="img-thumbnail col-md-6" />';

		$_SESSION['nom']=$name.'.png';
		// Article::upload($name.'.png',$_SESSION['id_article']);
	}

	if (isset($_POST['titre'])) {
		extract($_POST);
		$date_post=date('d-M-Y  h:i:a');

		if (Query::count_prepare('photo',$_SESSION['nom'],'nom')>=1) {
			echo "";
		}elseif (empty($titre)) {
			echo "<p class='alert alert-danger'>Le champ description est requis</p>";
		}
		else{
			$req=class_bdd::connexion_bdd()->prepare('INSERT INTO photo(titre,nom,reference,posteur,date_post) VALUES(?,?,?,?,?)');
			$req->execute(array($titre,$_SESSION['nom'],$id,$_SESSION['id'],$date_post));
			echo "<p class='alert alert-success'> Photo enregistrée avec succès</p>";
		}
	}

?>




