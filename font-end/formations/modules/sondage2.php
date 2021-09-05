<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Sondage.php'); ?>
<?php Fonctions::redirect();?>
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
<title>Questionnaire introductif <?= $module->titre ?></title>

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
<?php banner('Formation'); ?>
<div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style=" background-color: #26a8b4; background-image: url(<?= $link ?>/asskets/base/img/layout/banner.jpg); ">
	<div class="container">
		<div class="c-page-title c-pull-left">
			<h3 class="c-font-uppercase c-font-bold c-font-white c-font-29 c-font-slim" style="line-height: 35px; font-size: 25px;"><?= $formation->titre ?></h3>
			<h3 class=" c-font-tlhin" style="color: yellow;">Questionnaire de conclusion </h3>
		</div>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
</div>

<div class="container">
		<?php include('admin/includes/flash.php'); ?>
			<div class="row">
				<!-- BEGIN: ADDRESS FORM -->
				<div class="col-md-12 c-padding-20" style="border: 1px solid silver;">
					<h3 class="c-font-bold c-font-uppercase c-font-24 alert alert-primary" style="color: #26a8b4; text-align: center;">Kesyonè pou finisman fòmasyon an</h3>

					<?php $test_count=Query::count_prepare('sondage2',$_SESSION['id_user'],'id_participant');?>
					<?php if($test_count): ?>
						<center>
							<p class="alert alert-success">Vous avez déjà rempli ce formulaire</p>
							<a href="<?= $link_menu ?>/cours/18041">
								<button class="btn btn-primary btn-lg">Voir les modules</button>
							</a>
						</center>
					<?php endif ?>
					
					<?php if(!$test_count): ?>
					<div class="col-md-12">
						<?php include('admin/includes/flash.php'); ?>

		    		<?php
		    			if(isset($_POST['valider'])){
		    				extract($_POST);
		    				if (!isset($vote) OR !isset($sitiyasyon)) {
		    					$sitiyasyon='';
		    					$vote='';

		    				}
		    				Sondage::add($_SESSION['id_user'],$sexe,$gwoup,$enterese,$kondisyon,$vote,$rezon_vote,$sitiyasyon,$rezon_sitiyasyon_vote);
		    			}
		    		?>
						<form action="" method="POST">
	    				<div class="form-group" >
							<label  class="col-md-12"><b>1.	Sèks ou</b> </label>
						   	<div class="col-md-12">
						  		<div class="radio">
								  <label>
								    <input type="radio" name="sexe" value="Gason"  id="optionsRadios1" <?php if(isset($_POST['sexe']) AND $_POST['sexe']=='Gason'){echo "checked";} ?>>
								    Gason 
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" value="Fanm" name="sexe" <?php if(isset($_POST['sexe']) AND $_POST['sexe']=='Fanm'){echo "checked";} ?> id="optionsRadios2" required="">
								     Fanm
								  </label>
								</div>
						    </div>
						</div>
	    			</div>

	    			<div class="col-md-12 row c-border-top">
	    				<div class="form-group">
							<label  class="col-md-12 control-label"><b>2. Nan ki gwoup laj ou ye?</b> </label>
						   	<div class="col-md-12">
						  		<div class="radio">
								  <label>
								    <input type="radio" name="gwoup" value="18 – 24 lane" <?php if(isset($_POST['mwayen']) AND $_POST['gwoup']=='18 – 24 lane'){echo "checked";} ?> id="optionsRadios1" required="">
								    18 – 24 lane
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="gwoup" value="25 – 30 lane" <?php if(isset($_POST['mwayen']) AND $_POST['gwoup']=='25 – 30 lane'){echo "checked";} ?> id="optionsRadios2" required="">
								     25 – 30 lane
								  </label>
								</div>

								<div class="radio">
								  <label>
								    <input type="radio" name="gwoup" value="31 – 35 lane" <?php if(isset($_POST['mwayen']) AND $_POST['gwoup']=='31 – 35 lane'){echo "checked";} ?> id="optionsRadios2" required="">
								     31 – 35 lane
								  </label>
								</div>

								<div class="radio">
								  <label>
								    <input type="radio" name="gwoup" value="36 oswa plis" <?php if(isset($_POST['mwayen']) AND $_POST['gwoup']=='36 oswa plis'){echo "checked";} ?> id="optionsRadios2" required="">
								     36 oswa plis
								  </label>
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
	    				<div class="form-group">
							<label  class="col-md-12 control-label"><b>4.	Jiska ki pwen ou enterese nan zafè politik peyi a pou moman sa?    </b> </label>
						   	<div class="col-md-12">
						  		<div class="radio">
								  <label>
								    <input type="radio" name="enterese" value="Enterese anpil" <?php if(isset($_POST['enterese']) AND $_POST['enterese']=='Enterese anpil'){echo "checked";} ?> id="optionsRadios1" required="">
								    Enterese anpil
								  </label>
								</div>

								<div class="radio">
								  <label>
								    <input type="radio" name="enterese"  value="Enterese" <?php if(isset($_POST['enterese']) AND $_POST['enterese']=='Enterese'){echo "checked";} ?> id="optionsRadios1" required="">
								    Enterese 
								  </label>
								</div>

								<div class="radio">
								  <label>
								    <input type="radio" name="enterese" value="Enterese yon tikras" <?php if(isset($_POST['enterese']) AND $_POST['enterese']=='Enterese yon tikras'){echo "checked";} ?> id="optionsRadios1" required="">
								    Enterese yon tikras
								  </label>
								</div>

								<div class="radio">
								  <label>
								    <input type="radio" name="enterese"  value="Pa enterese di tou" <?php if(isset($_POST['enterese']) AND $_POST['enterese']=='Pa enterese di tou'){echo "checked";} ?> id="optionsRadios1" required="">
								    Pa enterese di tou
								  </label>
								</div>
						    </div>
						</div>
	    			</div>

	    			<div class="col-md-12 row c-border-top">
	    				<div class="form-group">
							<label  class="col-md-12 control-label"><b>5. Si tout kondisyon te reyini jodia pou peyi a òganize eleksyon pou Senatè ak Depite, èske w t ap deside al vote?   </b> </label>
						   	<div class="col-md-12">
						  		<div class="radio">
								  <label>
								    <input type="radio" name="kondisyon" value="Wi" <?php if(isset($_POST['kondisyon']) AND $_POST['kondisyon']=='Wi'){echo "checked";} ?> id="optionsRadios1" required="">
								    Wi
								  </label>
								</div>

								<div class="radio">
								  <label>
								    <input type="radio" name="kondisyon" value="Non" <?php if(isset($_POST['kondisyon']) AND $_POST['kondisyon']=='Non'){echo "checked";} ?> id="optionsRadios1" required="">
								    Non 
								  </label>
								</div>
						    </div>
						</div>
	    			</div>

	    			<div class="col-md-12 row c-border-top">
	    				<div class="form-group col-md-12">
							<div class="row">
								<div class="col-md-12">
								<label class="control-label"> <b>5.1.	Si repons ou se « non », ki rezon pèsonèl ki fè ou pa t ap al vote? (chwazi sèlman yon repons). </b></label>
							</div>
							</div>

							<div class="col-md-12">
							<input type="radio" value="Mwen pa enterese/ Mwen pa kwè nan eleksyon" id="radio11" class="c-rkadio" name="vote" <?php if(isset($_POST['vote']) AND $_POST['vote']=='Mwen pa enterese/ Mwen pa kwè nan eleksyon'){echo "checked";} ?>>
								<label for="radio11">
									<span class="inc"></span>
									<span class="check"></span>
									<span class="box"></span>
									Mwen pa enterese/ Mwen pa kwè nan eleksyon 
								</label>
							</div>

							<div class="col-md-12">
							<input type="radio" value="Senatè ak Depite yo pa itil anyen" id="radio11" class="c-rkadio" name="vote" <?php if(isset($_POST['vote']) AND $_POST['vote']=='Senatè ak Depite yo pa itil anyen'){echo "checked";} ?> >
								<label for="radio11">
									<span class="inc"></span>
									<span class="check"></span>
									<span class="box"></span>
									Senatè ak Depite yo pa itil anyen 
								</label>
							</div>

							<div class="col-md-12">
							<input type="radio" value="Mwen pa kwè vòt mwen an ap konte" id="radio11" class="c-rkadio" name="vote" <?php if(isset($_POST['vote']) AND $_POST['vote']=='Mwen pa kwè vòt mwen an ap konte'){echo "checked";} ?> >
								<label for="radio11">
									<span class="inc"></span>
									<span class="check"></span>
									<span class="box"></span>
									Mwen pa kwè vòt mwen an ap konte 
								</label>
							</div>

							<div class="col-md-12">
								<div class="c-checkbox c-toggle-hide" data-object-selector="c-account" data-animation-speed="600">
								<div class="c-radio">
									<input type="radio" id="radio1" value="Lòt rezon" name="vote" class="c-check" <?php if(isset($_POST['Lòt rezon']) AND $_POST['Lòt rezon']=='Lòt rezon'){echo "checked";} ?>>
									<label for="radio1">
										<span class="inc"></span>
										<span class="check"></span>
										<span class="box"></span>
										Lòt rezon
									</label>
								</div>
								</div>
							</div>
						</div>

						<div class="row c-account">
							<div class="form-group col-md-12">
								<label class="control-label"><i>ekri rezon an isit la: ?</i> </label>
								<input type="text" name="rezon_vote" data-parsley-maxlength="250" class="form-control" placeholder="Mete rezon an la" value="<?php if(isset($_POST['rezon_vote'])){echo $_POST['rezon_vote'];} ?>">
							</div>
						</div>

						<div class="col-md-12 row c-border-top">
							<div class="form-group col-md-12">
								<div class="row">
									<div class="col-md-12">
									<label class="control-label"> <b> 6. Ki lòt sitiyasyon ki ta fè ou pa t ap al vote, menmsi tout kondisyon te reyini jodia pou  peyi a òganize eleksyon pou Senatè ak Depite (Chwazi sèlman yon repons). </b></label>
								</div>
								</div>

								<div class="col-md-12">
								<input type="radio" value="Mwen pa gen kat elektoral" id="radio11" class="c-rkadio" name="sitiyasyon" <?php if(isset($_POST['sitiyasyon']) AND $_POST['sitiyasyon']=='Mwen pa gen kat elektoral'){echo "checked";} ?>>
									<label for="radio11">
										<span class="inc"></span>
										<span class="check"></span>
										<span class="box"></span>
										Mwen pa gen kat elektoral 
									</label>
								</div>

								<div class="col-md-12">
								<input type="radio" value="Akoz voylans/ Ensekirite" id="radio11" class="c-rkadio" name="sitiyasyon" <?php if(isset($_POST['sitiyasyon']) AND $_POST['sitiyasyon']=='Akoz voylans/ Ensekirite'){echo "checked";} ?>>
									<label for="radio11">
										<span class="inc"></span>
										<span class="check"></span>
										<span class="box"></span>
										Akoz voylans/ Ensekirite
									</label>
								</div>

								<div class="col-md-12">
								<input type="radio" value="Pa gen akò politik ant aktè yo" id="radio11" class="c-rkadio" name="sitiyasyon" <?php if(isset($_POST['sitiyasyon']) AND $_POST['sitiyasyon']=='Pa gen akò politik ant aktè yo'){echo "checked";} ?> >
									<label for="radio11">
										<span class="inc"></span>
										<span class="check"></span>
										<span class="box"></span>
										Pa gen akò politik ant aktè yo 
									</label>
								</div>


								<div class="col-md-12">
									<div class="c-checkbox c-toggle-hide" data-object-selector="c-account1" data-animation-speed="600">
									<div class="c-radio">
										<input type="radio" id="radio145" value="Lòt rezon" name="sitiyasyon" class="c-check" <?php if(isset($_POST['sitiyasyon']) AND $_POST['sitiyasyon']=='Lòt rezon'){echo "checked";} ?>>
										<label for="radio145">
											<span class="inc"></span>
											<span class="check"></span>
											<span class="box"></span>
											Lòt rezon
										</label>
									</div>
									</div>
								</div>

								<div class="row c-account1">
									<div class="form-group col-md-12">
										<label class="control-label"><i>ekri rezon an isit la</i>  </label>
										<input type="text" name="rezon_sitiyasyon_vote" data-parsley-maxlength="250" class="form-control" placeholder="Mete rezon an la" value="<?php if(isset($_POST['sitiyasyon_vote'])){echo $_POST['rezon_sitiyasyon_vote'];} ?>" >
									</div>
								</div>
							</div>
						</div>
	    			</div>

	    			<div class="row c-border-top">
	    				<div class="col-md-12">
	    					<button type="submit" name="valider" class="btn btn-primary btn-lg"> <i class="fa fa-save"></i>  Soumettre</button>
	    				</div>
	    			</div>
	    			</form>
	    		</div>
	    	<?php endif; ?>

				</div>
				<!-- END: ORDER FORM -->
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
