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
         include('includes/flash.php');
          // selectionner l'publication en quetion
            $publication=Query::affiche('publication',$_GET['publication'],'slug');
             $user=Query::affiche('utilisateur',$publication->posteur,'id');
             if (!$publication->id) {
              // si l'publication n'existe pas
               header("Location:?page=publications");
             }

             // mettre online
              if (isset($_GET['publication']) AND isset($_GET['statut'])) {
                require 'class/Publication.php';
                publication::statut();
              }

              if (isset($_GET['update'])) {
                $publication=$_GET['publication'];
                header("Location:?page=publication&publication=$publication");
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
                      <span class="description"><?= $publication->etat ?> - <?= Fonctions::format_date( $publication->date_post ); ?></span>
                    </div>
                  </div>
                  <!-- /.box-header -->
                <div class="box-body">
                 
                  <?php $categorie= Query::affiche('categorie',$publication->id_categorie,'id') ?>
                  <?php if(!empty($nom_categorie)){ ?>
                        <small> <?= $categorie->nom_categorie ?></a></i> </small>
                    <?php } ?>
                  <h4 style="line-height: 27px; font-weight: bold; "> <?= $publication->titre ?> 
                  <?php if($publication->etat=='Hors ligne'){ ?>
                     <span class="label label-danger pull-right"><?= $publication->etat ?></span>
                     <?php }else{ ?>
                      <span class="label label-success pull-right"><?= $publication->etat ?></span>
                      <?php } ?>
                  </h4>

                  <p style=""> 
                    <?= $publication->contenue ?>
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

              <li><a href="" data-toggle="modal" data-target="#document"> <b><i class="fa fa-file"></i>  Ajouter un document</b> <span class="pull-right badge bg-blue"><b><?= Query::count_prepare('document',$publication->id,'reference') ?></b></span></a></li>

                <li><a href="?page=photos-activités&ref=<?= trim('publication') ?>&publication=<?= $publication->id ?>"> <b><i class="fa fa-camera"></i>  Ajouter des photos</b> <span class="pull-right badge bg-blue"><b><?= Query::count_prepare('photo',$_GET['publication'],'reference'); ?></b></span></a></li>
                <?php include('document/create.php');?>
              </ul>
            </div>
          </div>
        <div class="box-footer no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li style="padding: 10px; font-size: 17px;"> <b><i class="fa fa-image"></i>  Photos (<?= Query::count_prepare('photo',$_GET['publication'],'reference'); ?>) </b></li>
          </ul>
        </div>

        <?php foreach(Query::liste_prepare ('photo',$_GET['publication'],'reference',$limit=6) as $photo): ?>
          <a class="example-image-link" href="dist/img/photos/<?= $photo->nom ?>" data-title="<?= $photo->titre?>" data-lightbox="example-1" style="width: 10px;" ><img class="example-image product-img" src="dist/img/photos/<?= $photo->nom ?>" style="width: 150px; padding: 1px;" /></a>
        <?php endforeach; ?>

          <?php if(Query::count_prepare('photo',$_GET['publication'],'reference')>0): ?>
          <div class="box-footer text-center">
              <a href="?page=photo-activités&publication=<?= $_GET['publication'] ?>" class="uppercase"> <i class="fa fa-plus"></i> Voir plus de photos</a>
            </div>
          <?php endif; ?>

      </br>


  <!-- Box Comment -->
        <?php if(Query::count_query('publication')>1): ?>
            <div class="box box-widget">
             <div class="box-footer no-padding">
               <ul class="nav nav-pills nav-stacked">
                  <li style="padding: 10px; font-size: 17px;"> <b><i class="fa fa-files-o"></i>  Publications </b></li>
                </ul>
              </div>
            </div>
          <?php endif; ?>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php foreach(Query::liste('publication',5) as $publication_list): ?>
                  <?php if($publication_list->id != $_GET['publication']): ?>
                    <li class="itkem">
                      <div class="prokduct-info">
                        <a href="?page=publication&publication=<?= $publication_list->slug; ?>" class="product-title"><?= $publication_list->titre ?>
                        <?php if($publication_list->etat=='Hors ligne'){ ?>
                          <span class="label label-danger pull-right"><?= $publication_list->etat ?></span>
                        <?php }else{ ?>
                          <span class="label label-success pull-right"><?= $publication_list->etat ?></span>
                        <?php } ?>
                        </a>
                        <span class="product-description">
                              <?= Fonctions::format_date( $publication_list->date_post ); ?>
                            </span>
                      </div>
                    </li><hr>
                <?php endif; ?>
              <?php endforeach; ?>

              </ul>
            </div>
            <!-- /.box-body -->
            <?php if(Query::count_query('publication')>1): ?>
              <div class="box-footer text-center">
                <a href="?page=Liste-des-publications" class="uppercase"> <i class="fa fa-files-o"></i> Voir plus d'activités</a>
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
