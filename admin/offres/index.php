<?php include('includes/head.php'); ?>
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('includes/header-title.php'); ?>
     <?php include('includes/flash.php'); ?>
    <!-- create user -->

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
               <div class="box-body">
                  <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                  <ul class="todo-list">
                     <?php 
                      if($_SESSION['droit']=='Super Administrateur'){
                        $query=Query::liste('offres');
                      }else{
                        $query=Query::liste_prepare('offres',$_SESSION['id'],'posteur');
                      }
                    ?>
                     <?php foreach($query as $offres): ?>
                    <li>
                      <!-- drag handle -->
                      <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                          </span>
                      <!-- checkbox -->
                      <!-- todo text -->
                      <span class="text"><?= $offres->titre ?></span>
                      <!-- Emphasis label -->
                      <small class="label label-<?php if($offres->etat=='Hors ligne'){echo "danger";}else{
                        echo "primary";
                      }  ?>"> <?= $offres->etat ?></small>
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <a href="?page=offre-emploi&offre=<?= $offres->id ?>">
                          <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>  Plus</button>
                        </a>
                        <a href="?page=modifier-cet-offre&offre=<?= $offres->id ?>">
                          <button class="btn btn-default btn-sm"><i class="fa fa-edit"></i>  Modifier</button>
                        </a>
                        
                        <a href="#<?= $offres->id;?>"  role="button" data-toggle="modal" class="btn btn-danger btn-round btn-sm" > <i class="fa fa-trash"></i> Supprimer</a>
                        
                      </div>
                    </li>
                      <?php include('destroy.php'); ?>
                    <?php endforeach; ?>

                  </ul>
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
<!-- ./wrapper -->

</body>
</html>