<?php include('font-end/layout/head.php'); ?>
<?php 
	$publication= Query::affiche('publication',$url['1'],'slug');
	if(!$publication){
		echo "<script>window.location ='$link_menu/not-found';</script>";
	}
	$categorie= Query::affiche('categorie',$publication->id_categorie	,'id');
 ?>
<head>
 <title> <?= $publication->titre ?></title>
  <meta property="og:title" content="<?= $publication->titre ?>" />
  <meta property="og:url" content="<?= $link_conf.$_SERVER['REQUEST_URI'] ?>" />
  <meta property="og:description" content="<?= $categorie->nom_categorie ?>" />
  <meta property="og:site_name" content="OCID" />
  <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5ec2fd1d2d5f810012b13181&product=inline-share-buttons' async='async'></script>
  </head>
<!DOCTYPE html>
<html lang="en"  >
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
<?php banner(""); ?>

<div class="c-content-box c-size-md c-bg-white" style="margin-top: -20px;">
	<div class="c-content-box c-size-md">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="c-content-blog-post-1-view">
						<div class="c-content-blog-post-1">
							<div class="c-title c-font-bold " style="font-size:23px;">
								<p>
									<?= $publication->titre ?>
								</p>
							</div>
							<?php $posteur= Query::affiche('utilisateur',$publication->posteur,'id'); ?>

							<div class="c-panel c-margin-b-30">
								<div class="c-author"><a href="#">Par <span class="c-font-uppase"><?= $posteur->prenom ?> <?= $posteur->nom ?>,</span></a></div>
								<div class="c-date">Le <span class="c-font-uppercase"><?= Fonctions::format_date( $publication->date_post); ?></span></div>						
							</div>

							<?php if($categorie->nom_categorie !="Libre"): ?>
								<p style="background-color:#30c3d2; padding: 10px; font-size: 17px; color: white; font-weight: 500;"><?= $categorie->nom_categorie ?></p>
							<?php endif ?>
		
							<div class="c-desc">
								<?= $publication->contenue ?>
							</div>

							<?php if(Query::count_prepare('document',$publication->id,'reference')>0): ?>
								<h4><b>Documents attachés</b></h4>
								 <table class="table table-striped">
		                    <tbody>
		                    	<?php foreach (Query::liste_prepare('document',$publication->id,'reference') as $document): ?>
		                            <tr>
		                                <td> <a href="<?= $link_admin ?>/dist/document/<?= $document->document ?>" target="_blank"><i class="fa fa-file-o"></i> <?= $document->nom ?></a> </td>
		                            <!--     <td>xxxx</td> -->
		                            </tr>
		                        <?php endforeach ?>
		                    </tbody>
		                </table>
							<?php endif ?>

							<!-- BEGIN: CONTENT/ISOTOPE/GALLERY-5 -->
							<?php if(Query::count_prepare('photo',$publication->id,'reference')>0): ?>
							<h4><b>Photos</b></h4>
							<div id="c-isotope-anchor-2" class="c-content-box c-size-md c-bg-img-center" style="background-color:#2ecp3ce;">
						        <div class="c-content-isotope-gallery c-opt-5">
						        <?php foreach (Query::liste_prepare('photo',$publication->id,'reference') as $photos): ?>
						            <div class="c-content-isotope-item c-isotope-photo">
						                <div class="c-content-isotope-image-container">
						                    <img class="c-content-isotope-image" src="<?= $link_admin ?>/dist/img/photos/<?= $photo->nom ?>"/>
						                    <div class="c-content-isotope-overlay c-ilightbox-image-5"
						                        href="<?= $link_admin ?>/dist/img/photos/<?= $photo->nom ?>"
						                        data-options="thumbnail:'<?= $link_admin ?>/dist/img/photos/<?= $photo->nom ?>'"
						                        data-caption="<h4>Photo <?= $key +1?></h4><p><?= $photo->titre ?></p>"
						                    >
						                        <div class="c-content-isotope-overlay-icon">
						                            <p><b> <i class="fa fa-eye c-font-white"></i> Ouvrir la photo</b></p>
						                            
						                        </div>
						                    </div>
						                </div>
						            </div>
						        <?php endforeach ?>	
							 </div>
							</div><!-- END: CONTENT/ISOTOPE/GALLERY-5 -->
							<?php endif ?>
							<hr>

							<center>
								 <div style="width: 100%;">
							    <div id="fb-root"></div>
							    <script>(function(d, s, id) {
							      var js, fjs = d.getElementsByTagName(s)[0];
							      if (d.getElementById(id)) return;
							      js = d.createElement(s); js.id = id;
							      js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.10&appId=1895698754081471";
							      fjs.parentNode.insertBefore(js, fjs);
							    }(document, 'script', 'facebook-jssdk'));</script>

							    <div  class="fb-comments" data-href="<?= $link_conf.$_SERVER['REQUEST_URI'] ?>" data-numposts="5" ></div>
							</div>
							<h3>Partagez</h4>
							<div class="sharethis-inline-share-buttons"></div></br>
							</center>

							

						</div>
					</div>
				</div>
				<div class="col-md-3">
				
				<!-- BEGIN: CONTENT/BLOG/BLOG-SIDEBAR-1 -->
				<br>
			

					<div class="c-content-tab-1 c-theme c-margin-t-30">
						<div class="nav-justified">
							<div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
								<h3 class="c-font-bold c-font-uppercase">D'autres publications</h3>
								<div class="c-line-left c-theme-bg"></div>
							</div>
							<div class="tab-content">
								<div class="tab-pane active" id="blog_recent_posts">
									<ul class="c-content-recent-posts-1">
									<?php foreach(Query::liste_prepare('publication','En ligne','etat',5)  as $publication_list): ?>
				                 		 <?php if($publication_list->id != $url[1]): ?>	
											<li>
												<div class="c-image">
													<!-- <img src="<?= $link_admin ?>/dist/img/publication/<?= $publication_list->photo ?>" style="height:50px;" alt="" class="img-responsive"> -->
												</div>
												<div class="c-post">
													<a href="<?= $link_menu ?>/publication/<?= $publication_list->slug ?>" class="c-title">
													<?= $publication_list->titre ?>
													</a>
													<div class="c-date"><?= Fonctions::format_date( $publication_list->date_post); ?></div>
												</div>
											</li>
											<?php endif; ?>
				              		<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div> 
	</div>
	

		
</div>







<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
 </body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
