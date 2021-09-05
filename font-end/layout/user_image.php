<!-- <button>Connexoin</button> -->

<?php if(isset($_SESSION['id_user'])): ?>
<img src="<?= $link_admin ?>/dist/img/user/participant/<?= Fonctions::user()->photo ?>" class="img-responsive img-circle">
<?php endif ?>

