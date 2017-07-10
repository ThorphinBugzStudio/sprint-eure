<?php $this->layout('back_layout', ['title' => 'categorie']) ?>

<?php $this->start('main_content') ?>

<h1>Modifier la categorie</h1>

   <!-- formulaire radiobutton pour changement de role -->
   <form action="" method="post">

     <div class="family">
       <label for="family">categorie: </label>
       <span class="error"><?php if(!empty($error['exist'])) { echo $error['exist']; } ?></span>
       <span class="error"><?php if(!empty($error['family'])) { echo $error['family']; } ?></span><br>
       <input type="text" name="family" id="family" value="<?php if(!empty($_POST['family'])) { echo $_POST['family'];} else { echo $family;} ?>" />
     </div>

      <?= $statusBox ?>

      <div class="row w-100 mx-auto" style="text-align: center;">
        <input type="submit" name="submit" value="Ajouter" class="btn_ok w-50 mb-3"/>
      </div>
   </form>

<?php $this->stop('main_content') ?>
