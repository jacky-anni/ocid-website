<?php

//upload.class


	if(isset($_POST["image"]))
	{
		session_start();
		require'../../class/Fonctions.php';
		require'../../class/Query.php';
		require'../../class/bdd/bdd.php';
		require'../../class/Projet.php';

		$data = $_POST["image"];

		$image_array_1 = explode(";", $data);

		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);

		$name=rand(100,999).time();
		
		$imageName ="../../dist/img/projet/".$name.'.png';
		$photo ="../../dist/img/projet/".$name.'.png';

		file_put_contents($imageName, $data);
		
		// echo '<img src="'.$photo.'" class="img-thumbnail col-md-12" />';
		Projet::upload($name.'.png',$_SESSION['id_projet']);

		

	}

?>




