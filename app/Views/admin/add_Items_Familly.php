<?php $this->layout('back_layout', ['title' => 'Ajouter une catégorie d\'article']) ?>

<?php $this->start('main_content') ?>


<div class="global">
  <form action="" method="post">

    <div class="col-sm-12 col-md-8 py-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-plus fa-fw"></i> Nouvelle catégorie
        </div>
        <div class="p-4">
          <!-- Catégorie -->
          <div class="family">
            <label for="family">Catégorie: </label>
            <span class="error"><?php if(!empty($error['exist'])) { echo $error['exist']; } ?></span>
            <span class="error"><?php if(!empty($error['family'])) { echo $error['family']; } ?></span><br>
            <input type="text" name="family" id="family" placeholder="Saisir un nom de catégorie..." value="<?php if(!empty($_POST['family'])) { echo $_POST['family'];} ?>" class="input-back" />
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-4 py-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-gear fa-fw"></i> Paramètres
        </div>

        <div class="checkbox mx-6">
          <span class="error"><?php if(!empty($error['status'])) { echo $error['status']; } ?></span><br>
          <INPUT type= "checkbox" name="status" value="deleted"> Ne pas rendre disponible sur le site, cette catégorie d'articles.
        </div>

        <br>
        <div class="row w-100 mx-auto" style="text-align: center;">
          <input type="submit" name="submit" value="Ajouter" class="btn_ok w-50 mb-3"/>
        </div>

      </div>
    </div>
  </form>
</div>
<?php $this->stop('main_content') ?>
