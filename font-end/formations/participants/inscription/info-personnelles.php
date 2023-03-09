<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
    if (isset($_POST['enregistrer'])) {
        extract($_POST);
        // info sur le user
        Participant::ajouter(
        $nom,
        $prenom,
        $departement,
        $commune,
        $sexe,
        $profession,
        $numero,
        $email,
        $telephone2,
        $niveau,
        $domaine,
        $membre,
        $structure,
        $etude,
        $password,
        $password_confirmation,
        $formation->id);
    }
?>

<div class="col-md-12">
    <form id="myForm" method="post" role="form" data-parsley-validate action=""> 
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nom</label>
                        <input type="text" name="nom" value="<?php if (isset($_POST['nom'])) {
                            echo $_POST['nom'];
                        } ?>" class="form-control" data-parsley-maxlength="250" placeholder="Entrer votre nom" required="">
                </div>
                    <div class="col-md-6">
                        <label>Prénom</label>
                        <input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])) {
                            echo $_POST['prenom'];
                        } ?>" data-parsley-maxlength="250" class="form-control" placeholder="Entrer votre nom" required="">
                    </div>
                </div>
            </div>

            <div class=" form-group col-md-6">
                <label>Département</label>
                <select name="departement" class="form-control" required="">
                    <option value="">Choisir un département</option>
                    <option value="Nord" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Nord') {echo "selected";} ?>>Nord</option>
                    <option value="Nord-Est" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Nord-Est') {echo "selected";} ?>>Nord-Est</option>
                    <option value="Nord-Ouest" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Nord-Ouest') {echo "selected";} ?>>Nord-Ouest</option>
                    <option value="Sud" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Sud') {echo "selected";} ?>>Sud</option>
                    <option value="Sud-Est" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Sud-Est') {echo "selected";} ?>>Sud-Est</option>
                    <option value="Ouest" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Ouest') {echo "selected";} ?>>Ouest</option>
                    <option value="Centre" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Centre') {echo "selected";} ?>>Centre</option>
                    <option value="Artibonite" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Artibonite') {echo "selected";} ?>>Artibonite</option>
                    <option value="Nippes" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Nippes') {echo "selected";} ?>>Nippes</option>
                    <option value="Grand-Anse" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Grand-Anse') {echo "selected";} ?>>Grand-Anse</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label>Commune de résidence</label>
                <select name="commune" class="form-control"  required="">
                    <option value="">Commune de résidence</option>
                    <?php foreach (Query::liste_commune() as $commune) : ?>
                    <option  value="<?= $commune->commune ?>" <?php if (isset($_POST['commune']) and $_POST['commune'] == $commune->commune) {echo "selected";																																				} ?> ><?= $commune->commune ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            
            <div class="form-group  col-md-6">
                <label>Sexe</label>
                <select name="sexe" class="form-control" required="">
                    <option value="">Choisir une option</option>
                    <option value="Homme" <?php if (isset($_POST['sexe']) and $_POST['sexe'] == 'Homme') {echo "selected";} ?>>Homme</option>
                    <option value="Femme" <?php if (isset($_POST['sexe']) and $_POST['sexe'] == 'Femme') {echo "selected";} ?>>Femme</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label>Profession ou occupation</label>
                <input type="text" name="profession" value="<?php if (isset($_POST['profession'])) {echo $_POST['profession'];} ?>" data-parsley-maxlength="250" class="form-control" placeholder="Entrer votre profession" required="">
            </div>

            <div class="form-group  col-md-6">
                <label >Numero WhatsApp</label>
                <input type="text" name="numero" value="<?php if (isset($_POST['numero'])) {echo $_POST['numero'];
                } ?>" data-parsley-maxlength="250" class="form-control" placeholder="Entrer votre numero whatsapp" required="">
            </div>

            <div class="form-group  col-md-6">
                <label>Email</label>
                <input type="email" name="email" value="<?php if (isset($_POST['email'])) {echo $_POST['email'];
                } ?>" data-parsley-maxlength="250" class="form-control" placeholder="Entrer votre email" required="">
            </div>

            <div class="form-group  col-md-12">
                <label>Téléphone Alternatif</label>
                <input type="text" name="telephone2" value="<?php if (isset($_POST['telephone2'])) {echo $_POST['telephone2'];
                } ?>" data-parsley-maxlength="250" class="form-control" placeholder="Téléphone Alternatif">
            </div>

            <div class="form-group col-md-12">
                <label>Niveau de formation </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="niveau" <?php if (isset($_POST['niveau']) and $_POST['niveau'] == 'primaire') {echo "checked";} ?> id="primaire" value="primaire" required>
                    <label class="control-label" for="primaire">Primaire</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="niveau" id="secondaire" <?php if (isset($_POST['niveau']) and $_POST['niveau'] == 'secondaire') {echo "checked";} ?> value="secondaire" required>
                    <label class="control-label" for="secondaire">Secondaire</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="niveau" id="secondaire" <?php if (isset($_POST['niveau']) and $_POST['niveau'] == 'professionnel ou technique') {echo "checked";} ?> value="professionnel ou technique" required>
                    <label class="control-label" for="secondaire">Professionnel ou technique</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="niveau" id="universitaire" <?php if (isset($_POST['niveau']) and $_POST['niveau'] == 'universitaire') {echo "checked";} ?> value="universitaire" required>
                    <label class="control-label" for="universitaire">Universitaire</label>
                </div>
            </div>

            <div class="form-group col-md-12">
            <div id="universite_group" style="display:<?php if (isset($_POST['niveau']) and $_POST['niveau']=='universitaire') {echo 'block';}else{echo 'none';} ?>">
                    <label for="universite">Domaine d’étude </label>
                    <input type="text" class="form-control" id="universite" value="<?php if (isset($_POST['niveau']) and $_POST['niveau']=='universitaire') {echo $_POST['domaine'];}else{echo '';} ?>" name="domaine" placeholder="Entrer votre domaine d’étude " required>
                </div>
            </div>

            <div class="form-group col-md-12">
                <label>Êtes-vous:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input membre_oui" type="radio" name="membre" <?php if (isset($_POST['membre']) and $_POST['membre'] == 'Membre  d’une organisation de la société civile') {echo "checked";} ?>  value="Membre  d’une organisation de la société civile" required>
                    <label class="control-label" for="membre_oui">Membre  d’une organisation de la société civile</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input membre_oui" type="radio" name="membre"  <?php if (isset($_POST['membre']) and $_POST['membre'] == 'Membre d’un parti politique') {echo "checked";} ?> value="Membre d’un parti politique" required>
                    <label class="control-label" for="membre_oui">Membre d’un parti politique</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input membre_oui" type="radio" name="membre" <?php if (isset($_POST['membre']) and $_POST['membre'] == 'Journaliste & ou directeur de radio') {echo "checked";} ?> value="Journaliste & ou directeur de radio" required>
                    <label class="control-label" for="membre_oui">Journaliste & ou directeur de radio </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input membre_non" type="radio" name="membre" <?php if (isset($_POST['membre']) and $_POST['membre'] == 'Membre d’aucune structure') {echo "checked";} ?> value="Membre d’aucune structure" required>
                    <label class="control-label" for="membre_non">Membre d’aucune structure</label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <div id="structure_group" style="display:<?php if (isset($_POST['membre']) and $_POST['membre']!=='Membre d’aucune structure') {echo 'block';}else{echo 'none';} ?>">
                    <label for="structure">Précisez le nom de l'institution</label>
                    <input type="text" class="form-control" id="structure" name="structure" placeholder="Entrer le nom de l'organisation, du partie politique ou le nom de la radio" value="<?php if (isset($_POST['membre']) and $_POST['membre']!=='Membre d’aucune structure') {echo $_POST['structure'];}else{echo '';} ?>" >
                </div>
            </div>

            <div class="form-group col-md-12">
                <label>Aviez –vous participé à la dernière formation de l’OCID sur le suivi et évaluation des politiques publiques ?  </label><br>
                    <input type="radio" value="Oui"  name="etude" <?php if (isset($_POST['etude']) and $_POST['etude'] == 'Oui') {echo "checked";} ?> required>
                    <label class="control-label"  style="margin-bottom:-5px">
                        Oui
                    </label><br>

                    <input type="radio" value="Non"  name="etude" <?php if (isset($_POST['etude']) and $_POST['etude'] == 'Non') {echo "checked";} ?>>
                    <label class="control-label" style="margin-bottom:-5px">
                        Non
                    </label>
                </label>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Entrer un mot de passe</label>
                        <input type="password" placeholder="Mot de passe" data-parsley-trigger="keypress" class="form-control" data-parsley-maxlength="250" name="password" id="password1" data-parsley-minlength="6" required="">
                    </div>
                    <div class="col-md-6">
                        <label>Répéter le mot de passe</label>
                        <input type="password" data-parsley-equalto="#password1" name="password_confirmation" class="form-control" placeholder="Repeter le mot de passe" data-parsley-trigger="keypress" data-parsley-minlength="6" data-parsley-maxlength="250" required="">

                    </div>
                </div>
            </div>
            
            <hr>
        
            <div class="form-group col-md-12"></br>
                <p class="help-block">
                    <b>En vous inscrivant à cette formation, vous vous engagez à :</b> </br>
                    - Compléter l’intégralité de la formation : réaliser les exercices individuels et /ou en groupe correspondant à chaque thème abordé ; </br>
                    - Participer aux interactions sur le forum de discussions WhatsApp et consulter les ressources disponibles sur la plateforme ; </br>
                    - Compléter avec succès les deux Quiz proposés pour les deux modules de formation;
                </p>

                <div class="c-checkbox">
                    <input type="checkbox" id="checkbox1-110" value="Oui" name="condition" c-rkadio class="c-check" required="" <?php if (isset($_POST['condition']) == 'Oui') {echo "checked";} ?>>
                    <label for="checkbox1-110">
                        <span class="inc"></span>
                        <span class="check"></span>
                        <span class="box"></span>
                        J'accepte les conditions d'utilisations
                    </label>
                </div>
            </div>
                
                <div class="form-group col-md-12" role="group">
                    <button type="submit" name="enregistrer" class="btn btn-lg c-theme-btn c-btn-uppercase c-btn-bold">S'inscrire</button>
                    <button type="reset" class="btn btn-lg btn-default c-btn-uppercase c-btn-bold">Annuler</button>
                </div>
        </div>
    </form>

</div>


<script>
  $(document).ready(function() {
    // Question 1
    $('#universitaire').click(function() {
      $('#universite_group').show();
      $('#universite').prop('required',true);
    });
    $('#primaire, #secondaire').click(function() {
      $('#universite_group').hide();
      $('#universite').prop('required',false);
    });

    // Question 2
    $('.membre_non').click(function() {
      $('#structure_group').hide();
      $('#structure').prop('required',false);
    });
    $('.membre_oui').click(function() {
      $('#structure_group').show();
      $('#structure').prop('required',true);
    });

    // ParsleyJS
    $('#myForm').parsley();
  });
</script>

  <style>
    /* Les styles de Parseley */
    .parsley-error {
      border-color: #ff0000 !important;
      background-color: #ffeeee !important;
    }
    .parsley-errors-list {
      margin: 0;
      padding: 0;
      color: #ff0000;
      list-style-type: none;
    }
  </style>





