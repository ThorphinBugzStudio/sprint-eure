<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<h1>Section Inscription</h1>

<form style="display:flex;flex-direction:column;width:50%;" class="form-subscribe" action="" enctype="multipart/form-data" method="POST">

  <label for="firstname">Votre prénom</label>
  <input type="text" name="firstname" value="">

  <label for="lastname">Votre nom</label>
  <input type="text" name="lastname" value="">

  <label for="pseudo">Votre pseudo</label>
  <input type="text" name="pseudo" value="">

  <label for="email">Votre email</label>
  <input type="text" name="email" value="">

  <label for="avatar">Votre avatar</label>
  <input type="file" name="avatar" value="">

  <label for="password">Votre mot de passe</label>
  <input type="text" name="password" value="">

  <label for="password-confirm">Confirmez votre mot de passe</label>
  <input type="text" name="password-confirm" value="">

  <div style="display:flex;flex-direction:column;" class="first-adress">
    <label for="adress_1">Adresse</label>
    <input type="text" name="adress_1" value="">

    <label for="postal-code_1">Code postal</label>
    <input type="text" name="postal-code_1" value="">

    <label for="city_1">Ville</label>
    <input type="text" name="city_1" value="">

    <label for="country_1">Pays</label>
    <input type="text" name="country" value="">

<?php $adresses_types = ['facturation'=> 'Adresse de facturation',
                         'livraison' => 'Adresse de livraison']; ?>

    <label for="adress_type_1">Type d'adresse</label>

    <select class="" name="">
      <option value="">choisissez</option>
      <?php foreach($adresses_types as $adresse => $value)
      { ?>
        <option value="<?= $adresse?>"<?php if(!empty($_POST['adresse'])){ if($_POST['adresse'] == $adresse){ echo 'selected="selected"';} } ?>><?= $value ?></option>

    <?php  } ?>
    </select>

  </div>

  <input type="checkbox" name="check-facturation" value="">
  <label style="font-size:0.7em" for="both">Si votre adresse de facturation est la même que votre adresse de livraison cochez cette case</label>


  <div id=adresse_2 style="display:flex;flex-direction:column;" class="second-adress">
    <label for="adress_2">Adresse</label>
    <input type="text" name="adress_1" value="">

    <label for="postal-code_2">Code postal</label>
    <input type="text" name="postal-code_1" value="">

    <label for="city_2">Ville</label>
    <input type="text" name="city_1" value="">

    <label for="country_2">Pays</label>
    <input type="text" name="country" value="">

<?php $adresses_types = ['facturation'=> 'Adresse de facturation',
                         'livraison' => 'Adresse de livraison']; ?>

    <label for="adress_type_2">Type d'adresse</label>

    <select class="" name="">
      <option value="">choisissez</option>
      <?php foreach($adresses_types as $adresse => $value)
      { ?>
        <option value="<?= $adresse?>"<?php if(!empty($_POST['adresse'])){ if($_POST['adresse'] == $adresse){ echo 'selected="selected"';} } ?>><?= $value ?></option>

    <?php  } ?>
    </select>

  </div>

  <div class="">

  </div>







</form>

<input type="text" name="" value="">

<?php $this->stop('main_content') ?>
