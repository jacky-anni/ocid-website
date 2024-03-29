<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Module.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<?php include('admin/class/Quiz.php'); ?>
<?php Fonctions::redirect();?>
<!DOCTYPE html>
<html lang="en"  >
<?php 
// selectionner la formation
	$formation=Query::affiche('formation',$url[1],'id');
	if (!$formation) {
		Fonctions::set_flash("Cette formation n'existe pas",'warning');
		echo "<script>window.location ='$link_menu/formations';</script>";
	}
	// selectionner le module
	$module=Query::affiche('module_formation',$url[2],'id');
	$quiz1=Query::affiche('quiz',$module->id,'id_module');

	if (!$module) {
		// Fonctions::set_flash("Cette formation n'existe pas",'warning');
		echo "<script>window.location ='$link_menu/formations';</script>";
	}

	// verfier la note
	$note= Quiz::resultat_quiz($_SESSION['id_user'],$module->id);

	if($quiz1->nom!='Questionnaire introductif')
	{
		// verifier si la note est superieur a 60
		if ($note>60) {
			// Fonctions::set_flash("Cette formation n'existe pas",'warning');
			echo "<script>window.location ='$link_menu/resultat-quiz/$url[1]/$module->id/$quiz1->id';</script>";
		}
	}
	


?>
<title>Quiz - <?= $module->titre ?></title>

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
			<h3 class=" c-font-tlhin" style="color: yellow;">Quiz - <?= $module->titre ?></h3>
		</div>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
</div>



<div class="c-content-box c-size-md">
	<div class="container">
			<div class="col-sm-9">
		    	<div class="c-content-panel" style="padding: 10px;">
		    		<p style="color: #25a8b4;">
		    			<?php if($quiz1->nom=='Questionnaire introductif'): ?>
		    				<b>
		    					N.B. Pou kesyon ou pral reponn la yo, pa genyen bon ni move repons. Paske repons yo pral sèvi sèlman pou analiz ekip ki prepare fomasyon an.
		    				</b>  
		    			<?php endif; ?>
		    		</p>
					<div class="row c-boxrder-top container">
						<form action="" method="POST" role="form" data-parsley-validate action="">
							<?php foreach(Query::liste_prepare_asc('questions_quiz',$url[3],'id_quiz') as $key => $question): ?>
							<div class="form-group">
							   	<label  class="col-md-12 control-label" style="font-size: 16px;"><b> - <?= $question->titre ?></b></label>
							   	<div class="col-md-12">
							   		<div class="form-group" style="font-size: 16px;">
							   			

							   		</div>
							  	</div>
							</div>
						
						<?php endforeach ?>
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary">Soumettre</button>
						</div>
						</form>

						 <?php
							
						?>
					</div>
				</div>
			  
			</div>

			<div id="message"></div>

			<div class="col-sm-3">
				<h4 style="margin-bottom: -10px;"><b> <i class="fa fa-file"></i> Voir d'autres modules</b></h4>
					<table class="table table-striped">
					<tbody></br>
						<?php foreach(Query::liste_prepare ('module_formation',$url[1],'id_formation') as $autre_module): ?>
							<?php if($autre_module->id!=$url[2]): ?>
								<tr>
									<td><a href="<?= $link_menu ?>/cours-suivi/<?= $url[1] ?>/<?= $autre_module->id ?>"> <span style="float: left; margin-right: 7px;"></span> <?= $autre_module->titre ?> <span style="float: right;"></td>
								</tr>
							<?php endif ?>
						<?php endforeach; ?>
					</tbody>
				</table>

		    </div>
	</div>
</div>

<script type="text/javascript">
	function formSubmit(){
		$.ajax({
			type: 'POST',
			url: '<?= $link ?>/formations/modules/comment.php',
			data: $('#frmbox').serialize(),
			success: function(response){
				$('#success').html(response);
			}
		});
		var form= document.getElementById('frmbox').reset();
		return false;
	}
</script>



<style type="text/css">
	ul li
	{
		list-style-type: none;
	}

	.icon
	{
		width: 22px;
	}
</style>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>

<script type="text/javascript">
	
</script>

</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
