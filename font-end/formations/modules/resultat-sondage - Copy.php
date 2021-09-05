<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Sondage.php'); ?>
<!DOCTYPE html>
<html lang="en"    >
<?php 
// selectionner la formation
	$formation=Query::affiche('formation',$url[1],'id');
	if (!$formation) {
		Fonctions::set_flash("Cette formation n'existe pas",'warning');
		echo "<script>window.location ='$link_menu/formations';</script>";
	}
?>
<title>Resultat du sondage</title>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <?php include('font-end/layout/header.php');?>
    <?php include('font-end/layout/logo_and_search.php');?>
    <?php include('font-end/layout/menu.php');?>
    <?php include('font-end/layout/user_bar.php');?>
</header>
<div class="c-layout-page">
<?php include('font-end/layout/banner.php');?>
<div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style=" background-color: #26a8b4; background-image: url(<?= $link ?>/asskets/base/img/layout/banner.jpg); ">
	<div class="container">
		<div class="c-page-title c-pull-left">
			<h3 class="c-font-uppercase c-font-bold c-font-white c-font-29 c-font-slim" style="line-height: 35px; font-size: 25px;"><?= $formation->titre ?></h3>
			<h3 class=" c-font-tlhin" style="color: yellow;">Résultat du questionnaire d'introduction</h3>
		</div>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
</div>

<?php
	foreach (Query::liste('sondage') as $data1) {
		// echo $data1->2_group_laj."</br>";
	}

?>

