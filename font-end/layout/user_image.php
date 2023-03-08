<!-- <button>Connexoin</button> -->

<?php if(Fonctions::user()): ?>
<img src="<?= $link_admin ?>/dist/img/user/participant/<?= Fonctions::user()->photo ?>" onerror="this.src='https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1214428300?k=20&m=1214428300&s=170667a&w=0&h=NPyJe8rXdOnLZDSSCdLvLWOtIeC9HjbWFIx8wg5nIks='"
 class="img-responsive img-circle">
<?php endif ?>
