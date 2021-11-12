<?php include('includes/head.php');?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
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
             $formations=Query::affiche('formation',$_GET['formations'],'id');
             if (!$formations->id) {
              // si l'formations n'existe pas
               header("Location:?page=formations");
             }
          ?>
            
          <div class="box-body">

             <div class="info-box bg-green">
                  <span class="info-box-icon" style="padding: 20px;"><img src="dist/img/icon/icons8_Training_64px.png"></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 19px; padding-top: 20px; font-weight: bold;"><a href="?page=formation&formations=<?= $formations->id ?>" style="color: white;"><?= $formations->titre ?></a></span>

                    <span class="info-box-number" style="font-size: 12px; font-weight: normal; color:yellow;">Liste des participants inscrits</span>
                  </div>
              <!-- /.info-box-content -->
            </div>
                 <a href="?page=statistique-formation&formations=<?= $formations->id; ?>"> <button  class="btn btn-primary btn-sm " style="margin: 10px;"><span class="fa fa-bar-chart"></span> Statistiques</button></a>

                  <a href="?page=participants_&formations=<?= $formations->id; ?>"> <button  class="btn btn-success btn-sm " style="margin: 10px;"><span class="fa fa-user"></span> Participants</button></a>

            <div class="table-responsive">
            <table id="example" class="table table-striped table-responsive table-bordered exportTable" style="width:100%">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Lieu de naissaince</th>
                  <th>Département</th>
                  <th>Commune</th>
                  <th>Niveau</th>
                  <th>Email</th>
                  <th>Numero</th>
                  <th>Statut</th>
                  <th width="15%"></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach (Query::liste_prepare ('inscription',$_GET['formations'],'id_formation') as $formation): ?>
                <?php  $participant =Query::affiche('participant',$formation->id_participant,'id'); ?>
              <tr>
                <td><?php if (!empty($participant->nom)) {echo $participant->nom;} ?></td>
                <td><?php if (!empty($participant->prenom)) {echo $participant->prenom;} ?></td>
                <td><?php if (!empty($participant->lieu_naissance)) {echo $participant->lieu_naissance;} ?></td>
                <td><?php if (!empty($participant->departement)) {echo $participant->departement;} ?></td>
                <td><?php if (!empty($participant->commune)) {echo $participant->commune;} ?></td>
                <td><?php if (!empty($participant->niveau)) {echo $participant->niveau;} ?></td>
                <td><?php if (!empty($participant->email)) {echo $participant->email;} ?></td>
                <td><?php if (!empty($participant->numero_what)) {echo $participant->numero_what;} ?></td>
                
                <?php if($participant->active==1): ?>
                  <td><span class="btn btn-success btn-xs" style="cursor:none;">Activé</span></td>
                 <?php endif ?>

                  <?php if($participant->active==0): ?>
                    <td><span class="btn btn-danger btn-xs" style="cursor:none;">Désactivé</span></td>
                  <?php endif ?>
                <td width="15%">
             <!--      <a href="" title="Modifier le mot de passe"> <i class="fa fa-edit btn btn-primary btn-xs"></i></a> -->

                   <?php if($participant->active==0): ?>
                       <a  title="activé" href="#<?= $participant->id;?>"  role="button" data-toggle="modal"> <button class="btn btn-warning btn-xs"><i class="fa fa-unlock"> </i> Activer le compte</button></a>
                    <?php endif ?>

                    <?php if($participant->active==1): ?>
                       <a  title="Desactivé ce compte" href="#<?= $participant->id; ?>biw"  role="button" data-toggle="modal"> <button class="btn btn-warning btn-xs"><i class="fa fa-unlock"> </i> Réfuser</button> </a>
                    <?php endif ?>
                  
                </td>
              </tr>
              <?php include('active_compte.php'); ?>
              <?php include('desactive_compte.php'); ?>
            <?php endforeach; ?>


              </tbody>
            </table>
          </div>
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: { orthogonal: 'export' }
            },
            {
                extend: 'excelHtml5',
                exportOptions: { orthogonal: 'export' }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: { orthogonal: 'export' }
            }
        ]
    } );
} );
</script>
</body>
</html>
