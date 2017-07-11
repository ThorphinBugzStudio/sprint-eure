<?php $this->layout('back_layout', ['title' => 'Modifier de la catégorie']) ?>

<?php $this->start('main_content') ?>

<div class="global">
  <!-- Formulaire radiobutton pour changement de rôle -->
  <form action="" method="post">
    <div class="col-sm-12 col-md-8 py-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-edit fa-fw"></i> Modification de la catégorie
        </div>
        <div class="p-4">
          <!-- Catégorie -->
          <div class="family">
            <label for="family">Catégorie: </label>
            <span class="error"><?php if(!empty($error['exist'])) { echo $error['exist']; } ?></span>
            <span class="error"><?php if(!empty($error['family'])) { echo $error['family']; } ?></span><br>
            <input type="text" name="family" id="family" placeholder="Saisir un nom de catégorie..." value="<?php if(!empty($_POST['family'])) { echo $_POST['family'];} else { echo $family;} ?>" class="input-back"/>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-4 py-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-star fa-fw"></i> État de la catégorie
        </div>
        <div class="p-4">
          <?= $statusBox ?>
        </div>
      </div>

      <div class="panel panel-default mt-4">
        <div class="panel-heading">
          <i class="fa fa-gear fa-fw"></i> Paramètres
        </div>
        <div class="p-4">
          <div class="row w-100 mx-auto" style="text-align: center;">
            <input type="submit" name="submit" value="Ajouter" class="btn_ok w-50 mb-3"/>
          </div>
        </div>
      </div>

    </div>
  </form>
</div>

<?php $this->stop('main_content') ?>
