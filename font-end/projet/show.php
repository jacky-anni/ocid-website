<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Projet.php'); ?>
<?php 
	$projet= Query::affiche('projet',$url['1'],'slug');
	if(!$projet){
		echo "<script>window.location ='$link_menu/not-found';</script>";
	}
 ?>
<head>
 <title> <?= $projet->titre ?></title>
  <meta property="og:title" content="<?= $projet->titre ?>" />
  <meta property="og:url" content="<?= $link_conf.$_SERVER['REQUEST_URI'] ?>" />
  <meta property="og:image" content="<?= $link_conf.$link_admin ?>/dist/img/projet/<?= $projet->photo ?>" />
  <meta property="og:description" content="OCID" />
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

<div class="c-content-box c-size-md c-bg-white">
	<div class="c-content-box c-size-md">
		<div class="container">
			<div class="row">
             <?php if(Query::count_prepare('article',$projet->id,'reference')>1){$count = 9;}else{$count = 12;} ?>
				<div class="col-md-<?= $count ?>">
					<div class="c-content-blog-post-1-view">
						<div class="c-content-blog-post-1">
							<div class="c-title c-font-bold " style="font-size:23px;">
                                <?php if(!empty($projet->photo)): ?>
							        <img class="c-overlay-object img-responsive" style="width:100%;" src="<?= $link_admin ?>/dist/img/projet/<?= $projet->photo ?>" alt="">
                                <?php endif; ?>
								<p style="background:#2dc3ce; padding:5px; font-size:15px; color:whitbe;">
									<?= $projet->titre ?>
								</p>
							</div>
							<?php $posteur= Query::affiche('utilisateur',$projet->posteur,'id'); ?>

							<div class="c-panel c-margin-b-30">
								<div class="c-author"><a href="#">Par <span class="c-font-uppase"><?= $posteur->prenom ?> <?= $posteur->nom ?>,</span></a></div>
								<div class="c-date">Le <span class="c-font-uppercase"><?= Fonctions::format_date( $projet->date_post); ?></span></div>						
								<div class="c-comments"><a href="<?= $link_menu ?>/activite/<?= $projet->slug ?>"><i class="icon-flie-o"></i> <?php $count_act= Query::count_prepare('article',$projet->id,'reference'); ?><?php if($count_act>1){echo $count_act."  Activités";}else{echo "   Pas d'activité pour l'instant";} ?></a></div>
							</div>

                            <div class="c-progress-bar">

                                <div class="row">
                                <div class="col-md-8">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td> <b>Public cible :</b></td>
                                                <td><?= $projet->public_cible ?></td>
                                            </tr>

                                            <tr>
                                                <td> <b>Pays/Zone :</b></td>
                                                <td><?= $projet->zone ?></td>
                                            </tr>

                                            <tr>
                                                <td> <b>Date de début :</b></td>
                                                <td><?= Fonctions::format_date( $projet->date_debut ); ?></td>
                                            </tr>

                                            <tr>
                                                <td> <b>Date de fin :</b></td>
                                                <td><?= Fonctions::format_date( $projet->date_fin ); ?></td>
                                            </tr>

                                            <tr>
                                                <td> <b>Durée :</b></td>
                                                <td><?= Projet::duree($projet->date_debut,$projet->date_fin) ?></td>
                                            </tr>

                                            <tr>
                                                <td> <b>Temps ecoulé :</b></td>
                                                <td>
                                                <?php
                                                    if($projet->date_debut<date('Y-m-d')){

                                                        if($projet->date_fin>=date('Y-m-d')){
                                                        echo Projet::duree($projet->date_debut,date('Y-m-d'));
                                                        }else{
                                                        echo "Terminé";
                                                        }
                                                    }
                                                ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>

                                   	<div class="col-md-4">
                                       <?php $jours_total= Fonctions::calcul_jour('projet','date_fin','date_debut',$projet->id); ?>
                                        <?php $jours_passe= Fonctions::calcul_jour('projet','NOW()','date_debut',$projet->id); ?>
                                        <?php
                                            $pourcenage = $jours_passe/$jours_total*100;
                                            if($pourcenage>100){
                                                $pourcenage = 1;
                                            }else{
                                                $pourcenage= $pourcenage/100;
                                            }
                                         ?>
                                        <div class="c-progress-bar-container">
                                            <div class="c-progress-bar-line " 
                                                data-progress-bar="semicircle" 
                                                data-stroke-width="6" 
                                                data-duration="1500" 
                                                data-trail-width="5"
                                                data-progress="<?= $pourcenage ?>"
                                                data-trail-color="#222"
                                                data-display-value="true"
                                                data-animation="bounce">
                                            </div>						
                                        </div>
                                        <div class="c-progress-bar-desc-container">
                                            <p class="c-progress-bar-desc c-center">Pourcentage de réussite</p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div><hr>


							<div class="c-desc">
                                <?= $projet->presentation ?>
							</div><hr>
                            
                            <?php if(!empty($projet->objectif)): ?>
                                <div class="c-desc">
                                    <h4 style="font-weight: bold;">Ojectifs génerales</h4>
                                    <?= $projet->objectif ?>
                                </div><hr>
                            <?php endif; ?>

                            <?php if(!empty($projet->resultat)): ?>
                                <div class="c-desc">
                                    <h4 style="font-weight: bold;">Résultats</h4>
                                    <?= $projet->resultat ?>
                                </div><hr>
                            <?php endif; ?>

                            <?php if(!empty($projet->activite)): ?>
                                <div class="c-desc">
                                    <h4 style="font-weight: bold;">Activités</h4>
                                    <?= $projet->activite ?>
                                </div><hr>
                            <?php endif; ?>

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
		
                <?php if(Query::count_prepare('article',$projet->id,'reference')>1): ?>
            <div class="c-content-tab-1 c-theme c-margin-t-30">
                <div class="nav-justified">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#blog_recent_posts" data-toggle="tab" style="font-size:20px;"><b> <i class='fa fa-file-o'></i> Activités liés </b></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="blog_recent_posts">
                            <ul class="c-content-recent-posts-1">
                            <?php foreach(Query::liste_prepare('article',$projet->id,'reference')  as $activite): ?>
                                <?php if($activite->id != $url[1]){ ?>	
                                    <li>
                                        <!-- <div class="c-image">
                                            <img src="<?= $link_admin ?>/dist/img/article/<?= $activite->photo ?>" style="weigth:30%;" alt="" class="img-responsive">
                                        </div> -->
                                        <div class="c-post">
                                            <a href="<?= $link_menu ?>/activite/<?= $activite->slug ?>" class="c-title">
                                            <?= $activite->titre ?>
                                            </a>
                                            <div class="c-date"><?= Fonctions::format_date( $activite->date_post); ?></div>
                                        </div>
                                    </li>
                                    <?php }else{ ?>
                                        Pas d'acrivité pour l'instant
                                    <?php } ?>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>



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
