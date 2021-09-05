<?php include('includes/head.php');?>
<!DOCTYPE html>
<html>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
<?php include('includes/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
   <?php include('includes/menu.php'); ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
     <?php include('includes/header-title.php'); ?>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box box-primary">
      <div class="box-body box-profile">
         <?php
         $_SESSION['views']=$_GET['article'];
         include('includes/flash.php');
          // selectionner l'article en quetion
            $article=Query::affiche('article',$_GET['article'],'id');
             $user=Query::affiche('utilisateur',$article->posteur,'id');
             if (!$article->id) {
              // si l'article n'existe pas
               header("Location:?page=Liste-des-articles");
             }

             // mettre online
              if (isset($_GET['article']) AND isset($_GET['statut'])) {
                require 'class/Article.php';
                Article::statut();
              }

              if (isset($_GET['update'])) {
                $article=$_GET['article'];
                header("Location:?page=Article&article=$article");
              }
          ?>
          
          <div class="box-body">
            <div class="col-md-8">
                <!-- Box Comment -->
                <div class="box box-widget">
                  <div class="box-header with-border">
                    <div class="user-block">
                      <img class="img-circle" src="dist/img/user/<?= Fonctions::utilisateur()->photo ?>" alt="User Image">
                       <span class="username"><a href="#"><?= $user->prenom ?>  <?= $user->nom ?></a></span>
                      <span class="description"><?= $article->etat ?> - <?= Fonctions::format_date( $article->date_post ); ?></span>
                    </div>
                  </div>
                  <!-- /.box-header -->
                <div class="box-body">
                  <img class="img-responsive col-md-12" src="dist/img/article/<?php if(!empty($article->photo)){echo $article->photo;}else{echo 'template.png';} ?>" alt="Photo" style="padding: 10px;">
                  <?php $projet= Query::affiche('projet',$article->reference,'id') ?>
                  <?php if(!empty($projet->titre)){ ?>
                        <small style="color: red; "><i><a href="?page=Projet&projet=<?=  $projet->id ?>">Projet : <?= $projet->titre ?></a></i> </small>
                    <?php } ?>
                  <h4 style="line-height: 27px; font-weight: bold; "> <?= $article->titre ?></h4>

                  <p style=""> 
                    <?= $article->contenue ?>
                  </p>
                  <?php include('partials/_boutton.php'); ?>
                  <?php include('destroy.php'); ?>

                </div>
                <!-- /.box-body -->
              </div>
                <!-- /.box -->
      </div>

      <div class="col-md-4"></br></br></br>
          <div class="box box-widget widget-user-2">
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="?page=photos-activités&ref=<?= trim('article') ?>&article=<?= $article->id ?>"> <b><i class="fa fa-camera"></i>  Ajouter des photos</b> <span class="pull-right badge bg-blue"><b><?= Query::count_prepare('photo',$_GET['article'],'reference'); ?></b></span></a></li>


                <li><a href="" data-toggle="modal" data-target="#modal-default"> <b><i class="fa fa-film"></i>  Ajouter une video</b> <span class="pull-right badge bg-aqua"><?= Query::count_prepare('video',$_GET['article'],'reference'); ?></span></a></li>

                <?php include('video/create.php');?>
              </ul>
            </div>
          </div>
        <div class="box-footer no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li style="padding: 10px; font-size: 17px;"> <b><i class="fa fa-image"></i>  Photos (<?= Query::count_prepare('photo',$_GET['article'],'reference'); ?>) </b></li>
          </ul>
        </div>

        <?php foreach(Query::liste_prepare ('photo',$_GET['article'],'reference',$limit=6) as $photo): ?>
          <a class="example-image-link" href="dist/img/photos/<?= $photo->nom ?>" data-title="<?= $photo->titre?>" data-lightbox="example-1" style="width: 10px;" ><img class="example-image product-img" src="dist/img/photos/<?= $photo->nom ?>" style="width: 150px; padding: 1px;" /></a>
        <?php endforeach; ?>

          <?php if(Query::count_prepare('photo',$_GET['article'],'reference')>0): ?>
          <div class="box-footer text-center">
              <a href="?page=photo-activités&article=<?= $_GET['article'] ?>" class="uppercase"> <i class="fa fa-plus"></i> Voir plus de photos</a>
            </div>
          <?php endif; ?>

        <div class="box-footer no-padding">
         <ul class="nav nav-pills nav-stacked">
            <li style="padding: 10px; font-size: 17px;"> <b><i class="fa fa-film"></i>  Vidéos (<?= Query::count_prepare('video',$_GET['article'],'reference'); ?>) </b></li>
          </ul>
        </div>

        <?php foreach(Query::liste_prepare ('video',$_GET['article'],'reference',$limit=1) as $video): ?>
          <div class="embed-responsive embed-responsive-16by9">
           <?= $video->lien ?>
          </div>
        <?php endforeach; ?>

        <?php if(Query::count_prepare('video',$_GET['article'],'reference')>0): ?>
          <div class="box-footer text-center">
              <a href="?page=video-activités&article=<?= $article->id ?>" class="uppercase"> <i class="fa fa-film"></i> Voir plus de videos</a>
            </div>
        <?php endif; ?>
      </br>


  <!-- Box Comment -->
        <?php if(Query::count_query('article')>1): ?>
            <div class="box box-widget">
             <div class="box-footer no-padding">
               <ul class="nav nav-pills nav-stacked">
                  <li style="padding: 10px; font-size: 17px;"> <b><i class="fa fa-files-o"></i>  Autres activités </b></li>
                </ul>
              </div>
            </div>
          <?php endif; ?>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php foreach(Query::liste('article',5) as $article_list): ?>
                  <?php if($article_list->id != $_GET['article']): ?>
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/article/<?php if(!empty($article_list->photo)){echo $article_list->photo;}else{echo 'template.png';} ?>" style="width: 100px; height: auto; float: left; padding: 8px;" >
                      </div>
                      <div class="product-info">
                        <a href="?page=Article&article=<?= $article_list->id; ?>" class="product-title"><?= $article_list->titre ?>
                          <span class="label label-warning pull-right"><?= $article_list->etat ?></span></a>
                        <span class="product-description">
                              <?= Fonctions::format_date( $article_list->date_post ); ?>
                            </span>
                      </div>
                    </li>
                <?php endif; ?>
              <?php endforeach; ?>

              </ul>
            </div>
            <!-- /.box-body -->
            <?php if(Query::count_query('article')>1): ?>
              <div class="box-footer text-center">
                <a href="?page=Liste-des-articles" class="uppercase"> <i class="fa fa-files-o"></i> Voir plus d'activités</a>
              </div>
            <?php endif; ?>
            <!-- /.box-footer -->
      </div>

       <div>

    </div>

      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include('includes/footer.php'); ?>
  <?php include('includes/tools.php'); ?>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
