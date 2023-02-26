<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Sondage.php'); ?>
<!DOCTYPE html>
<html lang="en"    >
<?php 
// selectionner la formation
$formation = Query::affiche('formation', $url[1], 'id');
if (!$formation) {
	Fonctions::set_flash("Cette formation n'existe pas", 'warning');
	echo "<script>window.location ='$link_menu/formations';</script>";
}
?>
<title>Resultat du sondage</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <?php include('font-end/layout/header.php'); ?>
    <?php include('font-end/layout/logo_and_search.php'); ?>
    <?php include('font-end/layout/menu.php'); ?>
    <?php include('font-end/layout/user_bar.php'); ?>
</header>
<div class="c-layout-page">
<?php include('font-end/layout/banner.php'); ?>
<div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style=" background-color: #26a8b4; background-image: url(<?= $link ?>/asskets/base/img/layout/banner.jpg); ">
	<div class="container">
		<div class="c-page-title c-pull-left">
			<h3 class="c-font-uppercase c-font-bold c-font-white c-font-29 c-font-slim" style="line-height: 35px; font-size: 25px;"><?= $formation->titre ?></h3>
			<h3 class=" c-font-tlhin" style="color: yellow;">Résultat du questionnaire d'introduction</h3>
		</div>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
</div>


<div class="container">

	<div class="c-content-title-2" style="margin-top: 20px;">
		<h3 class="c-center c-font-dark c-font-uppercase"><b>sondage</b></h3>
		<p class="c-center"></p>
	</div>	

	<div class="c-content-panel">
			<div class="c-label">Liste des questions</div>
			<div class="c-body">
				<div class="c-content-ver-nav">
					<div class="row">
						<div class="col-md-12">
							<div class="c-content-ver-nav">
								<ul class="c-menu">
									<li>
									<a href="<?= $link_menu ?>/resultat-sondage/<?= $url[1] ?>/enfomasyon-jeneral"><b>1. Enfomasyon jeneral</b>
									</a>
									<a href="<?= $link_menu ?>/resultat-sondage/<?= $url[1] ?>/enfomasyon-jeneral">
									Voir les résultats </a>
									</li>
									
									<li>
									<a href="<?= $link_menu ?>/resultat-sondage/<?= $url[1] ?>/question-3"><b>2. Pa ki mwayen ou te enfòme de fòmasyon an</b>
									</a>
									<a href="<?= $link_menu ?>/resultat-sondage/<?= $url[1] ?>/question-3">
									Voir les résultats </a>
									</li>
									<li>
									<a href="<?= $link_menu ?>/resultat-sondage/<?= $url[1] ?>/question-4"><b>3. Jiska ki pwen ou enterese nan zafè politik peyi a pou moman sa?</b></a>
									<a href="<?= $link_menu ?>/resultat-sondage/<?= $url[1] ?>/question-4">
									Voir les résultats </a>
									</li>
									<li>
									<a href="<?= $link_menu ?>/resultat-sondage/<?= $url[1] ?>/question-5"><b>4. Si tout kondisyon te reyini jodia pou peyi a òganize eleksyon pou Senatè ak Depite, èske w t ap deside al vote?</b></a>
									<a href="<?= $link_menu ?>/resultat-sondage/<?= $url[1] ?>/question-5">
									Voir les résultats </a>
									</li>
									<li><a href="<?= $link_menu ?>/resultat-sondage/<?= $url[1] ?>/question-6"><b>5. Si repons ou se « non », ki rezon pèsonèl ki fè ou pa t ap al vote?</b></a>
									<a href="<?= $link_menu ?>/resultat-sondage/<?= $url[1] ?>/question-6">
									Voir les résultats </a>
									</li>
									<li><a href="<?= $link_menu ?>/resultat-sondage/<?= $url[1] ?>/question-7"><b>6. Ki lòt sitiyasyon ki ta fè ou pa t ap al vote, menmsi tout kondisyon te reyini jodia pou peyi a òganize eleksyon pou Senatè ak Depite</b></a>
									<a href="<?= $link_menu ?>/resultat-sondage/<?= $url[1] ?>/question-7">
									Voir les résultats </a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php if (isset($url[2]) and $url[2] == 'enfomasyon-jeneral') : ?>

			<div class="row">
				<div class="col-md-12">
					<div class="c-content-title-2">
						<h3 class="c-center"><b>Enfomasyon jeneral</b></h3>
						<div class="c-line c-theme-bg c-theme-bg-after"></div>
					</div>	
				</div>
			</div>

				<div class="col-md-12">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th colspan="5" style="text-align: center; background-color: #20b2aa; color: white; font-size: 18px;"><label  class="col-md-12"><b></b> </label></th>
							</tr>
						</thead>
						<tbody>
							<tr style="font-weight: bold; font-size: 18px;">
								<th>Kantite moun ki ranpli fòmilè a</th>
								<th>Gason</th>
								<th>Fanm</th>
							</tr>

							<tr style="font-size: 18px;">
								<td><?= Query::count_query('sondage'); ?></td>
								<td>
									<?php $kesyon_1 = number_format(Query::count_prepare('sondage', 'Gason', '1_sexe') * 100 / Query::count_query('sondage'), 2) ?>
									<?= $total = Query::count_prepare('sondage', 'Gason', '1_sexe') ?>
									<div class="progress vertical">
									  	<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= $kesyon_1 ?>%; background-color: #da0f08;">
									    	<?= $kesyon_1 ?>%
									  	</div>
									</div>
								<td>
									<?php $kesyon_1_1 = number_format(Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100 / Query::count_query('sondage'), 2) ?>
									<?= Query::count_prepare('sondage', 'Fanm', '1_sexe') ?>
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= $kesyon_1_1 ?>%; background-color: #f5c20d;">
									    	<?= $kesyon_1_1 ?>%
									  	</div>
									</div>
								</td>
							</tr>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

			<div class="col-md-12" style="margin-bottom: 15px;">
				<h2><b>Tableau de répresentation par département</b></h2>

				<table class="table table-bordered table-striped">
					<thead style="font-weight: bold; font-size: 18px; background-color: #c4f4f2;">
						<tr>
							<th>Département</th>
							<th>Personne</th>
							<th>Pourcentage</th>
							<th>Homme</th>
							<th>Femme</th>
							<th>% Homme</th>
							<th>% Femme</th>

							
						</tr>
					</thead>

					<tbody style="font-weight: normal;">

						<tr>
						<td>Nord</td>
						<td><?= Sondage::percent('departement', 'Nord') ?></td>
						<td><?= number_format(Sondage::percent('departement', 'Nord') * 100 / Query::count_query('sondage'), 2) ?>%</td>

						<td><?= Sondage::total_repar('departement', 'Nord', '1_sexe', 'Gason') ?></td>

						<td><?= Sondage::total_repar('departement', 'Nord', '1_sexe', 'Fanm') ?></td>

						<td><?= number_format(Sondage::total_repar('departement', 'Nord', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>%</td>

						<td><?= number_format(Sondage::total_repar('departement', 'Nord', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>%</td>
		
						</tr>

						<tr>
							<td>Nord-Est</td>
							<td><?= Sondage::percent('departement', 'Nord-Est') ?></td>

							<td><?= number_format(Sondage::percent('departement', 'Nord-Est') * 100 / Query::count_query('sondage'), 2) ?>%</td>

							<td><?= Sondage::total_repar('departement', 'Nord-Est', '1_sexe', 'Gason') ?></td>

						    <td><?= Sondage::total_repar('departement', 'Nord-Est', '1_sexe', 'Fanm') ?></td>

						    <td><?= number_format(Sondage::total_repar('departement', 'Nord-Est', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>%</td>

							<td><?= number_format(Sondage::total_repar('departement', 'Nord-Est', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>%</td>

							
						</tr>

						<tr>
							<td>Nord-Ouest</td>
							<td><?= Sondage::percent('departement', 'Nord-Ouest') ?></td>

							<td><?= number_format(Sondage::percent('departement', 'Nord-Ouest') * 100 / Query::count_query('sondage'), 2) ?>%</td>

							<td><?= Sondage::total_repar('departement', 'Nord-Ouest', '1_sexe', 'Gason') ?></td>

						    <td><?= Sondage::total_repar('departement', 'Nord-Ouest', '1_sexe', 'Fanm') ?></td>

						    <td><?= number_format(Sondage::total_repar('departement', 'Nord-Ouest', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>%</td>

							<td><?= number_format(Sondage::total_repar('departement', 'Nord-Ouest', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>%</td>
							
						</tr>

						<tr>
							<td>Sud</td>
							<td><?= Sondage::percent('departement', 'Sud') ?></td>
							<td><?= number_format(Sondage::percent('departement', 'Sud') * 100 / Query::count_query('sondage'), 2) ?>%</td>
							<td><?= Sondage::total_repar('departement', 'Sud', '1_sexe', 'Gason') ?></td>
						    <td><?= Sondage::total_repar('departement', 'Sud', '1_sexe', 'Fanm') ?></td>
						    <td><?= number_format(Sondage::total_repar('departement', 'Sud', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>%</td>
							<td><?= number_format(Sondage::total_repar('departement', 'Sud', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>%</td>
							
						</tr>

						<tr>
							<td>Sud-Est</td>
							<td><?= Sondage::percent('departement', 'Sud-Est') ?></td>
							<td><?= number_format(Sondage::percent('departement', 'Sud-Est') * 100 / Query::count_query('sondage'), 2) ?>%</td>
							<td><?= Sondage::total_repar('departement', 'Sud-Est', '1_sexe', 'Gason') ?></td>
						    <td><?= Sondage::total_repar('departement', 'Sud-Est', '1_sexe', 'Fanm') ?></td>
						    <td><?= number_format(Sondage::total_repar('departement', 'Sud-Est', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>%</td>
							<td><?= number_format(Sondage::total_repar('departement', 'Sud-Est', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>%</td>
							
						</tr>

						<tr>
							<td>Ouest</td>
							<td><?= Sondage::percent('departement', 'Ouest') ?></td>
							<td><?= number_format(Sondage::percent('departement', 'Ouest') * 100 / Query::count_query('sondage'), 2) ?>%</td>
							<td><?= Sondage::total_repar('departement', 'Ouest', '1_sexe', 'Gason') ?></td>
						    <td><?= Sondage::total_repar('departement', 'Ouest', '1_sexe', 'Fanm') ?></td>
						    <td><?= number_format(Sondage::total_repar('departement', 'Ouest', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>%</td>
							<td><?= number_format(Sondage::total_repar('departement', 'Ouest', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>%</td>
							
						</tr>

						<tr>
							<td>Centre</td>
							<td><?= Sondage::percent('departement', 'Centre') ?></td>
							<td><?= number_format(Sondage::percent('departement', 'Centre') * 100 / Query::count_query('sondage'), 2) ?>%</td>
							<td><?= Sondage::total_repar('departement', 'Centre', '1_sexe', 'Gason') ?></td>
						    <td><?= Sondage::total_repar('departement', 'Centre', '1_sexe', 'Fanm') ?></td>
						    <td><?= number_format(Sondage::total_repar('departement', 'Centre', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>%</td>
							<td><?= number_format(Sondage::total_repar('departement', 'Centre', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>%</td>
							
						</tr>

						<tr>
							<td>Artibonite</td>
							<td><?= Sondage::percent('departement', 'Artibonite') ?></td>
							<td><?= number_format(Sondage::percent('departement', 'Artibonite') * 100 / Query::count_query('sondage'), 2) ?>%</td>
							<td><?= Sondage::total_repar('departement', 'Artibonite', '1_sexe', 'Gason') ?></td>
						    <td><?= Sondage::total_repar('departement', 'Artibonite', '1_sexe', 'Fanm') ?></td>
						    <td><?= number_format(Sondage::total_repar('departement', 'Artibonite', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>%</td>
							<td><?= number_format(Sondage::total_repar('departement', 'Artibonite', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>%</td>
							
						</tr>

						<tr>
							<td>Nippes</td>
							<td><?= Sondage::percent('departement', 'Nippes') ?></td>
							<td><?= number_format(Sondage::percent('departement', 'Nippes') * 100 / Query::count_query('sondage'), 2) ?>%</td>
							<td><?= Sondage::total_repar('departement', 'Nippes', '1_sexe', 'Gason') ?></td>
						    <td><?= Sondage::total_repar('departement', 'Nippes', '1_sexe', 'Fanm') ?></td>
						    <td><?= number_format(Sondage::total_repar('departement', 'Nippes', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>%</td>
							<td><?= number_format(Sondage::total_repar('departement', 'Nippes', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>%</td>
							
						</tr>

						<tr>
							<td>Grand-Anse</td>
							<td><?= Sondage::percent('departement', 'Grand-Anse') ?></td>
							<td><?= number_format(Sondage::percent('departement', 'Grand-Anse') * 100 / Query::count_query('sondage'), 2) ?>%</td>
							<td><?= Sondage::total_repar('departement', 'Grand-Anse', '1_sexe', 'Gason') ?></td>
						    <td><?= Sondage::total_repar('departement', 'Grand-Anse', '1_sexe', 'Fanm') ?></td>
						    <td><?= number_format(Sondage::total_repar('departement', 'Grand-Anse', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>%</td>
							<td><?= number_format(Sondage::total_repar('departement', 'Grand-Anse', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>%</td>
							
						</tr>
						<tr>
							<td ><b>Total</b></td>
							<td ><?= Query::count_query('sondage') ?></td>
							<td><?= number_format(Query::count_query('sondage') * 100 / Query::count_query('sondage'), 2) ?>%</td>
							<td><?= Query::count_prepare('sondage', 'Gason', '1_sexe') ?></td>
							<td><?= Query::count_prepare('sondage', 'Fanm', '1_sexe') ?></td>
							<td><?= number_format(Query::count_prepare('sondage', 'Gason', '1_sexe') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>%</td>
							<td><?= number_format(Query::count_prepare('sondage', 'Fanm', '1_sexe') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>%</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col-md-12">
				<h2><b>Tableau de répresentation par groupe d'age</b></h2>
				<table class="table table-bordered table-striped">
					<thead style="font-weight: bold; font-size: 18px; background-color: #c4f4f2;">
						<tr>
							<th>Groupe d'age</th>
							<th>Personne</th>
							<th>Pourcentage</th>
							<th>Homme</th>
							<th>Femme</th>
							<th>% Homme</th>
							<th>% Femme</th>
						</tr>
					</thead>

					<tbody style="font-weight: normal;">

						<tr>
							<td>18 – 24 lane</td>
						
							<td><?= Sondage::percent('2_group_laj', '18 – 24 lane') ?></td>
							<td><?= number_format(Sondage::percent('2_group_laj', '18 – 24 lane') / Query::count_query('sondage') * 100, 2) ?>%</td>

							<td><?= Sondage::total_repar('2_group_laj', '18 – 24 lane', '1_sexe', 'Gason') ?></td>
						    <td><?= Sondage::total_repar('2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm') ?></td>

						    <td><?= number_format(Sondage::total_repar('2_group_laj', '18 – 24 lane', '1_sexe', 'Gason') / Sondage::percent('1_sexe', 'Gason') * 100, 2) ?>%</td>
							<td><?= number_format(Sondage::total_repar('2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm') / Sondage::percent('1_sexe', 'Fanm') * 100, 2) ?>%</td>

						</tr>

						<tr>
							<td>25 – 30 lane</td>
							<td><?= Sondage::percent('2_group_laj', '25 – 30 lane') ?></td>
							<td><?= number_format(Sondage::percent('2_group_laj', '25 – 30 lane') / Query::count_query('sondage') * 100, 2) ?>%</td>

							<td><?= Sondage::total_repar('2_group_laj', '25 – 30 lane', '1_sexe', 'Gason') ?></td>
						    <td><?= Sondage::total_repar('2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm') ?></td>
						    <td><?= number_format(Sondage::total_repar('2_group_laj', '25 – 30 lane', '1_sexe', 'Gason') / Sondage::percent('1_sexe', 'Gason') * 100, 2) ?>%</td>
							<td><?= number_format(Sondage::total_repar('2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm') / Sondage::percent('1_sexe', 'Fanm') * 100, 2) ?>%</td>
						</tr>

						<tr>
							<td>31 – 35 lane</td>
							<td><?= Sondage::percent('2_group_laj', '31 – 35 lane') ?></td>
							<td><?= number_format(Sondage::percent('2_group_laj', '31 – 35 lane') / Query::count_query('sondage') * 100, 2) ?>%</td>

							<td><?= Sondage::total_repar('2_group_laj', '31 – 35 lane', '1_sexe', 'Gason') ?></td>
						    <td><?= Sondage::total_repar('2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm') ?></td>
						    <td><?= number_format(Sondage::total_repar('2_group_laj', '31 – 35 lane', '1_sexe', 'Gason') / Sondage::percent('1_sexe', 'Gason') * 100, 2) ?>%</td>
							<td><?= number_format(Sondage::total_repar('2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm') / Sondage::percent('1_sexe', 'Fanm') * 100, 2) ?>%</td>
						</tr>

						<tr>
							<td>36 oswa plis</td>
							<td><?= Sondage::percent('2_group_laj', '36 oswa plis') ?></td>
							<td><?= number_format(Sondage::percent('2_group_laj', '36 oswa plis') / Query::count_query('sondage') * 100, 2) ?>%</td>

							<td><?= Sondage::total_repar('2_group_laj', '36 oswa plis', '1_sexe', 'Gason') ?></td>
						    <td><?= Sondage::total_repar('2_group_laj', '36 oswa plis', '1_sexe', 'Fanm') ?></td>
						    <td><?= number_format(Sondage::total_repar('2_group_laj', '36 oswa plis', '1_sexe', 'Gason') / Sondage::percent('1_sexe', 'Gason') * 100, 2) ?>%</td>
							<td><?= number_format(Sondage::total_repar('2_group_laj', '36 oswa plis', '1_sexe', 'Fanm') / Sondage::percent('1_sexe', 'Fanm') * 100, 2) ?>%</td>
						</tr>


						<tr>
							<td ><b>Total</b></td>
							<td ><?= Query::count_query('sondage') ?></td>

							<td><?= number_format(Query::count_query('sondage') * 100 / Query::count_query('sondage'), 2) ?>%</td>

							<td><?= Sondage::percent('1_sexe', 'Gason') ?></td>
							<td><?= Sondage::percent('1_sexe', 'Fanm') ?></td>
							<td><?= number_format(Sondage::percent('1_sexe', 'Gason') / Sondage::percent('1_sexe', 'Gason') * 100, 2) ?>%</td>
							<td><?= number_format(Sondage::percent('1_sexe', 'Fanm') / Sondage::percent('1_sexe', 'Fanm') * 100, 2) ?>%</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col-md-12" style="margin-bottom: 15px;" >
				<h2><b>Répartition des enquetés par département</b></h2>
				<p>
					<i class="fa fa-square" style="color:#da0f08; "></i>  Gason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-square" style="color:#f5c20d; "></i>  Fanm
				</p>
				<canvas id="income" style="width: 100%; height: 275px;"></canvas>
			        <script>
			            // line chart data
			          
			            var barData = {
			                labels : ["Nord","Nord-Est","Nord-Ouest","Sud","Sud-Est","Ouest","Centre","Artibonite","Nippes","Grand-Anse"],
			                datasets : [
			                    {
			                        fillColor : "#da0f08",
			                        strokeColor : "#da0f08",
			                        data : [<?= number_format(Sondage::total_repar('departement', 'Nord', '1_sexe', 'Gason') * 100 / Query::count_prepare('sondage', 'Gason', '1_sexe'), 2) ?>,


			                        <?= number_format(Sondage::total_repar('departement', 'Nord-Est', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>,


			                        <?= number_format(Sondage::total_repar('departement', 'Nord-Ouest', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>,

			                        <?= number_format(Sondage::total_repar('departement', 'Sud', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>,

			                        <?= number_format(Sondage::total_repar('departement', 'Sud-Est', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>,

			                        <?= number_format(Sondage::total_repar('departement', 'Ouest', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>,

			                        <?= number_format(Sondage::total_repar('departement', 'Centre', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>,

			                        <?= number_format(Sondage::total_repar('departement', 'Artibonite', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>,

			                        <?= number_format(Sondage::total_repar('departement', 'Nippes', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>,

			                        <?= number_format(Sondage::total_repar('departement', 'Grand-Anse', '1_sexe', 'Gason') / Query::count_prepare('sondage', 'Gason', '1_sexe') * 100, 2) ?>]
			                    },
			                    {
			                        fillColor : "#f5c20d",
			                        strokeColor : "#f5c20d",
			                       data : [<?= number_format(Sondage::total_repar('departement', 'Nord', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>,


			                       <?= number_format(Sondage::total_repar('departement', 'Nord-Est', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>,

			                       <?= number_format(Sondage::total_repar('departement', 'Nord-Ouest', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>,

			                       <?= number_format(Sondage::total_repar('departement', 'Sud', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>,

			                       <?= number_format(Sondage::total_repar('departement', 'Sud-Est', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>,

			                       <?= number_format(Sondage::total_repar('departement', 'Ouest', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>,

			                       <?= number_format(Sondage::total_repar('departement', 'Centre', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>,

			                       <?= number_format(Sondage::total_repar('departement', 'Artibonite', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>,

			                       <?= number_format(Sondage::total_repar('departement', 'Nippes', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>,

			                       <?= number_format(Sondage::total_repar('departement', 'Grand-Anse', '1_sexe', 'Fanm') / Query::count_prepare('sondage', 'Fanm', '1_sexe') * 100, 2) ?>]
			                    }
			                ]
			            }
			            // get bar chart canvas
			            var income = document.getElementById("income").getContext("2d");
			            // draw bar chart
			            new Chart(income).Bar(barData);
			        </script>
			</div>

			<div class="col-md-8">
				<h2><b>Répartition des enquetés par Groupe d'age</b></h2>
				<p>
					<i class="fa fa-square" style="color:#da0f08; "></i>  Gason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-square" style="color:#f5c20d; "></i>  Fanm
				</p>
				<canvas id="income1" style="width: 100%; height: 275px;"></canvas>
			        <script>
			            // line chart data
			          
			            var barData = {
			                labels : ["18 – 24 lane","25 – 30 lane","31 – 35 lane","36 oswa plis"],
			                datasets : [
			                    {
			                    	// gason
			                        fillColor : "#da0f08",
			                        strokeColor : "#da0f08",
			                        data : [<?= number_format(Sondage::total_repar('2_group_laj', '18 – 24 lane', '1_sexe', 'Gason') / Sondage::percent('1_sexe', 'Gason') * 100, 2) ?>,


			                        <?= number_format(Sondage::total_repar('2_group_laj', '25 – 30 lane', '1_sexe', 'Gason') / Sondage::percent('1_sexe', 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::total_repar('2_group_laj', '31 – 35 lane', '1_sexe', 'Gason') / Sondage::percent('1_sexe', 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::total_repar('2_group_laj', '36 oswa plis', '1_sexe', 'Gason') / Sondage::percent('1_sexe', 'Gason') * 100, 2) ?>]
			                    },
			                    {
			                    	// fanm
			                        fillColor : "#f5c20d",
			                        strokeColor : "#f5c20d",
			                       data : [<?= number_format(Sondage::total_repar('2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm') / Sondage::percent('1_sexe', 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::total_repar('2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm') / Sondage::percent('1_sexe', 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::total_repar('2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm') / Sondage::percent('1_sexe', 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::total_repar('2_group_laj', '36 oswa plis', '1_sexe', 'Fanm') / Sondage::percent('1_sexe', 'Fanm') * 100, 2) ?>]
			                    }
			                ]
			            }
			            // get bar chart canvas
			            var income = document.getElementById("income1").getContext("2d");
			            // draw bar chart
			            new Chart(income).Bar(barData);
			        </script>
			</div>

		<?php endif ?>


		<?php if (isset($url[2]) and $url[2] == 'question-3') : ?>

			<div class="row">
				<div class="col-md-12">
					<div class="c-content-title-2">
						<h3 class="c-center"><b>2. Pa ki mwayen ou te enfòme de fòmasyon an</b></h3>
						<div class="c-line c-theme-bg c-theme-bg-after"></div>
					</div>	
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-striped">
						<thead>
						<tr>
							<th colspan="5" style="text-align: center; background-color: #20b2aa; color: white;"><label  class="col-md-12"><b></b> </label></th>
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
								<?= Query::count_prepare('sondage', 'Radyo/televizyon', '3_mwayen_enfomasyon') ?>
							<td>
								<?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Radyo/televizyon', 'Gason'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Radyo/televizyon', 'Gason') * 100 / Query::count_prepare('sondage', 'Radyo/televizyon', '3_mwayen_enfomasyon') ?>%; background-color: #da0f07;">
								    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Radyo/televizyon', 'Gason') * 100 / Query::count_prepare('sondage', 'Radyo/televizyon', '3_mwayen_enfomasyon'), 2) ?>%
								  	</div>
								</div>

							</td>

							<td>
								<?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Radyo/televizyon', 'Fanm'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Radyo/televizyon', 'Fanm') * 100 / Query::count_prepare('sondage', 'Radyo/televizyon', '3_mwayen_enfomasyon') ?>%; background-color: #f5c20d;">
								    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Radyo/televizyon', 'Fanm') * 100 / Query::count_prepare('sondage', 'Radyo/televizyon', '3_mwayen_enfomasyon'), 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>
							
						</tr>

						<tr>
							<td>Facebook /sit wèb</td>
							<td>
								<?= Query::count_prepare('sondage', 'Facebook /sit wèb', '3_mwayen_enfomasyon') ?>
							<td>
								<?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Facebook /sit wèb', 'Gason'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Facebook /sit wèb', 'Gason') * 100 / Query::count_prepare('sondage', 'Facebook /sit wèb', '3_mwayen_enfomasyon') ?>%; background-color: #da0f07;">
								    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Facebook /sit wèb', 'Gason') * 100 / Query::count_prepare('sondage', 'Facebook /sit wèb', '3_mwayen_enfomasyon'), 2) ?>%
								  	</div>
								</div>
							</td>
							<td>
								<?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Facebook /sit wèb', 'Fanm'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Facebook /sit wèb', 'Fanm') * 100 / Query::count_prepare('sondage', 'Facebook /sit wèb', '3_mwayen_enfomasyon') ?>%; background-color: #f5c20d;">
								    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Facebook /sit wèb', 'Fanm') * 100 / Query::count_prepare('sondage', 'Facebook /sit wèb', '3_mwayen_enfomasyon'), 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>

						<tr>
							<td>WhatsApp</td>
							<td>
								<?= Query::count_prepare('sondage', 'WhatsApp', '3_mwayen_enfomasyon') ?>
							<td>
								<?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'WhatsApp', 'Gason'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'WhatsApp', 'Gason') * 100 / Query::count_prepare('sondage', 'WhatsApp', '3_mwayen_enfomasyon') ?>%; background-color: #da0f07;">
								    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'WhatsApp', 'Gason') * 100 / Query::count_prepare('sondage', 'WhatsApp', '3_mwayen_enfomasyon'), 2) ?>%
								  	</div>
								</div>
							</td>
							<td>
								<?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'WhatsApp', 'Fanm'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'WhatsApp', 'Fanm') * 100 / Query::count_prepare('sondage', 'WhatsApp', '3_mwayen_enfomasyon') ?>%; background-color: #f5c20d;">
								    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'WhatsApp', 'Fanm') * 100 / Query::count_prepare('sondage', 'WhatsApp', '3_mwayen_enfomasyon'), 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>

						

						<tr>
							<td>Yon zanmi / kòlèg</td>
							<td>
								<?= Query::count_prepare('sondage', 'Yon zanmi / kòlèg', '3_mwayen_enfomasyon') ?>
							<td>
								<?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Yon zanmi / kòlèg', 'Gason'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Yon zanmi / kòlèg', 'Gason') * 100 / Query::count_prepare('sondage', 'Yon zanmi / kòlèg', '3_mwayen_enfomasyon') ?>%; background-color: #da0f07;">
								    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Yon zanmi / kòlèg', 'Gason') * 100 / Query::count_prepare('sondage', 'Yon zanmi / kòlèg', '3_mwayen_enfomasyon'), 2) ?>%
								  	</div>
								</div>
							</td>
							<td>
								<?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Yon zanmi / kòlèg', 'Fanm'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Yon zanmi / kòlèg', 'Fanm') * 100 / Query::count_prepare('sondage', 'Yon zanmi / kòlèg', '3_mwayen_enfomasyon') ?>%;background-color: #f5c20d;">
								    	<?= number_format(Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', 'Yon zanmi / kòlèg', 'Fanm') * 100 / Query::count_prepare('sondage', 'Yon zanmi / kòlèg', '3_mwayen_enfomasyon'), 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>
						</tbody>
					</table>
					
				</div>
			</div>

			<div class="col-md-12">
				<h1 class="alert alert-info"><b>Répartition par département</b></h1>
					<?php 
				$array = ['Radyo/televizyon', 'Facebook /sit wèb', 'WhatsApp', 'Yon zanmi / kòlèg'];
				foreach ($array as $key => $value) :
				?>

					<div class="col-md-12">
						<h2><b><?= $value ?></b> </h2>

						<table class="table table-bordered table-striped">
							<thead style="font-weight: bold; font-size: 18px; background-color: #c4f4f2;">
								<tr>
									<th>Département</th>
									<th>Personne</th>
									<th>Pourcentage</th>
									<th>Homme</th>
									<th>Femme</th>
									<th>% Homme</th>
									<th>% Femme</th>

									
								</tr>
							</thead>

							<tbody style="font-weight: normal;">

								<tr>
								<td>Nord</td>
								<td><?= Sondage::total_repar('departement', 'Nord', '3_mwayen_enfomasyon', $value) ?></td>

								<td><?= number_format(Sondage::total_repar('departement', 'Nord', '3_mwayen_enfomasyon', $value) * 100 / Query::count_prepare('sondage', $value, '3_mwayen_enfomasyon'), 2) ?>%</td>


								<td><?= Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) ?></td>


								<td><?= Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) ?></td>

								<td><?= number_format(Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason') * 100, 2) ?>%</td>


								<td><?= number_format(Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm') * 100, 2) ?>%</td>
								</tr>





								<tr>
									<td>Nord-Est</td>
									<td><?= Sondage::total_repar('departement', 'Nord-Est', '3_mwayen_enfomasyon', $value) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Nord-Est', '3_mwayen_enfomasyon', $value) * 100 / Query::count_prepare('sondage', $value, '3_mwayen_enfomasyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm') * 100, 2) ?>%</td>

									
								</tr>

								<tr>
									<td>Nord-Ouest</td>
									<td><?= Sondage::total_repar('departement', 'Nord-Ouest', '3_mwayen_enfomasyon', $value) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Nord-Ouest', '3_mwayen_enfomasyon', $value) * 100 / Query::count_prepare('sondage', $value, '3_mwayen_enfomasyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Sud</td>
									<td><?= Sondage::total_repar('departement', 'Sud', '3_mwayen_enfomasyon', $value) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Sud', '3_mwayen_enfomasyon', $value) * 100 / Query::count_prepare('sondage', $value, '3_mwayen_enfomasyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Sud-Est</td>
									<td><?= Sondage::total_repar('departement', 'Sud-Est', '3_mwayen_enfomasyon', $value) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Sud-Est', '3_mwayen_enfomasyon', $value) * 100 / Query::count_prepare('sondage', $value, '3_mwayen_enfomasyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Ouest</td>
									<td><?= Sondage::total_repar('departement', 'Ouest', '3_mwayen_enfomasyon', $value) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Ouest', '3_mwayen_enfomasyon', $value) * 100 / Query::count_prepare('sondage', $value, '3_mwayen_enfomasyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Centre</td>
									<td><?= Sondage::total_repar('departement', 'Centre', '3_mwayen_enfomasyon', $value) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Centre', '3_mwayen_enfomasyon', $value) * 100 / Query::count_prepare('sondage', $value, '3_mwayen_enfomasyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Artibonite</td>
									<td><?= Sondage::total_repar('departement', 'Artibonite', '3_mwayen_enfomasyon', $value) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Artibonite', '3_mwayen_enfomasyon', $value) * 100 / Query::count_prepare('sondage', $value, '3_mwayen_enfomasyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Nippes</td>
									<td><?= Sondage::total_repar('departement', 'Nippes', '3_mwayen_enfomasyon', $value) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Nippes', '3_mwayen_enfomasyon', $value) * 100 / Query::count_prepare('sondage', $value, '3_mwayen_enfomasyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Grand-Anse</td>
									<td><?= Sondage::total_repar('departement', 'Grand-Anse', '3_mwayen_enfomasyon', $value) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Grand-Anse', '3_mwayen_enfomasyon', $value) * 100 / Query::count_prepare('sondage', $value, '3_mwayen_enfomasyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) ?></td>

									<!-- <?php 
													$value_zero = Sondage::total_repar('departement', 'Nippes', '3_mwayen_enfomasyon', $value);
													if ($value_zero < 0) {
														echo "0";
													} else {
														echo $value_zero;
													}
													?> -->

									<td><?= number_format(Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>
								<tr>
									<td ><b>Total</b></td>
									<td ><?= Query::count_prepare('sondage', $value, '3_mwayen_enfomasyon') ?></td>
									<td>100%</td>

									<td><?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason'); ?></td>

									<td><?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm'); ?></td>

									<td><?= number_format(Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason') / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Gason') * 100, 2) ?>%</td>

									<td><?= number_format(Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm') / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value, 'Fanm') * 100, 2) ?>%</td>

									
								</tr>
							</tbody>
						</table>
					</div>
				<?php endforeach ?>
			</div>

			<div class="col-md-12">
				<div class="col-md-12">
					<h1 class="alert alert-info"><b>Répartition par Groupe d'âge</b></h1>
				</div>
					<?php foreach ($array as $key => $value1) : ?>

					<div class="col-md-12">
						<h2><b><?= $value1 ?></b></h2>
						<table class="table table-bordered table-striped">
							<thead style="font-weight: bold; font-size: 18px; background-color: #c4f4f2;">
								<tr>
									<th>Groupe d'age</th>
									<th>Personne</th>
									<th>Pourcentage</th>
									<th>Homme</th>
									<th>Femme</th>
									<th>% Homme</th>
									<th>% Femme</th>
								</tr>
							</thead>

							<tbody style="font-weight: normal;">

								<tr>
									<td>18 – 24 lane</td>
								
									<td><?= Sondage::total_repar('2_group_laj', '18 – 24 lane', '3_mwayen_enfomasyon', $value1) ?></td>

									<td><?= number_format(Sondage::total_repar('2_group_laj', '18 – 24 lane', '3_mwayen_enfomasyon', $value1) / Query::count_prepare('sondage', $value1, '3_mwayen_enfomasyon') * 100, 2) ?>%</td>

									<td><?= Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) ?></td>

								    <td><?= Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) ?></td>

								    <td><?= number_format(Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>%</td>

								</tr>

								<tr>
									<td>25 – 30 lane</td>
									<td><?= Sondage::total_repar('2_group_laj', '25 – 30 lane', '3_mwayen_enfomasyon', $value1) ?></td>

									<td><?= number_format(Sondage::total_repar('2_group_laj', '25 – 30 lane', '3_mwayen_enfomasyon', $value1) / Query::count_prepare('sondage', $value1, '3_mwayen_enfomasyon') * 100, 2) ?>%</td>

									<td><?= Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) ?></td>

								    <td><?= Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) ?></td>

								    <td><?= number_format(Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>%</td>
								</tr>

								<tr>
									<td>31 – 35 lane</td>
									<td><?= Sondage::total_repar('2_group_laj', '31 – 35 lane', '3_mwayen_enfomasyon', $value1) ?></td>

									<td><?= number_format(Sondage::total_repar('2_group_laj', '31 – 35 lane', '3_mwayen_enfomasyon', $value1) / Query::count_prepare('sondage', $value1, '3_mwayen_enfomasyon') * 100, 2) ?>%</td>

									<td><?= Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) ?></td>

								    <td><?= Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) ?></td>

								    <td><?= number_format(Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>%</td>
								</tr>

								<tr>
									<td>36 oswa plis</td>
									<td><?= Sondage::total_repar('2_group_laj', '36 oswa plis', '3_mwayen_enfomasyon', $value1) ?></td>

									<td><?= number_format(Sondage::total_repar('2_group_laj', '36 oswa plis', '3_mwayen_enfomasyon', $value1) / Query::count_prepare('sondage', $value1, '3_mwayen_enfomasyon') * 100, 2) ?>%</td>

									<td><?= Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) ?></td>

								    <td><?= Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) ?></td>

								    <td><?= number_format(Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>%</td>
								</tr>


								<tr>
									<td ><b>Total</b></td>
									<td ><?= Query::count_prepare('sondage', $value1, '3_mwayen_enfomasyon') ?></td>

									<td><?= number_format(Query::count_prepare('sondage', $value1, '3_mwayen_enfomasyon') / Query::count_prepare('sondage', $value1, '3_mwayen_enfomasyon') * 100, 2) ?>%</td>

									<td><?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') ?></td>

									<td><?= Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') ?></td>

									<td><?= number_format(Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>%</td>

									<td><?= number_format(Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>%</td>
								</tr>
							</tbody>
						</table>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="col-md-12">

				<h1 class="alert alert-info"><b>Liste des graphes par département</b></h1>

				<?php foreach ($array as $key => $value1) : ?>
					<h2><b><?= $value1 ?></b></h2>
				<p>
					<i class="fa fa-square" style="color:#da0f08; "></i>  Gason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-square" style="color:#f5c20d; "></i>  Fanm
				</p>
				<?php $var1 = rand(100000, 1000000000000) . "plek"; ?>
				<canvas id="<?= $var1 ?>" style="width: 100%; height: 275px;" style="margin-bottom: 10px;"></canvas>
			        <script>
			            // line chart data
			          
			            var barData = {
			                labels : ["Nord","Nord-Est","Nord-Ouest","Sud","Sud-Est","Ouest","Centre","Artibonite","Nippes","Grand-Anse"],
			                datasets : [
			                    {
			                        fillColor : "#da0f08",
			                        strokeColor : "#da0f08",
			                        data : [<?= number_format(Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>,


			                        <?= number_format(Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>,


			                        <?= number_format(Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>,

			                       	<?= number_format(Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Gason') * 100, 2) ?>]
			                    },
			                    {
			                        fillColor : "#f5c20d",
			                        strokeColor : "#f5c20d",
			                       data : [<?= number_format(Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>,


			                       <?= number_format(Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value1) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value1, 'Fanm') * 100, 2) ?>]
			                    }
			                ]
			            }
			            // get bar chart canvas
			            var income = document.getElementById("<?= $var1 ?>").getContext("2d");
			            // draw bar chart
			            new Chart(income).Bar(barData);
			        </script></br></br>
				<?php endforeach ?>
			</div>

			<div class="col-md-12">
				<h1 class="alert alert-info"><b>Liste des graphes par groupe d'âge</b></h1>

				<?php foreach ($array as $key => $value2) : ?>
					<div class="col-md-6">
					<h2><b><?= $value2 ?></b></h2>
					<p>
						<i class="fa fa-square" style="color:#da0f08; "></i>  Gason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<i class="fa fa-square" style="color:#f5c20d; "></i>  Fanm
					</p>
					<?php $var2 = rand(10000, 10000000000) . "plipp"; ?>
					<canvas id="<?= $var2 ?>" style="width: 100%; height: 275px; margin-bottom: 15px;"></canvas>
				        <script>
				            // line chart data
				          
				            var barData = {
				                labels : ["18 – 24 lane","25 – 30 lane","31 – 35 lane","36 oswa plis"],
				                datasets : [
				                    {
				                    	// gason
				                        fillColor : "#da0f08",
				                        strokeColor : "#da0f08",
				                        data : [<?= number_format(Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value2) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value2, 'Gason') * 100, 2) ?>,


				                        <?= number_format(Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value2) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value2, 'Gason') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value2) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value2, 'Gason') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Gason', '3_mwayen_enfomasyon', $value2) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value2, 'Gason') * 100, 2) ?>]
				                    },
				                    {
				                    	// fanm
				                        fillColor : "#f5c20d",
				                        strokeColor : "#f5c20d",
				                       data : [<?= number_format(Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value2) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value2, 'Fanm') * 100, 2) ?>,

				                      <?= number_format(Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value2) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value2, 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value2) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value2, 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Fanm', '3_mwayen_enfomasyon', $value2) / Sondage::repartition('3_mwayen_enfomasyon', '1_sexe', $value2, 'Fanm') * 100, 2) ?>]
				                    }
				                ]
				            }
				            // get bar chart canvas
				            var income = document.getElementById("<?= $var2 ?>").getContext("2d");
				            // draw bar chart
				            new Chart(income).Bar(barData);
				        </script>
				  </div>

				<?php endforeach ?>
				
			</div>
		<?php endif ?>



		<?php if (isset($url[2]) and $url[2] == 'question-4') : ?>

			<div class="row">
				<div class="col-md-12">
					<div class="c-content-title-2">
						<h3 class="c-center"><b>3. Jiska ki pwen ou enterese nan zafè politik peyi a pou moman sa?</b></h3>
						<div class="c-line c-theme-bg c-theme-bg-after"></div>
					</div>	
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-striped">
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
								<?= Query::count_prepare('sondage', 'Enterese anpil', '4_enteresman') ?>
							<td>
								<?= Sondage::repartition('4_enteresman', '1_sexe', 'Enterese anpil', 'Gason'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman', '1_sexe', 'Enterese anpil', 'Gason') * 100 / Query::count_prepare('sondage', 'Enterese anpil', '4_enteresman') ?>%; background-color: #da0f08;">
								    	<?= number_format(Sondage::repartition('4_enteresman', '1_sexe', 'Enterese anpil', 'Gason') * 100 / Query::count_prepare('sondage', 'Enterese anpil', '4_enteresman'), 2) ?>%
								  	</div>
								</div>
							</td>
							<td>
								<?= Sondage::repartition('4_enteresman', '1_sexe', 'Enterese anpil', 'Fanm'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman', '1_sexe', 'Enterese anpil', 'Fanm') * 100 / Query::count_prepare('sondage', 'Enterese anpil', '4_enteresman') ?>%; background-color: #f5c20d;">
								    	<?= number_format(Sondage::repartition('4_enteresman', '1_sexe', 'Enterese anpil', 'Fanm') * 100 / Query::count_prepare('sondage', 'Enterese anpil', '4_enteresman'), 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>

						<tr>
							<td>Enterese</td>
							<td>
								<?= Query::count_prepare('sondage', 'Enterese', '4_enteresman') ?>
							<td>
								<?= Sondage::repartition('4_enteresman', '1_sexe', 'Enterese', 'Gason'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman', '1_sexe', 'Enterese', 'Gason') * 100 / Query::count_prepare('sondage', 'Enterese', '4_enteresman') ?>%; background-color: #da0f08;">
								    	<?= number_format(Sondage::repartition('4_enteresman', '1_sexe', 'Enterese', 'Gason') * 100 / Query::count_prepare('sondage', 'Enterese', '4_enteresman'), 2) ?>%
								  	</div>
								</div>
							</td>
							<td>
								<?= Sondage::repartition('4_enteresman', '1_sexe', 'Enterese', 'Fanm'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman', '1_sexe', 'Enterese', 'Fanm') * 100 / Query::count_prepare('sondage', 'Enterese', '4_enteresman') ?>%; background-color: #f5c20d;">
								    	<?= number_format(Sondage::repartition('4_enteresman', '1_sexe', 'Enterese', 'Fanm') * 100 / Query::count_prepare('sondage', 'Enterese', '4_enteresman'), 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>

						<tr>
							<td>Pa enterese di tou</td>
							<td>
								<?= Query::count_prepare('sondage', 'Pa enterese di tou', '4_enteresman') ?>
							<td>
								<?= Sondage::repartition('4_enteresman', '1_sexe', 'Pa enterese di tou', 'Gason'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman', '1_sexe', 'Pa enterese di tou', 'Gason') * 100 / Query::count_prepare('sondage', 'Pa enterese di tou', '4_enteresman') ?>%; background-color: #da0f08;">
								    	<?= number_format(Sondage::repartition('4_enteresman', '1_sexe', 'Pa enterese di tou', 'Gason') * 100 / Query::count_prepare('sondage', 'Pa enterese di tou', '4_enteresman'), 2) ?>%
								  	</div>
								</div>
							</td>
							<td>
								<?= Sondage::repartition('4_enteresman', '1_sexe', 'Pa enterese di tou', 'Fanm'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman', '1_sexe', 'Pa enterese di tou', 'Fanm') * 100 / Query::count_prepare('sondage', 'Pa enterese di tou', '4_enteresman') ?>%; background-color: #f5c20d;">
								    	<?= number_format(Sondage::repartition('4_enteresman', '1_sexe', 'Pa enterese di tou', 'Fanm') * 100 / Query::count_prepare('sondage', 'Pa enterese di tou', '4_enteresman'), 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>

						<tr>
							<td>Enterese yon tikras</td>
							<td>
								<?= Query::count_prepare('sondage', 'Enterese yon tikras', '4_enteresman') ?>
							<td>
								<?= Sondage::repartition('4_enteresman', '1_sexe', 'Enterese yon tikras', 'Gason'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman', '1_sexe', 'Enterese yon tikras', 'Gason') * 100 / Query::count_prepare('sondage', 'Enterese yon tikras', '4_enteresman') ?>%; background-color: #da0f08;">
								    	<?= number_format(Sondage::repartition('4_enteresman', '1_sexe', 'Enterese yon tikras', 'Gason') * 100 / Query::count_prepare('sondage', 'Enterese yon tikras', '4_enteresman'), 2) ?>%
								  	</div>
								</div>
							</td>
							<td>
								<?= Sondage::repartition('4_enteresman', '1_sexe', 'Enterese yon tikras', 'Fanm'); ?>
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('4_enteresman', '1_sexe', 'Enterese yon tikras', 'Fanm') * 100 / Query::count_prepare('sondage', 'Enterese yon tikras', '4_enteresman') ?>%; background-color: #f5c20d;">
								    	<?= number_format(Sondage::repartition('4_enteresman', '1_sexe', 'Enterese yon tikras', 'Fanm') * 100 / Query::count_prepare('sondage', 'Enterese yon tikras', '4_enteresman'), 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>
						</tbody>
					</table>
					
				</div>
			</div>


			<div class="col-md-12">
				<h1 class="alert alert-info"><b>Répartition par département</b></h1>
					<?php 
				$array1 = ['Enterese anpil', 'Enterese', 'Pa enterese di tou', 'Enterese yon tikras'];
				foreach ($array1 as $key => $value3) :
				?>

					<div class="col-md-12">
						<h2><b><?= $value3 ?></b> </h2>

						<table class="table table-bordered table-striped">
							<thead style="font-weight: bold; font-size: 18px; background-color: #c4f4f2;">
								<tr>
									<th>Département</th>
									<th>Personne</th>
									<th>Pourcentage</th>
									<th>Homme</th>
									<th>Femme</th>
									<th>% Homme</th>
									<th>% Femme</th>

									
								</tr>
							</thead>

							<tbody style="font-weight: normal;">

								<tr>
								<td>Nord</td>
								<td><?= Sondage::total_repar('departement', 'Nord', '4_enteresman', $value3) ?></td>

								<td><?= number_format(Sondage::total_repar('departement', 'Nord', '4_enteresman', $value3) * 100 / Query::count_prepare('sondage', $value3, '4_enteresman'), 2) ?>%</td>


								<td><?= Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Gason', '4_enteresman', $value3) ?></td>


								<td><?= Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Fanm', '4_enteresman', $value3) ?></td>

								<td><?= number_format(Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Gason', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason') * 100, 2) ?>%</td>


								<td><?= number_format(Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Fanm', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm') * 100, 2) ?>%</td>
								</tr>





								<tr>
									<td>Nord-Est</td>
									<td><?= Sondage::total_repar('departement', 'Nord-Est', '4_enteresman', $value3) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Nord-Est', '4_enteresman', $value3) * 100 / Query::count_prepare('sondage', $value3, '4_enteresman'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Gason', '4_enteresman', $value3) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Fanm', '4_enteresman', $value3) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Gason', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Fanm', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm') * 100, 2) ?>%</td>

									
								</tr>

								<tr>
									<td>Nord-Ouest</td>
									<td><?= Sondage::total_repar('departement', 'Nord-Ouest', '4_enteresman', $value3) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Nord-Ouest', '4_enteresman', $value3) * 100 / Query::count_prepare('sondage', $value3, '4_enteresman'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Gason', '4_enteresman', $value3) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Fanm', '4_enteresman', $value3) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Gason', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Fanm', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Sud</td>
									<td><?= Sondage::total_repar('departement', 'Sud', '4_enteresman', $value3) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Sud', '4_enteresman', $value3) * 100 / Query::count_prepare('sondage', $value3, '4_enteresman'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Gason', '4_enteresman', $value3) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Fanm', '4_enteresman', $value3) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Gason', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Fanm', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Sud-Est</td>
									<td><?= Sondage::total_repar('departement', 'Sud-Est', '4_enteresman', $value3) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Sud-Est', '4_enteresman', $value3) * 100 / Query::count_prepare('sondage', $value3, '4_enteresman'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Gason', '4_enteresman', $value3) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Fanm', '4_enteresman', $value3) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Gason', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Fanm', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Ouest</td>
									<td><?= Sondage::total_repar('departement', 'Ouest', '4_enteresman', $value3) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Ouest', '4_enteresman', $value3) * 100 / Query::count_prepare('sondage', $value3, '4_enteresman'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Gason', '4_enteresman', $value3) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Fanm', '4_enteresman', $value3) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Gason', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Fanm', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Centre</td>
									<td><?= Sondage::total_repar('departement', 'Centre', '4_enteresman', $value3) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Centre', '4_enteresman', $value3) * 100 / Query::count_prepare('sondage', $value3, '4_enteresman'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Gason', '4_enteresman', $value3) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Fanm', '4_enteresman', $value3) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Gason', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Fanm', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Artibonite</td>
									<td><?= Sondage::total_repar('departement', 'Artibonite', '4_enteresman', $value3) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Artibonite', '4_enteresman', $value3) * 100 / Query::count_prepare('sondage', $value3, '4_enteresman'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Gason', '4_enteresman', $value3) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Fanm', '4_enteresman', $value3) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Gason', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Fanm', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Nippes</td>
									<td><?= Sondage::total_repar('departement', 'Nippes', '4_enteresman', $value3) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Nippes', '4_enteresman', $value3) * 100 / Query::count_prepare('sondage', $value3, '4_enteresman'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Gason', '4_enteresman', $value3) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Fanm', '4_enteresman', $value3) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Gason', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Fanm', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Grand-Anse</td>
									<td><?= Sondage::total_repar('departement', 'Grand-Anse', '4_enteresman', $value3) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Grand-Anse', '4_enteresman', $value3) * 100 / Query::count_prepare('sondage', $value3, '4_enteresman'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Gason', '4_enteresman', $value3) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Fanm', '4_enteresman', $value3) ?></td>

									
									<td><?= number_format(Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Gason', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Fanm', '4_enteresman', $value3) / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>
								<tr>
									<td ><b>Total</b></td>
									<td ><?= Query::count_prepare('sondage', $value3, '4_enteresman') ?></td>
									<td>100%</td>

									<td><?= Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason'); ?></td>

									<td><?= Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm'); ?></td>

									<td><?= number_format(Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason') / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Gason') * 100, 2) ?>%</td>

									<td><?= number_format(Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm') / Sondage::repartition('4_enteresman', '1_sexe', $value3, 'Fanm') * 100, 2) ?>%</td>
								</tr>
							</tbody>
						</table>
					</div>
				<?php endforeach ?>
			</div>

			<div class="col-md-12">
				<div class="col-md-12">
					<h1 class="alert alert-info"><b>Répartition par Groupe d'âge</b></h1>
				</div>
					<?php foreach ($array1 as $key => $value4) : ?>

					<div class="col-md-12">
						<h2><b><?= $value4 ?></b></h2>
						<table class="table table-bordered table-striped">
							<thead style="font-weight: bold; font-size: 18px; background-color: #c4f4f2;">
								<tr>
									<th>Groupe d'age</th>
									<th>Personne</th>
									<th>Pourcentage</th>
									<th>Homme</th>
									<th>Femme</th>
									<th>% Homme</th>
									<th>% Femme</th>
								</tr>
							</thead>

							<tbody style="font-weight: normal;">

								<tr>
									<td>18 – 24 lane</td>
								
									<td><?= Sondage::total_repar('2_group_laj', '18 – 24 lane', '4_enteresman', $value4) ?></td>

									<td><?= number_format(Sondage::total_repar('2_group_laj', '18 – 24 lane', '4_enteresman', $value4) / Query::count_prepare('sondage', $value4, '4_enteresman') * 100, 2) ?>%</td>

									<td><?= Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Gason', '4_enteresman', $value4) ?></td>

								    <td><?= Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm', '4_enteresman', $value4) ?></td>

								    <td><?= number_format(Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Gason', '4_enteresman', $value4) / Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm', '4_enteresman', $value4) / Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Fanm') * 100, 2) ?>%</td>

								</tr>

								<tr>
									<td>25 – 30 lane</td>
									<td><?= Sondage::total_repar('2_group_laj', '25 – 30 lane', '4_enteresman', $value4) ?></td>

									<td><?= number_format(Sondage::total_repar('2_group_laj', '25 – 30 lane', '4_enteresman', $value4) / Query::count_prepare('sondage', $value4, '4_enteresman') * 100, 2) ?>%</td>

									<td><?= Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Gason', '4_enteresman', $value4) ?></td>

								    <td><?= Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm', '4_enteresman', $value4) ?></td>

								    <td><?= number_format(Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Gason', '4_enteresman', $value4) / Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm', '4_enteresman', $value4) / Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Fanm') * 100, 2) ?>%</td>
								</tr>

								<tr>
									<td>31 – 35 lane</td>
									<td><?= Sondage::total_repar('2_group_laj', '31 – 35 lane', '4_enteresman', $value4) ?></td>

									<td><?= number_format(Sondage::total_repar('2_group_laj', '31 – 35 lane', '4_enteresman', $value4) / Query::count_prepare('sondage', $value4, '4_enteresman') * 100, 2) ?>%</td>

									<td><?= Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Gason', '4_enteresman', $value4) ?></td>

								    <td><?= Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm', '4_enteresman', $value4) ?></td>

								    <td><?= number_format(Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Gason', '4_enteresman', $value4) / Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm', '4_enteresman', $value4) / Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Fanm') * 100, 2) ?>%</td>
								</tr>

								<tr>
									<td>36 oswa plis</td>
									<td><?= Sondage::total_repar('2_group_laj', '36 oswa plis', '4_enteresman', $value4) ?></td>

									<td><?= number_format(Sondage::total_repar('2_group_laj', '36 oswa plis', '4_enteresman', $value4) / Query::count_prepare('sondage', $value4, '4_enteresman') * 100, 2) ?>%</td>

									<td><?= Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Gason', '4_enteresman', $value4) ?></td>

								    <td><?= Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Fanm', '4_enteresman', $value4) ?></td>

								    <td><?= number_format(Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Gason', '4_enteresman', $value4) / Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Fanm', '4_enteresman', $value4) / Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Fanm') * 100, 2) ?>%</td>
								</tr>


								<tr>
									<td ><b>Total</b></td>
									<td ><?= Query::count_prepare('sondage', $value4, '4_enteresman') ?></td>

									<td><?= number_format(Query::count_prepare('sondage', $value4, '4_enteresman') / Query::count_prepare('sondage', $value4, '4_enteresman') * 100, 2) ?>%</td>

									<td><?= Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Gason') ?></td>

									<td><?= Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Fanm') ?></td>

									<td><?= number_format(Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Gason') / Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Gason') * 100, 2) ?>%</td>

									<td><?= number_format(Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Fanm') / Sondage::repartition('4_enteresman', '1_sexe', $value4, 'Fanm') * 100, 2) ?>%</td>
								</tr>
							</tbody>
						</table>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="col-md-12">

				<h1 class="alert alert-info"><b>Liste des graphes par département</b></h1>

				<?php foreach ($array1 as $key => $value5) : ?>
					<h2><b><?= $value5 ?></b></h2>
				<p>
					<i class="fa fa-square" style="color:#da0f08; "></i>  Gason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-square" style="color:#f5c20d; "></i>  Fanm
				</p>
				<?php $var4 = rand(100000, 1000000000000) . "pljek"; ?>
				<canvas id="<?= $var4 ?>" style="width: 100%; height: 275px;" style="margin-bottom: 10px;"></canvas>
			        <script>
			            // line chart data
			          
			            var barData = {
			                labels : ["Nord","Nord-Est","Nord-Ouest","Sud","Sud-Est","Ouest","Centre","Artibonite","Nippes","Grand-Anse"],
			                datasets : [
			                    {
			                        fillColor : "#da0f08",
			                        strokeColor : "#da0f08",
			                        data : [<?= number_format(Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Gason', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Gason') * 100, 2) ?>,


			                        <?= number_format(Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Gason', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Gason') * 100, 2) ?>,


			                        <?= number_format(Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Gason', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Gason', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Gason', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Gason') * 100, 2) ?>,

			                       	<?= number_format(Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Gason', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Gason', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Gason', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Gason', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Gason', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Gason') * 100, 2) ?>]
			                    },
			                    {
			                        fillColor : "#f5c20d",
			                        strokeColor : "#f5c20d",
			                       data : [<?= number_format(Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Fanm', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Fanm') * 100, 2) ?>,


			                       <?= number_format(Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Fanm', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Fanm', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Fanm', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Fanm', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Fanm', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Fanm', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Fanm', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Fanm', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Fanm', '4_enteresman', $value5) / Sondage::repartition('4_enteresman', '1_sexe', $value5, 'Fanm') * 100, 2) ?>]
			                    }
			                ]
			            }
			            // get bar chart canvas
			            var income = document.getElementById("<?= $var4 ?>").getContext("2d");
			            // draw bar chart
			            new Chart(income).Bar(barData);
			        </script></br></br>
				<?php endforeach ?>
			</div>

			<div class="col-md-12">
				<h1 class="alert alert-info"><b>Liste des graphes par groupe d'âge</b></h1>

				<?php foreach ($array1 as $key => $value6) : ?>
					<div class="col-md-6">
					<h2><b><?= $value6 ?></b></h2>
					<p>
						<i class="fa fa-square" style="color:#da0f08; "></i>  Gason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<i class="fa fa-square" style="color:#f5c20d; "></i>  Fanm
					</p>
					<?php $var6 = rand(10000, 10000000000) . "pliplp"; ?>
					<canvas id="<?= $var6 ?>" style="width: 100%; height: 275px; margin-bottom: 15px;"></canvas>
				        <script>
				            // line chart data
				          
				            var barData = {
				                labels : ["18 – 24 lane","25 – 30 lane","31 – 35 lane","36 oswa plis"],
				                datasets : [
				                    {
				                    	// gason
				                        fillColor : "#da0f08",
				                        strokeColor : "#da0f08",
				                        data : [<?= number_format(Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Gason', '4_enteresman', $value6) / Sondage::repartition('4_enteresman', '1_sexe', $value6, 'Gason') * 100, 2) ?>,


				                        <?= number_format(Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Gason', '4_enteresman', $value6) / Sondage::repartition('4_enteresman', '1_sexe', $value6, 'Gason') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Gason', '4_enteresman', $value6) / Sondage::repartition('4_enteresman', '1_sexe', $value6, 'Gason') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Gason', '4_enteresman', $value6) / Sondage::repartition('4_enteresman', '1_sexe', $value6, 'Gason') * 100, 2) ?>]
				                    },
				                    {
				                    	// fanm
				                        fillColor : "#f5c20d",
				                        strokeColor : "#f5c20d",
				                       data : [<?= number_format(Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm', '4_enteresman', $value6) / Sondage::repartition('4_enteresman', '1_sexe', $value6, 'Fanm') * 100, 2) ?>,

				                      <?= number_format(Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm', '4_enteresman', $value6) / Sondage::repartition('4_enteresman', '1_sexe', $value6, 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm', '4_enteresman', $value6) / Sondage::repartition('4_enteresman', '1_sexe', $value6, 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Fanm', '4_enteresman', $value6) / Sondage::repartition('4_enteresman', '1_sexe', $value6, 'Fanm') * 100, 2) ?>]
				                    }
				                ]
				            }
				            // get bar chart canvas
				            var income = document.getElementById("<?= $var6 ?>").getContext("2d");
				            // draw bar chart
				            new Chart(income).Bar(barData);
				        </script>
				  </div>

				<?php endforeach ?>
			</div>
		<?php endif ?>


		<?php if (isset($url[2]) and $url[2] == 'question-5') : ?>

			<div class="row">
				<div class="col-md-12">
					<div class="c-content-title-2">
						<h3 class="c-center"><b>4. Si tout kondisyon te reyini jodia pou peyi a òganize eleksyon pou Senatè ak Depite, èske w t ap deside al vote?</b></h3>
						<div class="c-line c-theme-bg c-theme-bg-after"></div>
					</div>	
				</div>
			</div>

			<div class="col-md-12">
				<table class="table table-bordered table-striped">
					<thead>
					
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
							<?= Query::count_prepare('sondage', 'Wi', '5_kondisyon') ?>
						<td>
							<?= Sondage::repartition('5_kondisyon', '1_sexe', 'Wi', 'Gason'); ?>
							<div class="progress">
							  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_kondisyon', '1_sexe', 'Wi', 'Gason') * 100 / Query::count_prepare('sondage', 'Wi', '5_kondisyon') ?>%; background-color: #da0f08;">
							    	<?= number_format(Sondage::repartition('5_kondisyon', '1_sexe', 'Wi', 'Gason') * 100 / Query::count_prepare('sondage', 'Wi', '5_kondisyon'), 2) ?>%
							  	</div>
							</div>
						</td>
						<td>
							<?= Sondage::repartition('5_kondisyon', '1_sexe', 'Wi', 'Fanm'); ?>
							<div class="progress">
							  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_kondisyon', '1_sexe', 'Wi', 'Fanm') * 100 / Query::count_prepare('sondage', 'Wi', '5_kondisyon') ?>%; background-color: #f5c20d;">
							    	<?= number_format(Sondage::repartition('5_kondisyon', '1_sexe', 'Wi', 'Fanm') * 100 / Query::count_prepare('sondage', 'Wi', '5_kondisyon'), 2) ?>%
							  	</div>
							</div>
						</td>
					</tr>

					<tr>
						<td>Non</td>
						<td>
							<?= Query::count_prepare('sondage', 'Non', '5_kondisyon') ?>
						<td>
							<?= Sondage::repartition('5_kondisyon', '1_sexe', 'Non', 'Gason'); ?>
							<div class="progress">
							  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_kondisyon', '1_sexe', 'Non', 'Gason') * 100 / Query::count_prepare('sondage', 'Non', '5_kondisyon') ?>%; background-color: #da0f08;">
							    	<?= number_format(Sondage::repartition('5_kondisyon', '1_sexe', 'Non', 'Gason') * 100 / Query::count_prepare('sondage', 'Non', '5_kondisyon'), 2) ?>%
							  	</div>
							</div>
						</td>
						<td>
							<?= Sondage::repartition('5_kondisyon', '1_sexe', 'Non', 'Fanm'); ?>
							<div class="progress">
							  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Sondage::repartition('5_kondisyon', '1_sexe', 'Non', 'Fanm') * 100 / Query::count_prepare('sondage', 'Non', '5_kondisyon') ?>%; background-color: #f5c20d;">
							    	<?= number_format(Sondage::repartition('5_kondisyon', '1_sexe', 'Non', 'Fanm') * 100 / Query::count_prepare('sondage', 'Non', '5_kondisyon'), 2) ?>%
							  	</div>
							</div>
						</td>
					</tr>

					</tbody>
				</table>
			</div>


			<div class="col-md-12">
				<h1 class="alert alert-info"><b>Répartition par département</b></h1>
					<?php 
				$array3 = ['Wi', 'Non'];
				foreach ($array3 as $key => $value7) :
				?>

					<div class="col-md-12">
						<h2><b><?= $value7 ?></b> </h2>

						<table class="table table-bordered table-striped">
							<thead style="font-weight: bold; font-size: 18px; background-color: #c4f4f2;">
								<tr>
									<th>Département</th>
									<th>Personne</th>
									<th>Pourcentage</th>
									<th>Homme</th>
									<th>Femme</th>
									<th>% Homme</th>
									<th>% Femme</th>

									
								</tr>
							</thead>

							<tbody style="font-weight: normal;">

								<tr>
								<td>Nord</td>
								<td><?= Sondage::total_repar('departement', 'Nord', '5_kondisyon', $value7) ?></td>

								<td><?= number_format(Sondage::total_repar('departement', 'Nord', '5_kondisyon', $value7) * 100 / Query::count_prepare('sondage', $value7, '5_kondisyon'), 2) ?>%</td>


								<td><?= Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Gason', '5_kondisyon', $value7) ?></td>


								<td><?= Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Fanm', '5_kondisyon', $value7) ?></td>

								<td><?= number_format(Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Gason', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason') * 100, 2) ?>%</td>


								<td><?= number_format(Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Fanm', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm') * 100, 2) ?>%</td>
								</tr>





								<tr>
									<td>Nord-Est</td>
									<td><?= Sondage::total_repar('departement', 'Nord-Est', '5_kondisyon', $value7) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Nord-Est', '5_kondisyon', $value7) * 100 / Query::count_prepare('sondage', $value7, '5_kondisyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Gason', '5_kondisyon', $value7) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Fanm', '5_kondisyon', $value7) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Gason', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Fanm', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm') * 100, 2) ?>%</td>

									
								</tr>

								<tr>
									<td>Nord-Ouest</td>
									<td><?= Sondage::total_repar('departement', 'Nord-Ouest', '5_kondisyon', $value7) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Nord-Ouest', '5_kondisyon', $value7) * 100 / Query::count_prepare('sondage', $value7, '5_kondisyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Gason', '5_kondisyon', $value7) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Fanm', '5_kondisyon', $value7) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Gason', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Fanm', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Sud</td>
									<td><?= Sondage::total_repar('departement', 'Sud', '5_kondisyon', $value7) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Sud', '5_kondisyon', $value7) * 100 / Query::count_prepare('sondage', $value7, '5_kondisyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Gason', '5_kondisyon', $value7) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Fanm', '5_kondisyon', $value7) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Gason', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Fanm', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Sud-Est</td>
									<td><?= Sondage::total_repar('departement', 'Sud-Est', '5_kondisyon', $value7) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Sud-Est', '5_kondisyon', $value7) * 100 / Query::count_prepare('sondage', $value7, '5_kondisyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Gason', '5_kondisyon', $value7) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Fanm', '5_kondisyon', $value7) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Gason', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Fanm', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Ouest</td>
									<td><?= Sondage::total_repar('departement', 'Ouest', '5_kondisyon', $value7) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Ouest', '5_kondisyon', $value7) * 100 / Query::count_prepare('sondage', $value7, '5_kondisyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Gason', '5_kondisyon', $value7) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Fanm', '5_kondisyon', $value7) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Gason', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Fanm', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Centre</td>
									<td><?= Sondage::total_repar('departement', 'Centre', '5_kondisyon', $value7) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Centre', '5_kondisyon', $value7) * 100 / Query::count_prepare('sondage', $value7, '5_kondisyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Gason', '5_kondisyon', $value7) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Fanm', '5_kondisyon', $value7) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Gason', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Fanm', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Artibonite</td>
									<td><?= Sondage::total_repar('departement', 'Artibonite', '5_kondisyon', $value7) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Artibonite', '5_kondisyon', $value7) * 100 / Query::count_prepare('sondage', $value7, '5_kondisyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Gason', '5_kondisyon', $value7) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Fanm', '5_kondisyon', $value7) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Gason', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Fanm', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Nippes</td>
									<td><?= Sondage::total_repar('departement', 'Nippes', '5_kondisyon', $value7) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Nippes', '5_kondisyon', $value7) * 100 / Query::count_prepare('sondage', $value7, '5_kondisyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Gason', '5_kondisyon', $value7) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Fanm', '5_kondisyon', $value7) ?></td>

									<td><?= number_format(Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Gason', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Fanm', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>

								<tr>
									<td>Grand-Anse</td>
									<td><?= Sondage::total_repar('departement', 'Grand-Anse', '5_kondisyon', $value7) ?></td>
									<td><?= number_format(Sondage::total_repar('departement', 'Grand-Anse', '5_kondisyon', $value7) * 100 / Query::count_prepare('sondage', $value7, '5_kondisyon'), 2) ?>%</td>


									<td><?= Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Gason', '5_kondisyon', $value7) ?></td>


									<td><?= Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Fanm', '5_kondisyon', $value7) ?></td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Gason', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason') * 100, 2) ?>%</td>


									<td><?= number_format(Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Fanm', '5_kondisyon', $value7) / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm') * 100, 2) ?>%</td>
									
								</tr>
								<tr>
									<td ><b>Total</b></td>
									<td ><?= Query::count_prepare('sondage', $value7, '5_kondisyon') ?></td>
									<td>100%</td>

									<td><?= Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason'); ?></td>

									<td><?= Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm'); ?></td>

									<td><?= number_format(Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason') / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Gason') * 100, 2) ?>%</td>

									<td><?= number_format(Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm') / Sondage::repartition('5_kondisyon', '1_sexe', $value7, 'Fanm') * 100, 2) ?>%</td>

									
								</tr>
							</tbody>
						</table>
					</div>
				<?php endforeach ?>
			</div>

			<div class="col-md-12">
				<div class="col-md-12">
					<h1 class="alert alert-info"><b>Répartition par Groupe d'âge</b></h1>
				</div>
					<?php foreach ($array3 as $key => $value8) : ?>

					<div class="col-md-12">
						<h2><b><?= $value8 ?></b></h2>
							<table class="table table-bordered table-striped">
								<thead style="font-weight: bold; font-size: 18px; background-color: #c4f4f2;">
									<tr>
										<th>Groupe d'age</th>
										<th>Personne</th>
										<th>Pourcentage</th>
										<th>Homme</th>
										<th>Femme</th>
										<th>% Homme</th>
										<th>% Femme</th>
									</tr>
								</thead>

								<tbody style="font-weight: normal;">

									<tr>
										<td>18 – 24 lane</td>
									
										<td><?= Sondage::total_repar('2_group_laj', '18 – 24 lane', '5_kondisyon', $value8) ?></td>

										<td><?= number_format(Sondage::total_repar('2_group_laj', '18 – 24 lane', '5_kondisyon', $value8) / Query::count_prepare('sondage', $value8, '5_kondisyon') * 100, 2) ?>%</td>

										<td><?= Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Gason', '5_kondisyon', $value8) ?></td>

									    <td><?= Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm', '5_kondisyon', $value8) ?></td>

									    <td><?= number_format(Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Gason', '5_kondisyon', $value8) / Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Gason') * 100, 2) ?>%</td>


										<td><?= number_format(Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm', '5_kondisyon', $value8) / Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Fanm') * 100, 2) ?>%</td>

									</tr>

									<tr>
										<td>25 – 30 lane</td>
										<td><?= Sondage::total_repar('2_group_laj', '25 – 30 lane', '5_kondisyon', $value8) ?></td>

										<td><?= number_format(Sondage::total_repar('2_group_laj', '25 – 30 lane', '5_kondisyon', $value8) / Query::count_prepare('sondage', $value8, '5_kondisyon') * 100, 2) ?>%</td>

										<td><?= Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Gason', '5_kondisyon', $value8) ?></td>

									    <td><?= Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm', '5_kondisyon', $value8) ?></td>

									    <td><?= number_format(Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Gason', '5_kondisyon', $value8) / Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Gason') * 100, 2) ?>%</td>


										<td><?= number_format(Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm', '5_kondisyon', $value8) / Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Fanm') * 100, 2) ?>%</td>
									</tr>

									<tr>
										<td>31 – 35 lane</td>
										<td><?= Sondage::total_repar('2_group_laj', '31 – 35 lane', '5_kondisyon', $value8) ?></td>

										<td><?= number_format(Sondage::total_repar('2_group_laj', '31 – 35 lane', '5_kondisyon', $value8) / Query::count_prepare('sondage', $value8, '5_kondisyon') * 100, 2) ?>%</td>

										<td><?= Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Gason', '5_kondisyon', $value8) ?></td>

									    <td><?= Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm', '5_kondisyon', $value8) ?></td>

									    <td><?= number_format(Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Gason', '5_kondisyon', $value8) / Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Gason') * 100, 2) ?>%</td>


										<td><?= number_format(Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm', '5_kondisyon', $value8) / Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Fanm') * 100, 2) ?>%</td>
									</tr>

									<tr>
										<td>36 oswa plis</td>
										<td><?= Sondage::total_repar('2_group_laj', '36 oswa plis', '5_kondisyon', $value8) ?></td>

										<td><?= number_format(Sondage::total_repar('2_group_laj', '36 oswa plis', '5_kondisyon', $value8) / Query::count_prepare('sondage', $value8, '5_kondisyon') * 100, 2) ?>%</td>

										<td><?= Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Gason', '5_kondisyon', $value8) ?></td>

									    <td><?= Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Fanm', '5_kondisyon', $value8) ?></td>

									    <td><?= number_format(Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Gason', '5_kondisyon', $value8) / Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Gason') * 100, 2) ?>%</td>


										<td><?= number_format(Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Fanm', '5_kondisyon', $value8) / Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Fanm') * 100, 2) ?>%</td>
									</tr>


									<tr>
										<td ><b>Total</b></td>
										<td ><?= Query::count_prepare('sondage', $value8, '5_kondisyon') ?></td>

										<td><?= number_format(Query::count_prepare('sondage', $value8, '5_kondisyon') / Query::count_prepare('sondage', $value8, '5_kondisyon') * 100, 2) ?>%</td>

										<td><?= Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Gason') ?></td>

										<td><?= Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Fanm') ?></td>

										<td><?= number_format(Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Gason') / Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Gason') * 100, 2) ?>%</td>

										<td><?= number_format(Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Fanm') / Sondage::repartition('5_kondisyon', '1_sexe', $value8, 'Fanm') * 100, 2) ?>%</td>
									</tr>
								</tbody>
							</table>
						</div>
					<?php endforeach; ?>
				</div>


				<div class="col-md-12">

				<h1 class="alert alert-info"><b>Liste des graphes par département</b></h1>

				<?php foreach ($array3 as $key => $value9) : ?>
					<h2><b><?= $value9 ?></b></h2>
				<p>
					<i class="fa fa-square" style="color:#da0f08; "></i>  Gason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-square" style="color:#f5c20d; "></i>  Fanm
				</p>
				<?php $var9 = rand(100000, 1000000000000) . "ple"; ?>
				<canvas id="<?= $var9 ?>" style="width: 100%; height: 275px;" style="margin-bottom: 10px;"></canvas>
			        <script>
			            // line chart data
			          
			            var barData = {
			                labels : ["Nord","Nord-Est","Nord-Ouest","Sud","Sud-Est","Ouest","Centre","Artibonite","Nippes","Grand-Anse"],
			                datasets : [
			                    {
			                        fillColor : "#da0f08",
			                        strokeColor : "#da0f08",
			                        data : [<?= number_format(Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Gason', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Gason') * 100, 2) ?>,


			                        <?= number_format(Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Gason', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Gason') * 100, 2) ?>,


			                        <?= number_format(Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Gason', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Gason', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Gason', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Gason') * 100, 2) ?>,

			                       	<?= number_format(Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Gason', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Gason', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Gason', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Gason', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Gason') * 100, 2) ?>,

			                        <?= number_format(Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Gason', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Gason') * 100, 2) ?>]
			                    },
			                    {
			                        fillColor : "#f5c20d",
			                        strokeColor : "#f5c20d",
			                       data : [<?= number_format(Sondage::repartition_orther('departement', 'Nord', '1_sexe', 'Fanm', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Fanm') * 100, 2) ?>,


			                       <?= number_format(Sondage::repartition_orther('departement', 'Nord-Est', '1_sexe', 'Fanm', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Nord-Ouest', '1_sexe', 'Fanm', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Sud', '1_sexe', 'Fanm', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Sud-Est', '1_sexe', 'Fanm', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Ouest', '1_sexe', 'Fanm', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Centre', '1_sexe', 'Fanm', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Artibonite', '1_sexe', 'Fanm', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Nippes', '1_sexe', 'Fanm', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Fanm') * 100, 2) ?>,

			                       <?= number_format(Sondage::repartition_orther('departement', 'Grand-Anse', '1_sexe', 'Fanm', '5_kondisyon', $value9) / Sondage::repartition('5_kondisyon', '1_sexe', $value9, 'Fanm') * 100, 2) ?>]
			                    }
			                ]
			            }
			            // get bar chart canvas
			            var income = document.getElementById("<?= $var9 ?>").getContext("2d");
			            // draw bar chart
			            new Chart(income).Bar(barData);
			        </script></br></br>
				<?php endforeach ?>
			</div>

			<div class="col-md-12">
				<h1 class="alert alert-info"><b>Liste des graphes par groupe d'âge</b></h1>

				<?php foreach ($array3 as $key => $value10) : ?>
					<div class="col-md-6">
					<h2><b><?= $value10 ?></b></h2>
					<p>
						<i class="fa fa-square" style="color:#da0f08; "></i>  Gason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<i class="fa fa-square" style="color:#f5c20d; "></i>  Fanm
					</p>
					<?php $var11 = rand(10000, 10000000000) . "pll"; ?>
					<canvas id="<?= $var11 ?>" style="width: 100%; height: 275px; margin-bottom: 15px;"></canvas>
				        <script>
				            // line chart data
				            var barData = {
				                labels : ["18 – 24 lane","25 – 30 lane","31 – 35 lane","36 oswa plis"],
				                datasets : [
				                    {
				                    	// gason
				                        fillColor : "#da0f08",
				                        strokeColor : "#da0f08",
				                        data : [<?= number_format(Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Gason', '5_kondisyon', $value10) / Sondage::repartition('5_kondisyon', '1_sexe', $value10, 'Gason') * 100, 2) ?>,


				                        <?= number_format(Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Gason', '5_kondisyon', $value10) / Sondage::repartition('5_kondisyon', '1_sexe', $value10, 'Gason') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Gason', '5_kondisyon', $value10) / Sondage::repartition('5_kondisyon', '1_sexe', $value10, 'Gason') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Gason', '5_kondisyon', $value10) / Sondage::repartition('5_kondisyon', '1_sexe', $value10, 'Gason') * 100, 2) ?>]
				                    },
				                    {
				                    	// fanm
				                        fillColor : "#f5c20d",
				                        strokeColor : "#f5c20d",
				                       data : [<?= number_format(Sondage::repartition_orther('2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm', '5_kondisyon', $value10) / Sondage::repartition('5_kondisyon', '1_sexe', $value10, 'Fanm') * 100, 2) ?>,

				                      <?= number_format(Sondage::repartition_orther('2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm', '5_kondisyon', $value10) / Sondage::repartition('5_kondisyon', '1_sexe', $value10, 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther('2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm', '5_kondisyon', $value10) / Sondage::repartition('5_kondisyon', '1_sexe', $value10, 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther('2_group_laj', '36 oswa plis', '1_sexe', 'Fanm', '5_kondisyon', $value10) / Sondage::repartition('5_kondisyon', '1_sexe', $value10, 'Fanm') * 100, 2) ?>]
				                    }
				                ]
				            }
				            // get bar chart canvas
				            var income = document.getElementById("<?= $var11 ?>").getContext("2d");
				            // draw bar chart
				            new Chart(income).Bar(barData);
				        </script>
				  </div>

				<?php endforeach ?>
				
			</div>
		<?php endif ?>



		<?php if (isset($url[2]) and $url[2] == 'question-6') : ?>

			<div class="row">
				<div class="col-md-12">
					<div class="c-content-title-2">
						<h3 class="c-center"><b>5 Si repons ou se « non », ki rezon pèsonèl ki fè ou pa t ap al vote?</b></h3>
						<div class="c-line c-theme-bg c-theme-bg-after"></div>
					</div>	
				</div>
			</div>


				<div class="col-md-12">
					<table class="table table-bordered table-striped">
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
								<?= Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa enterese/ Mwen pa kwè nan eleksyon') ?>
								
							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa enterese/ Mwen pa kwè nan eleksyon', '1_sexe', 'Gason') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa enterese/ Mwen pa kwè nan eleksyon', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa enterese/ Mwen pa kwè nan eleksyon') * 100, 2) ?>%; background-color: #da0f08;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa enterese/ Mwen pa kwè nan eleksyon', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa enterese/ Mwen pa kwè nan eleksyon') * 100, 2) ?>%
								  	</div>
								</div>
							</td>


							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa enterese/ Mwen pa kwè nan eleksyon', '1_sexe', 'Fanm') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa enterese/ Mwen pa kwè nan eleksyon', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa enterese/ Mwen pa kwè nan eleksyon') * 100, 2) ?>%; background-color: #f5c20d;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa enterese/ Mwen pa kwè nan eleksyon', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa enterese/ Mwen pa kwè nan eleksyon') * 100, 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>


						<tr>
							<td>Senatè ak Depite yo pa itil anyen</td>
							<td>
								<?= Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Senatè ak Depite yo pa itil anyen') ?>
								
							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Senatè ak Depite yo pa itil anyen', '1_sexe', 'Gason') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Senatè ak Depite yo pa itil anyen', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Senatè ak Depite yo pa itil anyen') * 100, 2) ?>%; background-color: #da0f08;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Senatè ak Depite yo pa itil anyen', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Senatè ak Depite yo pa itil anyen') * 100, 2) ?>%
								  	</div>
								</div>
							</td>


							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Senatè ak Depite yo pa itil anyen', '1_sexe', 'Fanm') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Senatè ak Depite yo pa itil anyen', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Senatè ak Depite yo pa itil anyen') * 100, 2) ?>%; background-color: #f5c20d;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Senatè ak Depite yo pa itil anyen', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Senatè ak Depite yo pa itil anyen') * 100, 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>

						<tr>
							<td>Mwen pa kwè vòt mwen an ap konte</td>
							<td>
								<?= Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa kwè vòt mwen an ap konte') ?>
								
							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa kwè vòt mwen an ap konte', '1_sexe', 'Gason') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa kwè vòt mwen an ap konte', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa kwè vòt mwen an ap konte') * 100, 2) ?>%; background-color: #da0f08;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa kwè vòt mwen an ap konte', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa kwè vòt mwen an ap konte') * 100, 2) ?>%
								  	</div>
								</div>
							</td>


							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa kwè vòt mwen an ap konte', '1_sexe', 'Fanm') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa kwè vòt mwen an ap konte', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa kwè vòt mwen an ap konte') * 100, 2) ?>%; background-color: #f5c20d;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa kwè vòt mwen an ap konte', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Mwen pa kwè vòt mwen an ap konte') * 100, 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>

					


						<tr>
							<td><a href="" data-toggle="modal" data-target=".bs-example-modal-lg">Lòt rezon <i class="fa fa-eye"></i> </a></td>
							<td>
								<?= Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Lòt rezon') ?>
							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Lòt rezon', '1_sexe', 'Gason') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Lòt rezon', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Lòt rezon') * 100, 2) ?>%; background-color: #da0f08;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Lòt rezon', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Lòt rezon') * 100, 2) ?>%
								  	</div>
							</td>
							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Lòt rezon', '1_sexe', 'Fanm') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Lòt rezon', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Lòt rezon') * 100, 2) ?>%; background-color: #f5c20d;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', 'Lòt rezon', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', 'Lòt rezon') * 100, 2) ?>%
								  	</div>
								
							</td>
						</tr>

						</tbody>
					</table>
				</div>


				<div class="col-md-12">
				<h1 class="alert alert-info"><b>Répartition par département</b></h1>
					<?php 
				$array4 = ['Mwen pa enterese/ Mwen pa kwè nan eleksyon', 'Senatè ak Depite yo pa itil anyen', 'Mwen pa kwè vòt mwen an ap konte', 'Lòt rezon'];
				foreach ($array4 as $key => $value11) :
				?>

					<div class="col-md-12">
						<h2><b><?= $value11 ?></b> </h2>

						<table class="table table-bordered table-striped">
							<thead style="font-weight: bold; font-size: 18px; background-color: #c4f4f2;">
								<tr>
									<th>Département</th>
									<th>Personne</th>
									<th>Pourcentage</th>
									<th>Homme</th>
									<th>Femme</th>
									<th>% Homme</th>
									<th>% Femme</th>

									
								</tr>
							</thead>

							<tbody style="font-weight: normal;">

								<tr>
									<td>Nord</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
								</tr>

								<tr>
									<td>Nord-Est</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord-Est') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord-Est') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord-Est', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord-Est', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord-Est', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord-Est', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>

									
								</tr>

								<tr>
									<td>Nord-Ouest</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord-Ouest') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord-Ouest') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord-Ouest', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord-Ouest', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord-Ouest', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nord-Ouest', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Sud</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Sud') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Sud') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Sud', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Sud', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Sud', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Sud', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Sud-Est</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Sud-Est') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Sud-Est') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Sud-Est', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Sud-Est', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Sud-Est', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Sud-Est', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Ouest</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Ouest') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Ouest') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Ouest', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Ouest', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Ouest', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Ouest', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Centre</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Centre') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Centre') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Centre', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Centre', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Centre', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Centre', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Artibonite</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Artibonite') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Artibonite') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Artibonite', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Artibonite', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Artibonite', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Artibonite', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Nippes</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nippes') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nippes') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nippes', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nippes', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nippes', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Nippes', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Grand-Anse</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Grand-Anse') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Grand-Anse') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Grand-Anse', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Grand-Anse', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Grand-Anse', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value11, 'departement', 'Grand-Anse', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>
								<tr>
									<td ><b>Total</b></td>
									<td ><?= Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) ?></td>
									<td><?= number_format(Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) * 100, 2) ?> %</td>

									<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') ?></td>

									<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') ?></td>

									<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Gason') * 100, 2) ?>%</td>

									<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value11, '1_sexe', 'Fanm') * 100, 2) ?>%</td>

									
								</tr>
							</tbody>
						</table>
					</div>
				<?php endforeach ?>
			</div>


			<div class="col-md-12">
				<div class="col-md-12">
					<h1 class="alert alert-info"><b>Répartition par Groupe d'âge</b></h1>
				</div>
					<?php foreach ($array4 as $key => $value12) : ?>

					<div class="col-md-12">
						<h2><b><?= $value12 ?></b></h2>
							<table class="table table-bordered table-striped">
								<thead style="font-weight: bold; font-size: 18px; background-color: #c4f4f2;">
									<tr>
										<th>Groupe d'age</th>
										<th>Personne</th>
										<th>Pourcentage</th>
										<th>Homme</th>
										<th>Femme</th>
										<th>% Homme</th>
										<th>% Femme</th>
									</tr>
								</thead>

								<tbody style="font-weight: normal;">

									<tr>
										<td>18 – 24 lane</td>
									
										<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '18 – 24 lane') ?></td>

										<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '18 – 24 lane') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value12) * 100, 2) ?>%</td>

										<td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '18 – 24 lane', '1_sexe', 'Gason') ?></td>

									   <td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm') ?></td>

									    <td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '18 – 24 lane', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Gason') * 100, 2) ?>%</td>


										<td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Fanm') * 100, 2) ?>%</td>

									</tr>

									<tr>
										<td>25 – 30 lane</td>
										<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '25 – 30 lane') ?></td>

										<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '25 – 30 lane') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value12) * 100, 2) ?>%</td>

										<td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '25 – 30 lane', '1_sexe', 'Gason') ?></td>

									   <td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm') ?></td>

									    <td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '25 – 30 lane', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Gason') * 100, 2) ?>%</td>


										<td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Fanm') * 100, 2) ?>%</td>
									</tr>

									<tr>
										<td>31 – 35 lane</td>
										<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '31 – 35 lane') ?></td>

										<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '31 – 35 lane') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value12) * 100, 2) ?>%</td>

										<td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '31 – 35 lane', '1_sexe', 'Gason') ?></td>

									   <td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm') ?></td>

									    <td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '31 – 35 lane', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Gason') * 100, 2) ?>%</td>


										<td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Fanm') * 100, 2) ?>%</td>
									</tr>

									<tr>
										<td>36 oswa plis</td>
										<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '36 oswa plis') ?></td>

										<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '36 oswa plis') / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value12) * 100, 2) ?>%</td>

										<td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '36 oswa plis', '1_sexe', 'Gason') ?></td>

									   <td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '36 oswa plis', '1_sexe', 'Fanm') ?></td>

									    <td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '36 oswa plis', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Gason') * 100, 2) ?>%</td>


										<td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '2_group_laj', '36 oswa plis', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Fanm') * 100, 2) ?>%</td>
									</tr>


									<tr>
										<td ><b>Total</b></td>
										<td ><?= Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value12) ?></td>

										<td><?= number_format(Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value11) / Sondage::total_repar('5_kondisyon', 'Non', '5_1_repons_vote', $value12) * 100, 2) ?> %</td>

										<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Gason') ?></td>

										<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Fanm') ?></td>

										<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Gason') * 100, 2) ?>%</td>

										<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value12, '1_sexe', 'Fanm') * 100, 2) ?>%</td>
									</tr>
								</tbody>
							</table>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="col-md-12">

				<h1 class="alert alert-info"><b>Liste des graphes par département</b></h1>

				<?php foreach ($array4 as $value13) : ?>
					<h2><b><?= $value13 ?></b></h2>
				<p>
					<i class="fa fa-square" style="color:#da0f08; "></i>  Gason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-square" style="color:#f5c20d; "></i>  Fanm
				</p>
				<?php $var12 = rand(100000, 1000000000000) . "plxxe"; ?>
				<canvas id="<?= $var12 ?>" style="width: 100%; height: 275px;" style="margin-bottom: 10px;"></canvas>


			        <script>
			            // line chart data
			          
			            var barData = {
			                labels : ["Nord","Nord-Est","Nord-Ouest","Sud","Sud-Est","Ouest","Centre","Artibonite","Nippes","Grand-Anse"],
			                datasets : [
			                    {
			                        fillColor : "#da0f08",
			                        strokeColor : "#da0f08",
			                       data : [<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Nord', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Nord-Est', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Nord-Ouest', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Sud', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Sud-Est', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Ouest', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Centre', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Artibonite', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Nippes', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Grand-Anse', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Gason') * 100, 2) ?>
			                       ]
			                    },
			                    {
			                        fillColor : "#f5c20d",
			                        strokeColor : "#f5c20d",
			                       data : [<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Nord', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Nord-Est', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Nord-Ouest', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Sud', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Sud-Est', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Ouest', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Centre', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Artibonite', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Nippes', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value13, 'departement', 'Grand-Anse', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value13, '1_sexe', 'Fanm') * 100, 2) ?>]
			                    }
			                ]
			            }
			            // get bar chart canvas
			            var income = document.getElementById("<?= $var12 ?>").getContext("2d");
			            // draw bar chart
			            new Chart(income).Bar(barData);
			        </script></br></br>
				<?php endforeach ?>
			</div>


			<div class="col-md-12">
				<h1 class="alert alert-info"><b>Liste des graphes par groupe d'âge</b></h1>

				<?php foreach ($array4 as $key => $value14) : ?>
					<div class="col-md-6">
					<h2><b><?= $value14 ?></b></h2>
					<p>
						<i class="fa fa-square" style="color:#da0f08; "></i>  Gason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<i class="fa fa-square" style="color:#f5c20d; "></i>  Fanm
					</p>
					<?php $var14 = rand(10000, 10000000000) . "pl4l"; ?>
					<canvas id="<?= $var14 ?>" style="width: 100%; height: 275px; margin-bottom: 15px;"></canvas>
				        <script>
				            // line chart data
				            var barData = {
				                labels : ["18 – 24 lane","25 – 30 lane","31 – 35 lane","36 oswa plis"],
				                datasets : [
				                    {
				                    	// gason
				                        fillColor : "#da0f08",
				                        strokeColor : "#da0f08",
				                        data : [<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '2_group_laj', '18 – 24 lane', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '1_sexe', 'Gason') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '2_group_laj', '25 – 30 lane', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '1_sexe', 'Gason') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '2_group_laj', '31 – 35 lane', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '1_sexe', 'Gason') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '2_group_laj', '36 oswa plis', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '1_sexe', 'Gason') * 100, 2) ?>

				                        ]
				                    },
				                    {
				                    	// fanm
				                        fillColor : "#f5c20d",
				                        strokeColor : "#f5c20d",
				                       data : [

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '1_sexe', 'Fanm') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '1_sexe', 'Fanm') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '1_sexe', 'Fanm') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '2_group_laj', '36 oswa plis', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '5_1_repons_vote', $value14, '1_sexe', 'Fanm') * 100, 2) ?>]
				                    }
				                ]
				            }
				            // get bar chart canvas
				            var income = document.getElementById("<?= $var14 ?>").getContext("2d");
				            // draw bar chart
				            new Chart(income).Bar(barData);
				        </script>
				  </div>

				<?php endforeach ?>
				
			</div>
		<?php endif ?>

		<?php if (isset($url[2]) and $url[2] == 'question-7') : ?>

			<div class="row">
				<div class="col-md-12">
					<div class="c-content-title-2">
						<h3 class="c-center"><b>6. Ki lòt sitiyasyon ki ta fè ou pa t ap al vote, menmsi tout kondisyon te reyini jodia pou peyi a òganize eleksyon pou Senatè ak Depite</b></h3>
						<div class="c-line c-theme-bg c-theme-bg-after"></div>
					</div>	
				</div>
			</div>


			<div class="col-md-12">
					<table class="table table-bordered table-striped">
						<tbody>
						<tr>
							<th>Kondisyon yo</th>
							<th>Kantite repons</th>
							<th>Gason</th>
							<th>Fanm</th>
						</tr>

						

						<tr>
							<td>Mwen pa gen kat elektoral</td>
							<td>
								<?= Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Mwen pa gen kat elektoral') ?>
								
							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Mwen pa gen kat elektoral', '1_sexe', 'Gason') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Mwen pa gen kat elektoral', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Mwen pa gen kat elektoral') * 100, 2) ?>%; background-color: #da0f08;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Mwen pa gen kat elektoral', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Mwen pa gen kat elektoral') * 100, 2) ?>%
								  	</div>
								</div>
							</td>


							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Mwen pa gen kat elektoral', '1_sexe', 'Fanm') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Mwen pa gen kat elektoral', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Mwen pa gen kat elektoral') * 100, 2) ?>%; background-color: #f5c20d;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Mwen pa gen kat elektoral', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Mwen pa gen kat elektoral') * 100, 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>


						<tr>
							<td>Akoz voylans/ Ensekirite</td>
							<td>
								<?= Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Akoz voylans/ Ensekirite') ?>
								
							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Akoz voylans/ Ensekirite', '1_sexe', 'Gason') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Akoz voylans/ Ensekirite', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Akoz voylans/ Ensekirite') * 100, 2) ?>%; background-color: #da0f08;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Akoz voylans/ Ensekirite', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Akoz voylans/ Ensekirite') * 100, 2) ?>%
								  	</div>
								</div>
							</td>


							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Akoz voylans/ Ensekirite', '1_sexe', 'Fanm') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Akoz voylans/ Ensekirite', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Akoz voylans/ Ensekirite') * 100, 2) ?>%; background-color: #f5c20d;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Akoz voylans/ Ensekirite', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Akoz voylans/ Ensekirite') * 100, 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>



						<tr>
							<td>Pa gen akò politik ant aktè yo</td>
							<td>
								<?= Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Pa gen akò politik ant aktè yo') ?>
								
							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Pa gen akò politik ant aktè yo', '1_sexe', 'Gason') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Pa gen akò politik ant aktè yo', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Pa gen akò politik ant aktè yo') * 100, 2) ?>%; background-color: #da0f08;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Pa gen akò politik ant aktè yo', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Pa gen akò politik ant aktè yo') * 100, 2) ?>%
								  	</div>
								</div>
							</td>


							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Pa gen akò politik ant aktè yo', '1_sexe', 'Fanm') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Pa gen akò politik ant aktè yo', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Pa gen akò politik ant aktè yo') * 100, 2) ?>%; background-color: #f5c20d;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Pa gen akò politik ant aktè yo', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Pa gen akò politik ant aktè yo') * 100, 2) ?>%
								  	</div>
								</div>
							</td>
						</tr>

						


						<tr>
							<td><a href="" data-toggle="modal" data-target=".bs-example-modal-lg1">Lòt rezon <i class="fa fa-eye"></i> </a></td>
							<td>
								<?= Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Lòt rezon') ?>
							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Lòt rezon', '1_sexe', 'Gason') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Lòt rezon', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Lòt rezon') * 100, 2) ?>%; background-color: #da0f08;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Lòt rezon', '1_sexe', 'Gason') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Lòt rezon') * 100, 2) ?>%
								  	</div>
							</td>
							<td>
								<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Lòt rezon', '1_sexe', 'Fanm') ?>
								
								<div class="progress">
								  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Lòt rezon', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Lòt rezon') * 100, 2) ?>%; background-color: #f5c20d;">


								    	<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', 'Lòt rezon', '1_sexe', 'Fanm') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', 'Lòt rezon') * 100, 2) ?>%
								  	</div>
								
							</td>
						</tr>

						</tbody>
					</table>
				</div>



					<div class="col-md-12">
				<h1 class="alert alert-info"><b>Répartition par département</b></h1>
					<?php 
				$array5 = ['Mwen pa gen kat elektoral', 'Akoz voylans/ Ensekirite', 'Pa gen akò politik ant aktè yo', 'Lòt rezon'];
				foreach ($array5 as $key => $value16) :
				?>

					<div class="col-md-12">
						<h2><b><?= $value16 ?></b> </h2>

						<table class="table table-bordered table-striped">
							<thead style="font-weight: bold; font-size: 18px; background-color: #c4f4f2;">
								<tr>
									<th>Département</th>
									<th>Personne</th>
									<th>Pourcentage</th>
									<th>Homme</th>
									<th>Femme</th>
									<th>% Homme</th>
									<th>% Femme</th>

									
								</tr>
							</thead>

							<tbody style="font-weight: normal;">

								<tr>
									<td>Nord</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '	6_stiyasyon', $value16, 'departement', 'Nord') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
								</tr>

								<tr>
									<td>Nord-Est</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord-Est') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord-Est') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord-Est', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord-Est', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord-Est', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord-Est', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>

									
								</tr>

								<tr>
									<td>Nord-Ouest</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord-Ouest') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord-Ouest') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord-Ouest', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord-Ouest', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord-Ouest', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nord-Ouest', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Sud</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Sud') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Sud') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Sud', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Sud', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Sud', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Sud', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Sud-Est</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Sud-Est') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Sud-Est') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Sud-Est', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Sud-Est', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Sud-Est', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Sud-Est', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Ouest</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Ouest') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Ouest') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Ouest', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Ouest', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Ouest', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Ouest', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Centre</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Centre') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Centre') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Centre', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Centre', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Centre', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Centre', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Artibonite</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Artibonite') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Artibonite') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Artibonite', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Artibonite', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Artibonite', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Artibonite', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Nippes</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nippes') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nippes') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nippes', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nippes', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nippes', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Nippes', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>

								<tr>
									<td>Grand-Anse</td>
									<td>
										<?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Grand-Anse') ?>
									<td>
										<?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Grand-Anse') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) * 100, 2) ?>%
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Grand-Anse', '1_sexe', 'Gason') ?>
									</td>


									<td>
										<?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Grand-Anse', '1_sexe', 'Fanm') ?>
									</td>

									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Grand-Anse', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') * 100, 2) ?>%
									</td>


									<td>
										<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value16, 'departement', 'Grand-Anse', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') * 100, 2) ?>%
									</td>
									
								</tr>
								<tr>
									<td ><b>Total</b></td>
									<td ><?= Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) ?></td>
									<td><?= number_format(Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value16) * 100, 2) ?> %</td>

									<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') ?></td>

									<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') ?></td>

									<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Gason') * 100, 2) ?>%</td>

									<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value16, '1_sexe', 'Fanm') * 100, 2) ?>%</td>

									
								</tr>
							</tbody>
						</table>
					</div>
				<?php endforeach ?>
			</div>


				<div class="col-md-12">
				<div class="col-md-12">
					<h1 class="alert alert-info"><b>Répartition par Groupe d'âge</b></h1>
				</div>
					<?php foreach ($array5 as $key => $value17) : ?>

					<div class="col-md-12">
						<h2><b><?= $value17 ?></b></h2>
							<table class="table table-bordered table-striped">
								<thead style="font-weight: bold; font-size: 18px; background-color: #c4f4f2;">
									<tr>
										<th>Groupe d'age</th>
										<th>Personne</th>
										<th>Pourcentage</th>
										<th>Homme</th>
										<th>Femme</th>
										<th>% Homme</th>
										<th>% Femme</th>
									</tr>
								</thead>

								<tbody style="font-weight: normal;">

									<tr>
										<td>18 – 24 lane</td>
									
										<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '18 – 24 lane') ?></td>

										<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '18 – 24 lane') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value17) * 100, 2) ?>%</td>

										<td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '18 – 24 lane', '1_sexe', 'Gason') ?></td>

									   <td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm') ?></td>

									    <td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '18 – 24 lane', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Gason') * 100, 2) ?>%</td>


										<td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Fanm') * 100, 2) ?>%</td>

									</tr>

									<tr>
										<td>25 – 30 lane</td>
										<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '25 – 30 lane') ?></td>

										<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '25 – 30 lane') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value17) * 100, 2) ?>%</td>

										<td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '25 – 30 lane', '1_sexe', 'Gason') ?></td>

									   <td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm') ?></td>

									    <td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '25 – 30 lane', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Gason') * 100, 2) ?>%</td>


										<td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Fanm') * 100, 2) ?>%</td>
									</tr>

									<tr>
										<td>31 – 35 lane</td>
										<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '31 – 35 lane') ?></td>

										<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '31 – 35 lane') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value17) * 100, 2) ?>%</td>

										<td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '31 – 35 lane', '1_sexe', 'Gason') ?></td>

									   <td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm') ?></td>

									    <td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '31 – 35 lane', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Gason') * 100, 2) ?>%</td>


										<td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Fanm') * 100, 2) ?>%</td>
									</tr>

									<tr>
										<td>36 oswa plis</td>
										<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '36 oswa plis') ?></td>

										<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '36 oswa plis') / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value17) * 100, 2) ?>%</td>

										<td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '36 oswa plis', '1_sexe', 'Gason') ?></td>

									   <td><?= Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '36 oswa plis', '1_sexe', 'Fanm') ?></td>

									    <td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '36 oswa plis', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Gason') * 100, 2) ?>%</td>


										<td><?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value17, '2_group_laj', '36 oswa plis', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Fanm') * 100, 2) ?>%</td>
									</tr>


									<tr>
										<td ><b>Total</b></td>
										<td ><?= Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value17) ?></td>

										<td><?= number_format(Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value17) / Sondage::total_repar('5_kondisyon', 'Non', '6_stiyasyon', $value17) * 100, 2) ?> %</td>

										<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Gason') ?></td>

										<td><?= Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Fanm') ?></td>

										<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Gason') * 100, 2) ?>%</td>

										<td><?= number_format(Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value17, '1_sexe', 'Fanm') * 100, 2) ?>%</td>
									</tr>
								</tbody>
							</table>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="col-md-12">

				<h1 class="alert alert-info"><b>Liste des graphes par département</b></h1>

				<?php foreach ($array5 as $value18) : ?>
					<h2><b><?= $value18 ?></b></h2>
				<p>
					<i class="fa fa-square" style="color:#da0f08; "></i>  Gason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-square" style="color:#f5c20d; "></i>  Fanm
				</p>
				<?php $var13 = rand(1000000, 1000000000000) . "plxxke"; ?>
				<canvas id="<?= $var13 ?>" style="width: 100%; height: 275px;" style="margin-bottom: 10px;"></canvas>


			        <script>
			            // line chart data
			          
			            var barData = {
			                labels : ["Nord","Nord-Est","Nord-Ouest","Sud","Sud-Est","Ouest","Centre","Artibonite","Nippes","Grand-Anse"],
			                datasets : [
			                    {
			                        fillColor : "#da0f08",
			                        strokeColor : "#da0f08",
			                       data : [<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Nord', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Nord-Est', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Nord-Ouest', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Sud', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Sud-Est', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Ouest', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Centre', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Artibonite', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Nippes', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Gason') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Grand-Anse', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Gason') * 100, 2) ?>
			                       ]
			                    },
			                    {
			                        fillColor : "#f5c20d",
			                        strokeColor : "#f5c20d",
			                       data : [<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Nord', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Nord-Est', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Nord-Ouest', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Sud', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Sud-Est', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Ouest', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Centre', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Artibonite', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Nippes', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Fanm') * 100, 2) ?>,

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value18, 'departement', 'Grand-Anse', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value18, '1_sexe', 'Fanm') * 100, 2) ?>]
			                    }
			                ]
			            }
			            // get bar chart canvas
			            var income = document.getElementById("<?= $var13 ?>").getContext("2d");
			            // draw bar chart
			            new Chart(income).Bar(barData);
			        </script></br></br>
				<?php endforeach ?>
			</div>

			<div class="col-md-12">
				<h1 class="alert alert-info"><b>Liste des graphes par groupe d'âge</b></h1>

				<?php foreach ($array5 as $key => $value19) : ?>
					<div class="col-md-6">
					<h2><b><?= $value19 ?></b></h2>
					<p>
						<i class="fa fa-square" style="color:#da0f08; "></i>  Gason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<i class="fa fa-square" style="color:#f5c20d; "></i>  Fanm
					</p>
					<?php $var18 = rand(10000, 100000000000) . "pl4kdl"; ?>
					<canvas id="<?= $var18 ?>" style="width: 100%; height: 275px; margin-bottom: 15px;"></canvas>
				        <script>
				            // line chart data
				            var barData = {
				                labels : ["18 – 24 lane","25 – 30 lane","31 – 35 lane","36 oswa plis"],
				                datasets : [
				                    {
				                    	// gason
				                        fillColor : "#da0f08",
				                        strokeColor : "#da0f08",
				                        data : [<?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value19, '2_group_laj', '18 – 24 lane', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value19, '1_sexe', 'Gason') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value19, '2_group_laj', '25 – 30 lane', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value19, '1_sexe', 'Gason') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value19, '2_group_laj', '31 – 35 lane', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value19, '1_sexe', 'Gason') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value19, '2_group_laj', '36 oswa plis', '1_sexe', 'Gason') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value19, '1_sexe', 'Gason') * 100, 2) ?>

				                        ]
				                    },
				                    {
				                    	// fanm
				                        fillColor : "#f5c20d",
				                        strokeColor : "#f5c20d",
				                       data : [

				                       <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value19, '2_group_laj', '18 – 24 lane', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value19, '1_sexe', 'Fanm') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value19, '2_group_laj', '25 – 30 lane', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value19, '1_sexe', 'Fanm') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value19, '2_group_laj', '31 – 35 lane', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value19, '1_sexe', 'Fanm') * 100, 2) ?>,

				                        <?= number_format(Sondage::repartition_orther2('5_kondisyon', 'Non', '6_stiyasyon', $value19, '2_group_laj', '36 oswa plis', '1_sexe', 'Fanm') / Sondage::repartition_orther('5_kondisyon', 'Non', '6_stiyasyon', $value19, '1_sexe', 'Fanm') * 100, 2) ?>]
				                    }
				                ]
				            }
				            // get bar chart canvas
				            var income = document.getElementById("<?= $var18 ?>").getContext("2d");
				            // draw bar chart
				            new Chart(income).Bar(barData);
				        </script>
				  </div>

				<?php endforeach ?>
				
			</div>
		<?php endif ?>




				


				<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content c-square">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
								<h4 class="modal-title" id="myLargeModalLabel">Lòt rezon yo</h4>
							</div>
							<div class="modal-body">
								<table class="table table-bordered table-striped">
									<thead>
									<tr>
										<th style="text-align: center; background-color: #20b2aa; color: white;"><label  class="col-md-12"><b>Si repons ou se « non », ki rezon pèsonèl ki fè ou pa t ap al vote? (chwazi sèlman yon repons).</b> </label></th>
									</tr>
									</thead>
									<tbody>
									
									<?php foreach (Query::liste_prepare('sondage', 'Lòt rezon', '5_1_repons_vote') as $question_5) : ?>
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
								<table class="table table-bordered table-striped">
									<thead>
									<tr>
										<th style="text-align: center; background-color: #20b2aa; color: white;"><label  class="col-md-12"><b>Ki lòt sitiyasyon ki ta fè ou pa t ap al vote, menmsi tout kondisyon te reyini jodia pou peyi a òganize eleksyon pou Senatè ak Depite</b> </label></th>
									</tr>
									</thead>
									<tbody>
									<?php foreach (Query::liste_prepare('sondage', 'Lòt rezon', '6_stiyasyon') as $question_6) : ?>
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
<script src="<?= $link ?>/assets/demos/default/js/scripts/pages/faq.js" type="text/javascript"></script>

<script type="text/javascript">
	
</script>

</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
