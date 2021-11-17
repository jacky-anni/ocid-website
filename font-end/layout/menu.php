
<nav class="c-mega-menu c-pull-right c-mega-menu-light c-mega-menu-light-mobile" style="font-weight: 500; color: black;">
    <ul class="nav navbar-nav c-theme-nav"> 

      <li class=" c-menu-type-classic">
            <a href="<?= $link_menu ?>/" class="c-link">Accueil<span class="c-arrow c-toggler"></span></a>
        </li>

        
       <li class=" c-menu-type-classic">
          <a href="javascript:;" class="c-link dropdown-toggle">Qui sommes nous ?<span class="c-arrow c-toggler"></span></a>
          <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                <li>
                  <a href="<?= $link_menu ?>/a-propos">A propos</a>
                </li>

                <!-- <li>
                  <a href="#">Comité de pilotage</a>
                </li> -->

                <li>
                  <a href="<?= $link_menu ?>/coordination">Coordination</a>
                </li>
<!-- 
                 <li>
                  <a href="">Témoignages</a>
                </li> -->
          </ul>                  
     </li>
        

        <li class="c-menu-type-classic">
            <a href="<?= $link_menu ?>/formations" class="c-link">Formations<span class="c-arrow c-toggler"></span></a>
        </li>

        <li class=" c-menu-type-classic">
            <a href="javascript:;" class="c-link dropdown-toggle">Projets<span class="c-arrow c-toggler"></span></a>
            <ul class="dropdown-menu c-menu-type-classic c-pull-left">

                  <li>
                    <a href="<?= $link_menu ?>/projets">Nos projets</a>
                  </li>

                  <li>
                    <a href="<?= $link_menu ?>/offres">Offres d’emplois </a>
                  </li>
            </ul>                  
      </li>

      <li class=" c-menu-type-classic">
            <a href="<?= $link_menu ?>/publications" class="c-link">Publications<span class="c-arrow c-toggler"></span></a>
        </li>

      <li class=" c-menu-type-classic">
            <a href="javascript:;" class="c-link dropdown-toggle">Evènements<span class="c-arrow c-toggler"></span></a>
            <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                 <li>
                    <a href="<?= $link_menu ?>/activites">Nos Activités </a>
                  </li>

                  <li>
                    <a href="<?= $link_menu ?>/evenements">Nos Evènements</a>
                </li>
            </ul>                  
      </li>

      <li class=" c-menu-type-classic">
            <a href="javascript:;" class="c-link dropdown-toggle">Galerie<span class="c-arrow c-toggler"></span></a>
            <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                  <li>
                    <a href="<?= $link_menu ?>/galerie-de-photos">photos</a>
                  </li>

                  <li>
                    <a href="<?= $link_menu ?>/galerie-de-videos">Vidéos</a>
                  </li>
            </ul>                  
      </li>

      <li class=" c-menu-type-classic">
            <a href="<?= $link_menu ?>/contact" class="c-link">contact<span class="c-arrow c-toggler"></span></a>
        </li>

        



         <!-- <?php if(!isset($_SESSION['id_user'])): ?>
          <li class="c-menu-type-classic">
            <a href="<?= $link_menu ?>/tableau-de-bord" class="c-link">Mon compte<span class="c-arrow c-toggler"></span></a>
        </li>
       <?php endif; ?> -->

        
    <!--  <li class="c-menu-type-classic">
            <a href="" class="c-link dropdown-toggle">Formation<span class="c-arrow c-toggler"></span></a>
        </li> -->

     <!--  <li class=" c-menu-type-classic">
            <a href="javascript:;" class="c-link dropdown-toggle">Suivi parlementaire<span class="c-arrow c-toggler"></span></a>
            <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                 <li>
                    <a href="#">Configuration du parlement</a>
                  </li>

                  <li>
                    <a href="#">Activites du parlement</a>
                  </li>

                  <li>
                    <a href="#">Relation avec les mandants</a>
                  </li>
            </ul>                  
     </li> -->


  <!--    <li class=" c-menu-type-classic">
            <a href="javascript:;" class="c-link dropdown-toggle">Observation électorale <span class="c-arrow c-toggler"></span></a>
            <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                 <li>
                    <a href="#">Régime Juridique</a>
                  </li>

                  <li>
                    <a href="#">Observation Systématique</a>
                  </li>
            </ul>                  
     </li> -->

       <!--  <li class="c-active c-menu-type-classic">
            <a href="javascript:;" class="c-link dropdown-toggle">Features<span class="c-arrow c-toggler"></span></a>
            <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                <li>
                    <a href="component-smooth-scroll.html">Smooth Scroll Links</a>
              </li>
                <li class="dropdown-submenu">
                <a href="javascript:;">Headers<span class="c-arrow c-toggler"></span></a>
                    <ul class="dropdown-menu c-pull-right">
                         <li>
                            <a href="home-header-1-ext.html">Home Header v1 - Extended</a>
                        </li>

                    </ul>
                </li>
            </ul>                  
     </li> -->

  <!--   <li class="c-search-toggler-wrapper">
        <a  href="#" class="c-btn-icon c-search-toggler"><i class="fa fa-search"></i></a>
    </li> -->
   
    <li class="c-cart-toggler-wrapper">
       <?php if(isset($_SESSION['id_user'])): ?>
        <a  href="#" class="c-btn-icon c-cart-toggler">
          <span style="width: 40px; position: absolute; top: 3px;">
            <?php include('font-end/layout/user_image.php'); ?>
          </span>
     <!--     <span class="c-cart-number c-theme-bg">2</span> --></a>
       <?php endif; ?>
    </li>
   
 </ul>
</nav>