<div class="container">
		<?php include('admin/includes/flash.php'); ?>
			<div class="row">
				<!-- BEGIN: ADDRESS FORM -->
				<div class="col-md-12 c-padding-20" style="border: 1px solid silver;">
					<h3 class="c-font-bold c-font-uppercase c-font-24 alert alert-primary" style="color: #26a8b4; text-align: center;">Rezilta detaye pou entwodiksyon fòmasyon an</h3>
					<div class="col-md-12">
						<?php include('admin/includes/flash.php'); ?>

						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th colspan="5" style="text-align: center; background-color: #20b2aa; color: white;"><label  class="col-md-12"><b>1.	Sèks ou</b> </label></th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<th>Kantite moun ki ranpli fòmilè a</th>
										<th>Gason</th>
										<th>Fanm</th>
									</tr>

									<tr style="font-size: 18px;">
										<td><?= Query::count_query('sondage'); ?></td>
										<td>
											<?php $kesyon_1=number_format( Query::count_prepare('sondage','Gason','1_sexe')*100/Query::count_query('sondage'),2) ?>
											<?= $total= Query::count_prepare('sondage','Gason','1_sexe') ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= $kesyon_1 ?>%; background-color: red;">
											    	<?= $kesyon_1 ?>%
											  	</div>
											</div>
										<td>
											<?php $kesyon_1_1=number_format( Query::count_prepare('sondage','Fanm','1_sexe')*100/Query::count_query('sondage'),2) ?>
											<?= Query::count_prepare('sondage','Fanm','1_sexe') ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= $kesyon_1_1 ?>%;">
											    	<?= $kesyon_1_1 ?>%
											  	</div>
											</div>
										</td>
									</tr>
									</tbody>
								</table>
							</div>



							<div class="col-md-12">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th colspan="5" style="text-align: center; background-color: #20b2aa; color: white;"><label  class="col-md-12"><b>2. Nan ki gwoup laj ou ye?</b> </label></th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<th>gwoup laj</th>
										<th>Kantite repons</th>
										<th>Gason</th>
										<th>Fanm</th>
									</tr>

									<tr>
										<td>18 – 24 lane</td>
										<td>
											<?=  Query::count_prepare('sondage','18 – 24 lane','2_group_laj') ?>
										<td>
											<?= Sondage::repartition('2_group_laj','1_sexe','18 – 24 lane','Gason'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('2_group_laj','1_sexe','18 – 24 lane','Gason')*100/Query::count_prepare('sondage','18 – 24 lane','2_group_laj') ?>%; background-color: red;">
											    	<?= number_format(Sondage::repartition('2_group_laj','1_sexe','18 – 24 lane','Gason')*100/Query::count_prepare('sondage','18 – 24 lane','2_group_laj'),2) ?>%
											  	</div>
											</div>
										</td>
										<td>
											<?= Sondage::repartition('2_group_laj','1_sexe','18 – 24 lane','Fanm'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('2_group_laj','1_sexe','18 – 24 lane','Fanm')*100/Query::count_prepare('sondage','18 – 24 lane','2_group_laj') ?>%;">
											    	<?= number_format(Sondage::repartition('2_group_laj','1_sexe','18 – 24 lane','Fanm')*100/Query::count_prepare('sondage','18 – 24 lane','2_group_laj'),2) ?>%
											  	</div>
											</div>
										</td>
									</tr>


									<tr>
										<td>25 – 30 lane</td>
										<td>
											<?=  Query::count_prepare('sondage','25 – 30 lane','2_group_laj') ?>
										<td>
											<?= Sondage::repartition('2_group_laj','1_sexe','25 – 30 lane','Gason'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('2_group_laj','1_sexe','25 – 30 lane','Gason')*100/Query::count_prepare('sondage','25 – 30 lane','2_group_laj') ?>%; background-color: red;">
											    	<?= number_format(Sondage::repartition('2_group_laj','1_sexe','25 – 30 lane','Gason')*100/Query::count_prepare('sondage','25 – 30 lane','2_group_laj'),2) ?>%
											  	</div>
											</div>
										</td>
										<td>
											<?= Sondage::repartition('2_group_laj','1_sexe','25 – 30 lane','Fanm'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('2_group_laj','1_sexe','25 – 30 lane','Fanm')*100/Query::count_prepare('sondage','25 – 30 lane','2_group_laj') ?>%;">
											    	<?= number_format(Sondage::repartition('2_group_laj','1_sexe','25 – 30 lane','Fanm')*100/Query::count_prepare('sondage','25 – 30 lane','2_group_laj'),2) ?>%
											  	</div>
											</div>
										</td>
									</tr>

									<tr>
										<td>31 – 35 lane</td>
										<td>
											<?=  Query::count_prepare('sondage','31 – 35 lane','2_group_laj') ?>
										<td>
											<?= Sondage::repartition('2_group_laj','1_sexe','31 – 35 lane','Gason'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('2_group_laj','1_sexe','31 – 35 lane','Gason')*100/Query::count_prepare('sondage','31 – 35 lane','2_group_laj') ?>%; background-color: red;">
											    	<?= number_format(Sondage::repartition('2_group_laj','1_sexe','31 – 35 lane','Gason')*100/Query::count_prepare('sondage','31 – 35 lane','2_group_laj'),2) ?>%
											  	</div>
											</div>
										</td>
										<td>
											<?= Sondage::repartition('2_group_laj','1_sexe','31 – 35 lane','Fanm'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('2_group_laj','1_sexe','31 – 35 lane','Fanm')*100/Query::count_prepare('sondage','31 – 35 lane','2_group_laj') ?>%;">
											    	<?= number_format(Sondage::repartition('2_group_laj','1_sexe','31 – 35 lane','Fanm')*100/Query::count_prepare('sondage','31 – 35 lane','2_group_laj'),2) ?>%
											  	</div>
											</div>
										</td>
									</tr>

									<tr>
										<td>36 oswa plis</td>
										<td>
											<?=  Query::count_prepare('sondage','36 oswa plis','2_group_laj') ?>
										<td>
											<?= Sondage::repartition('2_group_laj','1_sexe','36 oswa plis','Gason'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('2_group_laj','1_sexe','36 oswa plis','Gason')*100/Query::count_prepare('sondage','36 oswa plis','2_group_laj') ?>%; background-color: red;">
											    	<?= number_format(Sondage::repartition('2_group_laj','1_sexe','36 oswa plis','Gason')*100/Query::count_prepare('sondage','36 oswa plis','2_group_laj'),2) ?>%
											  	</div>
											</div>
										</td>
										<td>
											<?= Sondage::repartition('2_group_laj','1_sexe','36 oswa plis','Fanm'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('2_group_laj','1_sexe','36 oswa plis','Fanm')*100/Query::count_prepare('sondage','36 oswa plis','2_group_laj') ?>%;">
											    	<?= number_format(Sondage::repartition('2_group_laj','1_sexe','36 oswa plis','Fanm')*100/Query::count_prepare('sondage','36 oswa plis','2_group_laj'),2) ?>%
											  	</div>
											</div>
										</td>
									</tr>

									</tbody>
								</table>
							</div>

							<div class="col-md-12">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th colspan="5" style="text-align: center; background-color: #20b2aa; color: white;"><label  class="col-md-12"><b>3. Pa ki mwayen ou te enfòme de fòmasyon an :</b> </label></th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<th>Mwayen yo enfome</th>
										<th>Kantite repons</th>
										<th>Gason</th>
										<th>Fanm</th>
									</tr>

									<tr>
										<td>Radyo/televizyon</td>
										<td>
											<?=  Query::count_prepare('sondage','Radyo/televizyon','3_mwayen_enfomasyon') ?>
										<td>
											<?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Radyo/televizyon','Gason'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Radyo/televizyon','Gason')*100/Query::count_prepare('sondage','Radyo/televizyon','3_mwayen_enfomasyon') ?>%; background-color: red;">
											    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Radyo/televizyon','Gason')*100/Query::count_prepare('sondage','Radyo/televizyon','3_mwayen_enfomasyon'),2) ?>%
											  	</div>
											</div>
										</td>
										<td>
											<?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Radyo/televizyon','Fanm'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Radyo/televizyon','Fanm')*100/Query::count_prepare('sondage','Radyo/televizyon','3_mwayen_enfomasyon') ?>%;">
											    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Radyo/televizyon','Fanm')*100/Query::count_prepare('sondage','Radyo/televizyon','3_mwayen_enfomasyon'),2) ?>%
											  	</div>
											</div>
										</td>
									</tr>

									<tr>
										<td>Facebook /sit wèb</td>
										<td>
											<?=  Query::count_prepare('sondage','Facebook /sit wèb','3_mwayen_enfomasyon') ?>
										<td>
											<?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Facebook /sit wèb','Gason'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Facebook /sit wèb','Gason')*100/Query::count_prepare('sondage','Facebook /sit wèb','3_mwayen_enfomasyon') ?>%; background-color: red;">
											    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Facebook /sit wèb','Gason')*100/Query::count_prepare('sondage','Facebook /sit wèb','3_mwayen_enfomasyon'),2) ?>%
											  	</div>
											</div>
										</td>
										<td>
											<?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Facebook /sit wèb','Fanm'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Facebook /sit wèb','Fanm')*100/Query::count_prepare('sondage','Facebook /sit wèb','3_mwayen_enfomasyon') ?>%;">
											    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Facebook /sit wèb','Fanm')*100/Query::count_prepare('sondage','Facebook /sit wèb','3_mwayen_enfomasyon'),2) ?>%
											  	</div>
											</div>
										</td>
									</tr>

									<tr>
										<td>WhatsApp</td>
										<td>
											<?=  Query::count_prepare('sondage','WhatsApp','3_mwayen_enfomasyon') ?>
										<td>
											<?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','WhatsApp','Gason'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','WhatsApp','Gason')*100/Query::count_prepare('sondage','WhatsApp','3_mwayen_enfomasyon') ?>%; background-color: red;">
											    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon','1_sexe','WhatsApp','Gason')*100/Query::count_prepare('sondage','WhatsApp','3_mwayen_enfomasyon'),2) ?>%
											  	</div>
											</div>
										</td>
										<td>
											<?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','WhatsApp','Fanm'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','WhatsApp','Fanm')*100/Query::count_prepare('sondage','WhatsApp','3_mwayen_enfomasyon') ?>%;">
											    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon','1_sexe','WhatsApp','Fanm')*100/Query::count_prepare('sondage','WhatsApp','3_mwayen_enfomasyon'),2) ?>%
											  	</div>
											</div>
										</td>
									</tr>

									

									<tr>
										<td>Yon zanmi / kòlèg</td>
										<td>
											<?=  Query::count_prepare('sondage','Yon zanmi / kòlèg','3_mwayen_enfomasyon') ?>
										<td>
											<?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Yon zanmi / kòlèg','Gason'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Yon zanmi / kòlèg','Gason')*100/Query::count_prepare('sondage','Yon zanmi / kòlèg','3_mwayen_enfomasyon') ?>%; background-color: red;">
											    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Yon zanmi / kòlèg','Gason')*100/Query::count_prepare('sondage','Yon zanmi / kòlèg','3_mwayen_enfomasyon'),2) ?>%
											  	</div>
											</div>
										</td>
										<td>
											<?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Yon zanmi / kòlèg','Fanm'); ?>
											<div class="progress">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Yon zanmi / kòlèg','Fanm')*100/Query::count_prepare('sondage','Yon zanmi / kòlèg','3_mwayen_enfomasyon') ?>%;">
											    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon','1_sexe','Yon zanmi / kòlèg','Fanm')*100/Query::count_prepare('sondage','Yon zanmi / kòlèg','3_mwayen_enfomasyon'),2) ?>%
											  	</div>
											</div>
										</td>
									</tr>
									</tbody>
								</table>
							</div>


						</div>
					</div>
	    			</div>

	    			<div class="col-md-12">
	    				<p class="alert alert-warning" style="color: red;">
							<b>
								N.B. Pou kesyon ou pral reponn la yo, pa genyen bon ni move repons. Paske repons yo pral sèvi sèlman pou analiz ekip ki prepare fomasyon an.
							</b>  
			    		</p>
	    			</div>

	    			<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th colspan="5" style="text-align: center; background-color: #20b2aa; color: white;"><label  class="col-md-12"><b>4. Jiska ki pwen ou enterese nan zafè politik peyi a pou moman sa?</b> </label></th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<th>Nivo yo entèrese</th>
								<th>Kantite repons</th>
								<th>Gason</th>
								<th>Fanm</th>
							</tr>

							<tr>
								<td>Enterese anpil</td>
								<td>
									<?=  Query::count_prepare('sondage','Enterese anpil','4_enteresman') ?>
								<td>
									<?= Sondage::repartition('4_enteresman','1_sexe','Enterese anpil','Gason'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman','1_sexe','Enterese anpil','Gason')*100/Query::count_prepare('sondage','Enterese anpil','4_enteresman') ?>%; background-color: red;">
									    	<?= number_format(Sondage::repartition('4_enteresman','1_sexe','Enterese anpil','Gason')*100/Query::count_prepare('sondage','Enterese anpil','4_enteresman'),2) ?>%
									  	</div>
									</div>
								</td>
								<td>
									<?= Sondage::repartition('4_enteresman','1_sexe','Enterese anpil','Fanm'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman','1_sexe','Enterese anpil','Fanm')*100/Query::count_prepare('sondage','Enterese anpil','4_enteresman') ?>%;">
									    	<?= number_format(Sondage::repartition('4_enteresman','1_sexe','Enterese anpil','Fanm')*100/Query::count_prepare('sondage','Enterese anpil','4_enteresman'),2) ?>%
									  	</div>
									</div>
								</td>
							</tr>

							<tr>
								<td>Enterese</td>
								<td>
									<?=  Query::count_prepare('sondage','Enterese','4_enteresman') ?>
								<td>
									<?= Sondage::repartition('4_enteresman','1_sexe','Enterese','Gason'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman','1_sexe','Enterese','Gason')*100/Query::count_prepare('sondage','Enterese','4_enteresman') ?>%; background-color: red;">
									    	<?= number_format(Sondage::repartition('4_enteresman','1_sexe','Enterese','Gason')*100/Query::count_prepare('sondage','Enterese','4_enteresman'),2) ?>%
									  	</div>
									</div>
								</td>
								<td>
									<?= Sondage::repartition('4_enteresman','1_sexe','Enterese','Fanm'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman','1_sexe','Enterese','Fanm')*100/Query::count_prepare('sondage','Enterese','4_enteresman') ?>%;">
									    	<?= number_format(Sondage::repartition('4_enteresman','1_sexe','Enterese','Fanm')*100/Query::count_prepare('sondage','Enterese','4_enteresman'),2) ?>%
									  	</div>
									</div>
								</td>
							</tr>

							<tr>
								<td>Pa enterese di tou</td>
								<td>
									<?=  Query::count_prepare('sondage','Pa enterese di tou','4_enteresman') ?>
								<td>
									<?= Sondage::repartition('4_enteresman','1_sexe','Pa enterese di tou','Gason'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman','1_sexe','Pa enterese di tou','Gason')*100/Query::count_prepare('sondage','Pa enterese di tou','4_enteresman') ?>%; background-color: red;">
									    	<?= number_format(Sondage::repartition('4_enteresman','1_sexe','Pa enterese di tou','Gason')*100/Query::count_prepare('sondage','Pa enterese di tou','4_enteresman'),2) ?>%
									  	</div>
									</div>
								</td>
								<td>
									<?= Sondage::repartition('4_enteresman','1_sexe','Pa enterese di tou','Fanm'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman','1_sexe','Pa enterese di tou','Fanm')*100/Query::count_prepare('sondage','Pa enterese di tou','4_enteresman') ?>%;">
									    	<?= number_format(Sondage::repartition('4_enteresman','1_sexe','Pa enterese di tou','Fanm')*100/Query::count_prepare('sondage','Pa enterese di tou','4_enteresman'),2) ?>%
									  	</div>
									</div>
								</td>
							</tr>

							<tr>
								<td>Enterese yon tikras</td>
								<td>
									<?=  Query::count_prepare('sondage','Enterese yon tikras','4_enteresman') ?>
								<td>
									<?= Sondage::repartition('4_enteresman','1_sexe','Enterese yon tikras','Gason'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman','1_sexe','Enterese yon tikras','Gason')*100/Query::count_prepare('sondage','Enterese yon tikras','4_enteresman') ?>%; background-color: red;">
									    	<?= number_format(Sondage::repartition('4_enteresman','1_sexe','Enterese yon tikras','Gason')*100/Query::count_prepare('sondage','Enterese yon tikras','4_enteresman') ,2) ?>%
									  	</div>
									</div>
								</td>
								<td>
									<?= Sondage::repartition('4_enteresman','1_sexe','Enterese yon tikras','Fanm'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman','1_sexe','Enterese yon tikras','Fanm')*100/Query::count_prepare('sondage','Enterese yon tikras','4_enteresman') ?>%;">
									    	<?= number_format(Sondage::repartition('4_enteresman','1_sexe','Enterese yon tikras','Fanm')*100/Query::count_prepare('sondage','Enterese yon tikras','4_enteresman'),2) ?>%
									  	</div>
									</div>
								</td>
							</tr>
							</tbody>
						</table>
					</div>


					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th colspan="5" style="text-align: center; background-color: #20b2aa; color: white;"><label  class="col-md-12"><b>5. Si tout kondisyon te reyini jodia pou peyi a òganize eleksyon pou Senatè ak Depite, èske w t ap deside al vote?</b> </label></th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<th>Nivo desizyon yo</th>
								<th>Kantite repons</th>
								<th>Gason</th>
								<th>Fanm</th>
							</tr>

							<tr>
								<td>Wi</td>
								<td>
									<?=  Query::count_prepare('sondage','Wi','5_kondisyon') ?>
								<td>
									<?= Sondage::repartition('5_kondisyon','1_sexe','Wi','Gason'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_kondisyon','1_sexe','Wi','Gason')*100/Query::count_prepare('sondage','Wi','5_kondisyon') ?>%; background-color: red;">
									    	<?= number_format(Sondage::repartition('5_kondisyon','1_sexe','Wi','Gason')*100/Query::count_prepare('sondage','Wi','5_kondisyon'),2) ?>%
									  	</div>
									</div>
								</td>
								<td>
									<?= Sondage::repartition('5_kondisyon','1_sexe','Wi','Fanm'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_kondisyon','1_sexe','Wi','Fanm')*100/Query::count_prepare('sondage','Wi','5_kondisyon') ?>%;">
									    	<?= number_format(Sondage::repartition('5_kondisyon','1_sexe','Wi','Fanm')*100/Query::count_prepare('sondage','Wi','5_kondisyon'),2) ?>%
									  	</div>
									</div>
								</td>
							</tr>

							<tr>
								<td>Non</td>
								<td>
									<?=  Query::count_prepare('sondage','Non','5_kondisyon') ?>
								<td>
									<?= Sondage::repartition('5_kondisyon','1_sexe','Non','Gason'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_kondisyon','1_sexe','Non','Gason')*100/Query::count_prepare('sondage','Non','5_kondisyon') ?>%; background-color: red;">
									    	<?= number_format(Sondage::repartition('5_kondisyon','1_sexe','Non','Gason')*100/Query::count_prepare('sondage','Non','5_kondisyon'),2) ?>%
									  	</div>
									</div>
								</td>
								<td>
									<?= Sondage::repartition('5_kondisyon','1_sexe','Non','Fanm'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_kondisyon','1_sexe','Non','Fanm')*100/Query::count_prepare('sondage','Non','5_kondisyon') ?>%;">
									    	<?= number_format(Sondage::repartition('5_kondisyon','1_sexe','Non','Fanm')*100/Query::count_prepare('sondage','Non','5_kondisyon'),2) ?>%
									  	</div>
									</div>
								</td>
							</tr>

							</tbody>
						</table>
					</div>


						<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th colspan="5" style="text-align: center; background-color: #20b2aa; color: white;"><label  class="col-md-12"><b>5.1. Si repons ou se « non », ki rezon pèsonèl ki fè ou pa t ap al vote? (chwazi sèlman yon repons).</b> </label></th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<th>Rezon yo</th>
								<th>Kantite repons</th>
								<th>Gason</th>
								<th>Fanm</th>
							</tr>

							<tr>
								<td>Mwen pa enterese/ Mwen pa kwè nan eleksyon</td>
								<td>
									<?=  Query::count_prepare('sondage','Mwen pa enterese/ Mwen pa kwè nan eleksyon','5_1_repons_vote') ?>
								<td>
									<?= Sondage::repartition('5_1_repons_vote','1_sexe','Mwen pa enterese/ Mwen pa kwè nan eleksyon','Gason'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_1_repons_vote','1_sexe','Mwen pa enterese/ Mwen pa kwè nan eleksyon','Gason')*100/Query::count_prepare('sondage','Mwen pa enterese/ Mwen pa kwè nan eleksyon','5_1_repons_vote') ?>%; background-color: red;">
									    	<?= number_format(Sondage::repartition('5_1_repons_vote','1_sexe','Mwen pa enterese/ Mwen pa kwè nan eleksyon','Gason')*100/Query::count_prepare('sondage','Mwen pa enterese/ Mwen pa kwè nan eleksyon','5_1_repons_vote'),2) ?>%
									  	</div>
									</div>
								</td>
								<td>
									<?= Sondage::repartition('5_1_repons_vote','1_sexe','Mwen pa enterese/ Mwen pa kwè nan eleksyon','Fanm'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_1_repons_vote','1_sexe','Mwen pa enterese/ Mwen pa kwè nan eleksyon','Fanm')*100/Query::count_prepare('sondage','Mwen pa enterese/ Mwen pa kwè nan eleksyon','5_1_repons_vote') ?>%;">
									    	<?= number_format(Sondage::repartition('5_1_repons_vote','1_sexe','Mwen pa enterese/ Mwen pa kwè nan eleksyon','Fanm')*100/Query::count_prepare('sondage','Mwen pa enterese/ Mwen pa kwè nan eleksyon','5_1_repons_vote'),2) ?>%
									  	</div>
									</div>
								</td>
							</tr>

							<tr>
								<td>Senatè ak Depite yo pa itil anyen</td>
								<td>
									<?=  Query::count_prepare('sondage','Senatè ak Depite yo pa itil anyen','5_1_repons_vote') ?>
								<td>
									<?= Sondage::repartition('5_1_repons_vote','1_sexe','Senatè ak Depite yo pa itil anyen','Gason'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_1_repons_vote','1_sexe','Senatè ak Depite yo pa itil anyen','Gason')*100/Query::count_prepare('sondage','Senatè ak Depite yo pa itil anyen','5_1_repons_vote') ?>%; background-color: red;">
									    	<?= number_format(Sondage::repartition('5_1_repons_vote','1_sexe','Senatè ak Depite yo pa itil anyen','Gason')*100/Query::count_prepare('sondage','Senatè ak Depite yo pa itil anyen','5_1_repons_vote'),2) ?>%
									  	</div>
									</div>
								</td>
								<td>
									<?= Sondage::repartition('5_1_repons_vote','1_sexe','Senatè ak Depite yo pa itil anyenn','Fanm'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_1_repons_vote','1_sexe','Senatè ak Depite yo pa itil anyen','Fanm')*100/Query::count_prepare('sondage','Senatè ak Depite yo pa itil anyen','5_1_repons_vote') ?>%;">
									    	<?= number_format(Sondage::repartition('5_1_repons_vote','1_sexe','Senatè ak Depite yo pa itil anyen','Fanm')*100/Query::count_prepare('sondage','Senatè ak Depite yo pa itil anyen','5_1_repons_vote'),2) ?>%
									  	</div>
									</div>
								</td>
							</tr>

							

							<tr>
								<td>Mwen pa kwè vòt mwen an ap konte</td>
								<td>
									<?=  Query::count_prepare('sondage','Mwen pa kwè vòt mwen an ap konte','5_1_repons_vote') ?>
								<td>
									<?= Sondage::repartition('5_1_repons_vote','1_sexe','Mwen pa kwè vòt mwen an ap konte','Gason'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_1_repons_vote','1_sexe','Mwen pa kwè vòt mwen an ap konte','Gason')*100/Query::count_prepare('sondage','Mwen pa kwè vòt mwen an ap konte','5_1_repons_vote') ?>%; background-color: red;">
									    	<?= number_format(Sondage::repartition('5_1_repons_vote','1_sexe','Mwen pa kwè vòt mwen an ap konte','Gason')*100/Query::count_prepare('sondage','Mwen pa kwè vòt mwen an ap konte','5_1_repons_vote'),2) ?>%
									  	</div>
									</div>
								</td>
								<td>
									<?= Sondage::repartition('5_1_repons_vote','1_sexe','Mwen pa kwè vòt mwen an ap konte','Fanm'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_1_repons_vote','1_sexe','Mwen pa kwè vòt mwen an ap konte','Fanm')*100/Query::count_prepare('sondage','Mwen pa kwè vòt mwen an ap konte','5_1_repons_vote') ?>%;">
									    	<?= number_format(Sondage::repartition('5_1_repons_vote','1_sexe','Mwen pa kwè vòt mwen an ap konte','Fanm')*100/Query::count_prepare('sondage','Mwen pa kwè vòt mwen an ap konte','5_1_repons_vote'),2) ?>%
									  	</div>
									</div>
								</td>
							</tr>

							<tr>
								<td><a href="" data-toggle="modal" data-target=".bs-example-modal-lg">Lòt rezon <i class="fa fa-eye"></i> </a></td>
								<td>
									<?=  Query::count_prepare('sondage','Lòt rezon','5_1_repons_vote') ?>
								<td>
									<?= Sondage::repartition('5_1_repons_vote','1_sexe','Lòt rezon','Gason'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_1_repons_vote','1_sexe','Lòt rezon','Gason')*100/Query::count_prepare('sondage','Lòt rezon','5_1_repons_vote') ?>%; background-color: red;">
									    	<?= number_format(Sondage::repartition('5_1_repons_vote','1_sexe','Lòt rezon','Gason')*100/Query::count_prepare('sondage','Lòt rezon','5_1_repons_vote'),2) ?>%
									  	</div>
									</div>
								</td>
								<td>
									<?= Sondage::repartition('5_1_repons_vote','1_sexe','Lòt rezon','Fanm'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_1_repons_vote','1_sexe','Lòt rezon','Fanm')*100/Query::count_prepare('sondage','Lòt rezon','5_1_repons_vote') ?>%;">
									    	<?= number_format(Sondage::repartition('5_1_repons_vote','1_sexe','Lòt rezon','Fanm')*100/Query::count_prepare('sondage','Lòt rezon','5_1_repons_vote'),2) ?>%
									  	</div>
									</div>
								</td>
							</tr>

							</tbody>
						</table>
					</div>

					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th colspan="5" style="text-align: center; background-color: #20b2aa; color: white;"><label  class="col-md-12"><b>6. Ki lòt sitiyasyon ki ta fè ou pa t ap al vote, menmsi tout kondisyon te reyini jodia pou peyi a òganize eleksyon pou Senatè ak Depite (Chwazi sèlman yon repons).</b> </label></th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<th>Kondisyon yo</th>
								<th>Kantite repons</th>
								<th>Gason</th>
								<th>Fanm</th>
							</tr>

							<tr>
								<td>Mwen pa enterese/ Mwen pa kwè nan eleksyon</td>
								<td>
									<?=  Query::count_prepare('sondage','Mwen pa gen kat elektoral','6_stiyasyon') ?>
								<td>
									<?= Sondage::repartition('6_stiyasyon','1_sexe','Mwen pa gen kat elektoral','Gason'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('6_stiyasyon','1_sexe','Mwen pa gen kat elektoral','Gason')*100/Query::count_prepare('sondage','Mwen pa gen kat elektoral','6_stiyasyon') ?>%; background-color: red;">
									    	<?= number_format(Sondage::repartition('6_stiyasyon','1_sexe','Mwen pa gen kat elektoral','Gason')*100/Query::count_prepare('sondage','Mwen pa gen kat elektoral','6_stiyasyon'),2) ?>%
									  	</div>
									</div>
								</td>
								<td>
									<?= Sondage::repartition('6_stiyasyon','1_sexe','Mwen pa gen kat elektoral','Fanm'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('6_stiyasyon','1_sexe','Mwen pa gen kat elektoral','Fanm')*100/Query::count_prepare('sondage','Mwen pa gen kat elektoral','6_stiyasyon') ?>%;">
									    	<?= number_format(Sondage::repartition('6_stiyasyon','1_sexe','Mwen pa gen kat elektoral','Fanm')*100/Query::count_prepare('sondage','Mwen pa gen kat elektoral','6_stiyasyon'),2) ?>%
									  	</div>
									</div>
								</td>
							</tr>


							<tr>
								<td>Akoz voylans/ Ensekirite</td>
								<td>
									<?=  Query::count_prepare('sondage','Akoz voylans/ Ensekirite','6_stiyasyon') ?>
								<td>
									<?= Sondage::repartition('6_stiyasyon','1_sexe','Akoz voylans/ Ensekirite','Gason'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('6_stiyasyon','1_sexe','Akoz voylans/ Ensekirite','Gason')*100/Query::count_prepare('sondage','Akoz voylans/ Ensekirite','6_stiyasyon') ?>%; background-color: red;">
									    	<?= number_format(Sondage::repartition('6_stiyasyon','1_sexe','Akoz voylans/ Ensekirite','Gason')*100/Query::count_prepare('sondage','Akoz voylans/ Ensekirite','6_stiyasyon'),2) ?>%
									  	</div>
									</div>
								</td>
								<td>
									<?= Sondage::repartition('6_stiyasyon','1_sexe','Akoz voylans/ Ensekirite','Fanm'); ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('6_stiyasyon','1_sexe','Akoz voylans/ Ensekirite','Fanm')*100/Query::count_prepare('sondage','Mwen pa gen kat elektoral','6_stiyasyon') ?>%;">
									    	<?= number_format(Sondage::repartition('6_stiyasyon','1_sexe','Akoz voylans/ Ensekirite','Fanm')*100/Query::count_prepare('sondage','Akoz voylans/ Ensekirite','6_stiyasyon'),2) ?>%
									  	</div>
									</div>
								</td>
							</tr>

							<tr>
							<td>Pa gen akò politik ant aktè yo</td>
							<td>
								<?=  Query::count_prepare('sondage','Pa gen akò politik ant aktè yo','6_stiyasyon') ?>
							<td>
								<?= Sondage::repartition('6_stiyasyon','1_sexe','Pa gen akò politik ant aktè yo','Gason'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('6_stiyasyon','1_sexe','Pa gen akò politik ant aktè yo','Gason')*100/Query::count_prepare('sondage','Pa gen akò politik ant aktè yo','6_stiyasyon') ?>%; background-color: red;">
								    	<?= number_format(Sondage::repartition('6_stiyasyon','1_sexe','Pa gen akò politik ant aktè yo','Gason')*100/Query::count_prepare('sondage','Pa gen akò politik ant aktè yo','6_stiyasyon'),2) ?>%
								  	</div>
								</div>
							</td>
							<td>
								<?= Sondage::repartition('6_stiyasyon','1_sexe','Pa gen akò politik ant aktè yo','Fanm'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('6_stiyasyon','1_sexe','Pa gen akò politik ant aktè yo','Fanm')*100/Query::count_prepare('sondage','Pa gen akò politik ant aktè yo','6_stiyasyon') ?>%;">
								    	<?= number_format(Sondage::repartition('6_stiyasyon','1_sexe','Pa gen akò politik ant aktè yo','Fanm')*100/Query::count_prepare('sondage','Pa gen akò politik ant aktè yo','6_stiyasyon'),2) ?>%
								  	</div>
								</div>
							</td>
						</tr>

							<tr>
							<td><a href="" data-toggle="modal" data-target=".bs-example-modal-lg1">Lòt rezon <i class="fa fa-eye"></i> </a></td>
							<td>
								<?=  Query::count_prepare('sondage','Lòt rezon','6_stiyasyon') ?>
							<td>
								<?= Sondage::repartition('6_stiyasyon','1_sexe','Lòt rezon','Gason'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('6_stiyasyon','1_sexe','Lòt rezon','Gason')*100/Query::count_prepare('sondage','Lòt rezon','6_stiyasyon') ?>%; background-color: red;">
								    	<?= number_format(Sondage::repartition('6_stiyasyon','1_sexe','Lòt rezon','Gason')*100/Query::count_prepare('sondage','Lòt rezon','6_stiyasyon'),2) ?>%
								  	</div>
								</div>
							</td>
							<td>
								<?= Sondage::repartition('6_stiyasyon','1_sexe','Lòt rezon','Fanm'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('6_stiyasyon','1_sexe','Lòt rezon','Fanm')*100/Query::count_prepare('sondage','Lòt rezon','6_stiyasyon') ?>%;">
								    	<?= number_format(Sondage::repartition('6_stiyasyon','1_sexe','Lòt rezon','Fanm')*100/Query::count_prepare('sondage','Lòt rezon','6_stiyasyon'),2) ?>%
								  	</div>
								</div>
							</td>
						</tr>

							</tbody>
						</table>
					</div>
				<!-- END: ORDER FORM -->


				<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content c-square">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
								<h4 class="modal-title" id="myLargeModalLabel">Lòt rezon yo</h4>
							</div>
							<div class="modal-body">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th style="text-align: center; background-color: #20b2aa; color: white;"><label  class="col-md-12"><b>Si repons ou se « non », ki rezon pèsonèl ki fè ou pa t ap al vote? (chwazi sèlman yon repons).</b> </label></th>
									</tr>
									</thead>
									<tbody>
									
									<?php foreach (Query::liste_prepare('sondage','Lòt rezon','5_1_repons_vote') as $question_5):?>
										<tr>
											<td><?= $question_5->rezon_5_1 ?></td>
										</tr>
									<?php endforeach; ?>
									

								
									</tbody>
								</table>
							</div>
							<div class="modal-footer">								
								<button type="button" class="btn c-btn-dark c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Fermer</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>


				<div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content c-square">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
								<h4 class="modal-title" id="myLargeModalLabel">Lòt rezon yo</h4>
							</div>
							<div class="modal-body">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th style="text-align: center; background-color: #20b2aa; color: white;"><label  class="col-md-12"><b>Ki lòt sitiyasyon ki ta fè ou pa t ap al vote, menmsi tout kondisyon te reyini jodia pou peyi a òganize eleksyon pou Senatè ak Depite</b> </label></th>
									</tr>
									</thead>
									<tbody>
									<?php foreach (Query::liste_prepare('sondage','Lòt rezon','6_stiyasyon') as $question_6):?>
										<tr>
											<td><?= $question_6->rezon_6 ?></td>
										</tr>
									<?php endforeach; ?>

								
									</tbody>
								</table>
							</div>
							<div class="modal-footer">								
								<button type="button" class="btn c-btn-dark c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Fermer</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>




			</div>
	</div>
</div>




<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>

<script type="text/javascript">
	
</script>

</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
