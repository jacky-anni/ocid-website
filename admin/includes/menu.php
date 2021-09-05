  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user/<?= Fonctions::utilisateur()->photo ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= Fonctions::utilisateur()->prenom ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
        </div>
      </div>
      <!-- search form -->
     <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
       <!--  <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li> -->
        <?php if($_SESSION['droit']=='Administrateur'): ?>
            <li><a href="?page=utilisateurs"><i class="glyphicon glyphicon-user"></i> <span>Utilisateurs</span></a></li>

           <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-equalizer"></i>
              <span>OCID</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="?page=information-de-base"><i class="fa fa-circle-o"></i> Informations de bases</a></li>
              <li><a href="?page=envoie-mail"><i class="fa fa-circle-o"></i> Envoyez des mails</a></li>
             <!--  <li><a href="?page=liste-des-abonnés"><i class="fa fa-circle-o"></i> Abonnés</a></li>
              <li><a href="?page=envoyez-info-lettre"><i class="fa fa-envelope"></i> Info lettres </a></li> -->
            </ul>
          </li>
        <?php endif; ?>

        <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-equalizer"></i>
              <span>Formations</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="?page=ajouter-formation"><i class="fa fa-circle-o"></i> Ajouter une formation</a></li>
              <li><a href="?page=formations"><i class="fa fa-circle-o"></i> Liste des formations</a></li>
            </ul>
          </li>

         <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-bishop"></i>
            <span>Publications</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=Liste-des-articles"><i class="fa fa-circle-o"></i> Article</a></li>
            <li><a href="?page=publications"><i class="fa fa-circle-o"></i> Publications</a></li>
            <li><a href="?page=documents"><i class="fa fa-file"></i> Documents</a></li>
          </ul>
        </li>

          <li>
            <a href="?page=evènements">
              <i class="glyphicon glyphicon-calendar"></i>
              <span>Evènements</span>
            </a>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-road"></i>
              <span>Projets</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right"><?= Query::count_prepare ('projet',$_SESSION['id'],'posteur') ?></span>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="?page=ajouter-un-projet"><i class="fa fa-circle-o"></i> Ajouter un projet</a></li>
              <li><a href="?page=projets"><i class="fa fa-circle-o"></i> Liste des projets</a></li>
            </ul>
          </li>

          <li>
          <a href="?page=categories">
            <i class="fa fa-circle"></i>
            <span>Categories</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><?= Query::count_query ('categorie') ?></span>
            </span>
          </a>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-triangle-right"></i>
            <span>Offres d'emplois</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><?= Query::count_prepare ('offres',$_SESSION['id'],'posteur') ?></span>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="?page=créer-une-offre"> <i class="fa fa-plus"></i> Créer une offre</a></li>
            <li><a href="?page=offres"> <i class="fa fa-list"></i>Liste des offres</a></li>
          </ul>
        </li>

        <li>
          <a href="?page=publications">
            <i class="fa fa-circle"></i>
            <span>Publications</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><?= Query::count_query ('publication') ?></span>
            </span>
          </a>
        </li>

        </ul>

       
    </section>
    <!-- /.sidebar -->
  </aside>