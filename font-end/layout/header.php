
<div class="c-topbar c-topbar-light c-solid-bg">
    <div class="container">
        <!-- BEGIN: INLINE NAV -->
        <nav class="c-top-menu c-pull-left">
            <ul class="c-icons c-theme-ul">
                <li><a href="<?= $org->lien_facebook ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?= $org->lien_twitter ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="<?= $org->lien_youtube ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                <li><a href="<?= $org->lien_instagram ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
            
            </ul>
        </nav>
        <!-- END: INLINE NAV -->
        <!-- BEGIN: INLINE NAV -->
        <nav class="c-top-menu c-pull-right">
            <ul class="c-links c-theme-ul">
                <?php if(!isset($_SESSION['id_user'])){ ?>
                <li><a href="<?= $link_menu ?>/connexion"> <i class="fa fa-sign-in"></i>  Connexion</a></li>
                <?php }else{ ?>
                    <li><a href="<?= $link_menu ?>/deconnexion"> <i class="fa fa-sign-out"></i>  Déconnexion</a></li>
                <?php } ?>
                <li class="c-divider">|</li>
                <li><a href="<?= $link_menu ?>/contact"><i class="fa fa-envelope"></i>  Contact</a></li>
           <!--      <li class="c-divider">|</li>
                <li><a href="<?= $org->lien_facebook ?>" target="_blank"> <i class="fa fa-globe"></i> Notre site officiel</a></li> -->
            </ul>
            <ul class="c-ext c-theme-ul">
                <li class="c-lang dropdown c-last">
                    <a href="#" style="visibility: hidden;">.</a>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li class="active"><a href="#">English</a></li>
                        <li><a href="#">German</a></li>
                        <li><a href="#">Espaniol</a></li>
                        <li><a href="#">Portugise</a></li>
                    </ul>
                </li>
                <li class="c-search hide">
                    <form action="#">
                        <input type="text" name="query" placeholder="search..." value="" class="form-control" autocomplete="off">
                        <i class="fa fa-search"></i>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- END: INLINE NAV -->
    </div>
</div>
