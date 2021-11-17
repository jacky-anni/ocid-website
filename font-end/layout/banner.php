<?php
	function banner($titre){

		if (isset($titre)) {
			$titre= ucfirst(str_replace('-', '   ' , ucfirst($titre)));
		}else{
			$titre='Accueil';
		}

		echo "
		<div class='c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both'>
			<div class='container'>
				<div class='c-page-title c-pull-left'>
					<h3 class='c-font-uppercase c-font-sbold'>$titre</h3>
				</div>
			</div>
		</div>

		";
	}

?>

<?php
	// if (isset($_SERVER['HTTPS']) &&
	// 	($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
	// 	isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
	// 	$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
	// 	echo $protocol = 'https://';
	// }
	// else {
	// echo $protocol = 'http://';
	// }
?>
