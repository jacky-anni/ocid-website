

<?php
  require '../class/bdd/bdd.php';
  require '../class/Fonctions.php';
  require '../class/Query.php';
  
$article=  $_COOKIE['id'];
?>

<div class="box-footer no-padding">
  <ul class="nav nav-pills nav-stacked">
    <li style="padding: 10px; font-size: 17px;"> <b><i class="fa fa-image"></i>  Photos (<?= Query::count_prepare('photo',$article,'reference'); ?>) </b></li>
  </ul>
</div>

<?php foreach(Query::liste_prepare ('photo',$article,'reference',$limit=6) as $photo): ?>
  <div class="col-md-6">
  	<a class="example-image-link" data-lightbox="example-1" style="width: 10px;" ><img class="example-image product-img" src="dist/img/photos/<?= $photo->nom ?>" style="width: 100%;" /></a>
  </div>
<?php endforeach; ?></br></br></br></br></br></br></br>

<div class="col-md-12">
	<?php if(Query::count_prepare('photo',$article,'reference')>0): ?>
  <div class="box-footer text-center">
      <a href="?page=photo-activités&article=<?= $article ?>" class="uppercase"> <i class="fa fa-plus"></i> Voir plus de photos</a>
    </div>
  <?php endif; ?>
</div>


