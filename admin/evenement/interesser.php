
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
          </div>
          <!-- /.box-header -->

          <?php
             $event=Query::affiche('evenement',$_GET['id'],'id');
             if (!$event->id) {
              // si l'evenement n'existe pas
               header("Location:?page=evènements");
             }
          ?>
            
          <div class="box-body">
            <div class="box-footer box-comments">
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
                                   echo $jours."  Jours restants"."  |  ";
                                 }elseif ($jours==1) {
                                   echo $jours."  Jour restant"."  |  ";
                                 }
                                 elseif ($jours==0) {
                                   echo "Aujourd'hui"."  |  ";
                                 }else{
                                  echo "Terminé"."  |  ";
                                 }

                                 // personne interese
                                 $abonnement= Query::count_prepare('abonnement',$event->id,'reference');
                                 if($abonnement>1){echo "$abonnement  Personnes interesées";}else{echo "$abonnement  Personne interesée";}
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
                    </div>
                    <button id="exportButton" class="btn btn-danger clearfix" style="margin: 10px; float: right;"><span class="fa fa-file-excel-o"></span> Exporter sur excel</button>
              </div>


            <table id="example" class="table table-striped table-bordered exportTable" style="width:100%">

              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach (Evenement::interesser($_GET['id']) as $abonnee): ?>
              <tr>
                <td><?= $abonnee->nom ?></td>
                <td><?= $abonnee->prenom ?></td>
                <td><?= $abonnee->email ?></td>
              </tr>
            <?php endforeach; ?>


              </tbody>
            </table>
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

<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $("#exportButton").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: ".exportTable",
                schema: {
                    type: "table",
                    fields: {
                        Nom: { type: String },
                        Prénom: { type: Number },
                        Email: { type: String }
                    }
                }
            });

            // when parsing is done, export the data to Excel
            dataSource.read().then(function (data) {
                new shield.exp.OOXMLWorkbook({
                    author: "PrepBootstrap",
                    worksheets: [
                        {
                            name: "PrepBootstrap Table",
                            rows: [
                                {
                                    cells: [
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Nom"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Prénom"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Email"
                                        }
                                    ]
                                }
                            ].concat($.map(data, function(item) {
                                return {
                                    cells: [
                                        { type: String, value: item.Nom },
                                        { type: String, value: item.Prénom },
                                        { type: String, value: item.Email }
                                    ]
                                };
                            }))
                        }
                    ]
                }).saveAs({
                    fileName: "liste interessé_: <?= $event->titre ?>"
                });
            });
        });
    });
</script>


  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
  } );
  </script>
</body>
</html>
