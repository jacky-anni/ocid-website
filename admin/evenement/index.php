
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
    <?php include('includes/flash.php'); ?>
    
    <!-- Main content -->
    <section class="">
      <div class="box-body box-prfofile">
          <div class="box">
          <div class="box-header">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" style="font-size: 17px; float: left;"><b> <i class="fa fa-plus"></i> Ajouter un évènement</b></button>
           <?php if(isset($_GET['section'])){ ?>
           <a href="?page=evènements">
             <button type="button" class="btn btn-primary" style="font-size: 17px; float: right;"><b> <i class="fa fa-calendar"></i> Voir par date</b></button>
           </a>
         <?php }else{ ?>
          <a href="?page=evènements&section=all">
             <button type="button" class="btn btn-primary" style="font-size: 17px; float: right;"><b> <i class="fa fa-calendar"></i> Voir tous</b></button>
           </a>
         <?php } ?>
           
          </div>
          <?php include('create.php'); ?>
          <!-- /.box-header -->
          <div class="box box-primary">
          <?php if(isset($_GET['page'])=='evenements' AND !isset($_GET['section'])){ ?>
          <div class="box-body">
            <?php
              if(isset($_GET['date_debut']) AND isset($_GET['date_fin'])){
                 $date_debut=$_GET['date_debut'];
                  $date_fin=$_GET['date_fin'];
              }else
              {
                $date_debut=date('Y-m-01');
                $date_fin=date('Y-m-28');
              }
            ?>
            <h4 class="box-comments" style="text-align: center; padding: 20px;">Evènements allant de <?= Fonctions::format_date( $date_debut); ?> au <?= Fonctions::format_date( $date_fin); ?> </h4>
             <div class="row">
             <?php include('search.php'); ?>
              <div class="col-md-9">
                <!-- The time line -->
                <ul class="timeline">
                  <!-- timeline time label -->
                  <?php foreach(Evenement::liste($date_debut,$date_fin) as $event): ?>
                  <li class="time-label">
                        <span class="bg-red">
                          <?= Fonctions::format_date($event->date_event); ?> 
                        </span>
                  </li>
                                      <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-calendar bg-blue"></i>

                    <div class="timeline-item">
                      <div class="col-md-12">
                        <!-- Widget: user widget style 1 -->
                          <!-- Add the bg color to the header using any of the bg-* classes -->
                          <div class="widget-user-header" style="padding: 5px;">
                            <!-- /.widget-user-image -->
                            <h4 class="widget-user-username" style="line-height: 23px; font-weight: bold;"><?=  $event->titre ?></h4>
                            <h5 class="widget-user-desc" style="color: red; font-weight: bold;">
                               <?php
                                 $jours= Fonctions::calcul_jour('evenement','date_event','NOW()',$event->id);
                                 if ($jours>1) {
                                   echo $jours."  Jours restants"."   ";
                                 }elseif ($jours==1) {
                                   echo $jours."  Jour restant"."   ";
                                 }
                                 elseif ($jours==0) {
                                   echo "Aujourd'hui"."   ";
                                 }else{
                                  echo "Terminé"."   ";
                                 }
                              ?>
                            </h5>
                            <p><?=  $event->description ?></p>
                          </div>
                          <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                              <li><a style="font-weight: bold;" ><i class="fa fa-clock-o"></i> <?=  $event->heure?> </a></li>
                              <li><a style="font-weight: bold;" ><i class="fa fa-home"></i> <?=  $event->lieu?> </a></li>

                            </ul>
                          </div>

                        <div class="timeline-footer">
                          <div class="box-footer box-comments">
                            <div class="box-comment">
                              <!-- User image -->
                              <div class="comment-text">
                                    <span class="username">
                                  
                                  <a href="" data-toggle="modal" data-target="#<?= $event->id;?>" class="btn btn-primary btn-round btn-sm"> <i class="fa fa-edit"></i>  Modifier</a>

                                   <a href="" data-toggle="modal" data-target="#<?= $event->id;?>1"  class="btn btn-danger btn-round btn-sm"> <i class="fa fa-trash"></i>  Supprimer</a>
                                    </span><!-- /.username -->
                              </div>
                              <!-- /.comment-text -->
                            </div>
                          </div>
                        </div>
                    </div>
                  </li>
                  <?php include('edit.php') ?>
                  <?php include('destroy.php') ?>
                <?php endforeach; ?>

                </ul>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        <?php }elseif (isset($_GET['page'])=='evenements' AND isset($_GET['section'])){?>
           <div class="box-body">
             <div class="row">
              <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                  <!-- timeline time label -->
                  <?php foreach(Query::liste('evenement') as $event): ?>
                  <li class="time-label">
                        <span class="bg-red">
                          <?= Fonctions::format_date($event->date_event); ?> 
                        </span>
                  </li>
                                      <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-calendar bg-blue"></i>

                    <div class="timeline-item">
                      <div class="col-md-12">
                        <!-- Widget: user widget style 1 -->
                          <!-- Add the bg color to the header using any of the bg-* classes -->
                          <div class="widget-user-header" style="padding: 5px;">
                            <!-- /.widget-user-image -->
                            <h4 class="widget-user-username" style="line-height: 23px; font-weight: bold;"><?=  $event->titre ?></h4>
                            <h5 class="widget-user-desc" style="color: red; font-weight: bold;">
                               <?php
                                   $jours= Fonctions::calcul_jour('evenement','date_event','NOW()',$event->id);
                                   if ($jours>1) {
                                     echo $jours."  Jours restants"."   ";
                                   }elseif ($jours==1) {
                                     echo $jours."  Jour restant"."   ";
                                   }
                                   elseif ($jours==0) {
                                     echo "Aujourd'hui"."   ";
                                   }else{
                                    echo "Terminé"."   ";
                                   }
                                ?>
                            </h5>
                            <?=  $event->description ?></p>
                          </div>
                          <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                              <li><a style="font-weight: bold;" ><i class="fa fa-clock-o"></i> <?=  $event->heure?> </a></li>
                              <li><a style="font-weight: bold;" ><i class="fa fa-home"></i> <?=  $event->lieu?> </a></li>

                            </ul>
                          </div>

                        <div class="timeline-footer">
                          <div class="box-footer box-comments">
                            <div class="box-comment">
                              <!-- User image -->
                              <div class="comment-text">
                                    <span class="username">
                                  
                                  <a href="" data-toggle="modal" data-target="#<?= $event->id;?>" class="btn btn-primary btn-round btn-sm"> <i class="fa fa-edit"></i>  Modifier</a>

                                   <a href="" data-toggle="modal" data-target="#<?= $event->id;?>1"  class="btn btn-danger btn-round btn-sm"> <i class="fa fa-trash"></i>  Supprimer</a>
                                    </span><!-- /.username -->
                              </div>
                              <!-- /.comment-text -->
                            </div>
                          </div>
                        </div>
                    </div>
                  </li>
                  <?php include('edit.php') ?>
                  <?php include('destroy.php') ?>
                <?php endforeach; ?>

                </ul>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>


        <?php  } ?>

        </div>
          <!-- /.box-body -->
        </div>

        </div>
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

<!-- REQUIRED JS SCRIPTS -->
<!-- page script -->
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
