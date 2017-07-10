<?php $this->layout('back_layout', ['title' => 'Ajouter une categorie d\'article']) ?>

<?php $this->start('main_content') ?>

<h2>Ajouter une categorie d'article</h2>

<div class="global">

  <form action="" method="post">

    <div class="family">
      <label for="family">categorie: </label>
      <span class="error"><?php if(!empty($error['family'])) { echo $error['family']; } ?></span><br>
      <input type="text" name="family" id="family" value="<?php if(!empty($_POST['family'])) { echo $_POST['family'];} ?>" />
    </div>

    <div class="checkbox">
         <span class="error"><?php if(!empty($error['status'])) { echo $error['status']; } ?></span><br>
         <INPUT type= "checkbox" name="status" value=""> rendre disponible sur le site cette categorie d'articles ?
    </div>



    <br><input type="submit" name="submit" value="Ajouter" />

      </form>
    </div>
<?php $this->stop('main_content') ?>
