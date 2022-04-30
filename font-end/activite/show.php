<?php include('font-end/layout/head.php'); ?>
<?php 
	$article= Query::affiche('article',$url['1'],'slug');
	if(!$article){
		echo "<script>window.location ='$link_menu/not-found';</script>";
	}
 ?>
  <?php head($article->titre,"Observatoire Citoyen pour l’Institutionnalisation de la Démocratie","$link_admin/dist/img/article/$article->photo"); ?>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5ec2fd1d2d5f810012b13181&product=inline-share-buttons' async='async'></script>
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

<div class="c-content-box c-size-md c-bg-white">
	<div class="c-content-box c-size-md">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="c-content-blog-post-1-view">
						<div class="c-content-blog-post-1">
							<div class="c-title c-font-bold " style="font-size:23px;">
							    <img class="c-overlay-object img-responsive" style="width:100%;" src="<?= $link_admin ?>/dist/img/article/<?= $article->photo ?>" alt="">
								<p>
									<?= $article->titre ?>
								</p>
							</div>
							<?php $posteur= Query::affiche('utilisateur',$article->posteur,'id'); ?>

							<div class="c-panel c-margin-b-30">
								<div class="c-author"><a href="#">Par <span class="c-font-uppase"><?= $posteur->prenom ?> <?= $posteur->nom ?>,</span></a></div>
								<div class="c-date">Le <span class="c-font-uppercase"><?= Fonctions::format_date( $article->date_post); ?></span></div>						
								<div class="c-comments"><a href="<?= $link_menu ?>/videos/<?= $article->slug ?>"><i class="icon-film"></i> <?php $count_video= Query::count_prepare('video',$article->id,'reference'); ?><?php if($count_video>1){echo $count_video."  Vidéos";}else{echo $count_video."  Vidéo";} ?></a></div>
								<div class="c-comments"><a href="<?= $link_menu ?>/photos/<?= $article->slug ?>"><i class="icon-picture"></i> <?php $count_photo= Query::count_prepare('photo',$article->id,'reference'); ?><?php if($count_photo>1){echo $count_photo."  Photos";}else{echo $count_photo."  Photo";} ?></a></div>
							</div>
							<?php if($article->reference!='Aucun'): ?>
								<?php $projet= Query::affiche('projet',$article->reference,'id'); ?>
								<ul class="c-tags c-theme-ul-bg">
									<li> <b>Projet: </b> <a href="<?= $link_menu ?>/projet/<?= $projet->slug ?>"><?= $projet->titre ?></a></li>
								</ul>
							<?php endif ?>

							<div class="c-desc">
								<?= $article->contenue ?>
							</div><hr>

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
							<h3>Partagez avec vos amis</h4>
							<div class="sharethis-inline-share-buttons"></div></br>
							</center>

						</div>
					</div>
				</div>
				<div class="col-md-3">
				
				<!-- BEGIN: CONTENT/BLOG/BLOG-SIDEBAR-1 -->
				<br>
				
				<?php if(Query::count_prepare('photo',$article->id,'reference')>2): ?>
				<h3 class="c-center c-font-uppercase c-font-bold"> <i class="fa fa-photo"></i> Photos</h3>
				<div class="c-content-media-2-slider wow animated fadeInRight" data-slider="owl">						
					<div class="owl-carousel owl-theme c-theme owl-single" data-single-item="true" data-navigation-dots="true" data-auto-play="4000" data-rtl="false">						
					<?php foreach (Query::liste_prepare('photo',$article->id,'reference',8) as $photo): ?>
						<div class="c-content-media-2 c-bg-img-center" style="background-image: url(<?= $link_admin ?>/dist/img/photos/<?= $photo->nom ?>); min-height: 200px;">
						</div>
					<?php endforeach ?>					
					</div>
				</div>
				<p><center><a href="<?= $link_menu ?>/photos/<?= $article->slug ?>" style="color:#2ec3ce;"><b> <i class="fa fa-long-arrow-right"></i> Voir plus de photos</b></a></center></p>
				<?php endif ?>
				
				<?php if(Query::count_prepare('video',$article->id,'reference')>2): ?>
					<?php foreach (Query::liste_prepare('video',$article->id,'reference',1) as $video): ?>
					<div class="row"><br>
						<h3 class="c-center c-font-uppercase c-font-bold"><i class="fa fa-film"></i> Vidéos</h3>
						<div class="col-md-12 c-video">
							<div id="c-video-card-3" class="embed-responsive embed-responsive-16by9">
							<?= $video->lien ?>
							</div>
						</div>
					</div>
					<p><center><a href="" style="color:#2ec3ce;"><b> <i class="fa fa-long-arrow-right"></i> Voir plus de vidós</b></a></center></p>
					<?php endforeach ?>	
				<?php endif ?>
		
				<div class="c-content-tab-1 c-theme c-margin-t-30">
					<div class="nav-justified">
						<div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
							<h3 class="c-font-bold c-font-uppercase">D'autres activités</h3>
							<div class="c-line-left c-theme-bg"></div>
						</div>
						<div class="tab-content">
							<div class="tab-pane active" id="blog_recent_posts">
								<ul class="c-content-recent-posts-1">
								<?php foreach(Query::liste_prepare('article','En ligne','etat',5)  as $article_list): ?>
										<li>
											<div class="c-image">
												<img src="<?= $link_admin ?>/dist/img/article/<?= $article_list->photo ?>" style="height:50px;" alt="" class="img-responsive">
											</div>
											<div class="c-post">
												<a href="<?= $link_menu ?>/activite/<?= $article_list->slug ?>" class="c-title">
													<?= substr($article_list->titre, 0,30) ?>...
												</a>
												<div class="c-date"><?= Fonctions::format_date( $article_list->date_post); ?></div>
											</div>
										</li>
										
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
