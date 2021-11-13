<?php session_start(); ?>
<?php
    // afficher les erreurs
    // ini_set('display_errors', 'on');
    // error_reporting(E_ALL);
    // selectionner la base de donne
    require('admin/class/bdd/bdd.php');
    // ajouter les fonctions identiques
    require 'admin/class/Fonctions.php';
    // module des requettes 
    require 'admin/class/Query.php';
    require 'font-end/layout/config.php';
    $org= Query::affiche('organisation',1,'id'); 
    ob_start();
?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
    <link href="<?= $link ?>/assets/plugins/socicon/socicon.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN: BASE PLUGINS  -->
    <link href="<?= $link ?>/assets/plugins/revo-slider/css/settings.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/revo-slider/css/layers.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/revo-slider/css/navigation.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/owl-carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/plugins/slider-for-bootstrap/css/slider.css" rel="stylesheet" type="text/css" />
    <!-- END: BASE PLUGINS -->
    <!-- BEGIN: PAGE STYLES -->
    <link href="<?= $link ?>/assets/plugins/ilightbox/css/ilightbox.css" rel="stylesheet" type="text/css" />
    <!-- END: PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?= $link ?>/assets/demos/index/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/demos/index/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="<?= $link ?>/assets/demos/index/css/themes/default.css" rel="stylesheet" id="style_theme" type="text/css" />
    <link href="<?= $link ?>/assets/demos/index/css/custom.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $link_admin ?>/bower_components/parsley/parsley.css" />
    <!-- END THEME STYLES -->

    <!-- BEGIN: BASE PLUGINS  -->
    <link href="<?= $link ?>/assets/plugins/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?= $link ?>/assets/plugins/owl-carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="<?= $link ?>/assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
    <link href="<?= $link ?>/assets/plugins/slider-for-bootstrap/css/slider.css" rel="stylesheet" type="text/css"/>
    <!-- END: BASE PLUGINS -->
    <link rel="icon" href="<?= $link_admin ?>/dist/img/logo/<?= $org->logo ?>" />

      <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CXR1K84EP2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-CXR1K84EP2');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-212028651-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-212028651-1');
    </script>

<!--     https://www.youtube.com/watch?v=ldqWfhZallw -->

</head>