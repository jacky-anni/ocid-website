<div class="c-navbar">
<div class="container">
    <!-- BEGIN: BRAND -->
    <div class="c-navbar-wrapper clearfix">
        <div class="c-brand c-pull-left">
            <a href="index.html" class="c-logo">
                <img src="<?= $link_admin ?>/dist/img/logo/<?= $org->logo ?>" alt="" class="c-desktop-logo" style="width: 80px; position: absolute;top: 7px;">
                <img src="<?= $link_admin ?>/dist/img/logo/<?= $org->logo ?>" alt="" class="c-desktop-logo-inverse" style="width: 60px; position: absolute;top: 0px;">
                <img src="<?= $link_admin ?>/dist/img/logo/<?= $org->logo ?>" alt="" class="c-mobile-logo" style="width: 50px; position: relative; top: -12px; margin-bottom: -25px;">
            </a>
            <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
            <span class="c-line"></span>
            <span class="c-line"></span>
            <span class="c-line"></span>
            </button>
            <button class="c-topbar-toggler" type="button">
                <i class="fa fa-ellipsis-v"></i>
            </button>
            <button class="c-cart-toggler" type="button">
                <span style="width: 40px; position: absolute; top: 8px; right: 100px;">
                    <?php include('font-end/layout/user_image.php'); ?>
                </span>
                
            </button>
        </div>
        <!-- END: BRAND -->             
        <!-- BEGIN: QUICK SEARCH -->
        <form class="c-quick-search" action="#">
            <input type="text" name="query" placeholder="Type to search..." value="" class="form-control" autocomplete="off">
            <span class="c-theme-link">&times;</span>
        </form>
        <!-- END: QUICK SEARCH -->  
        <!-- BEGIN: HOR NAV -->
        <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
<!-- BEGIN: MEGA MENU -->
<!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->