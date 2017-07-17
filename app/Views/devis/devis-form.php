<?php $this->layout('layout', ['title' => 'Demande de devis']) ?>

<?php $this->start('main_content') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r68/three.min.js"></script>
<script src="https://rawgit.com/mrdoob/three.js/master/examples/js/controls/TrackballControls.js"></script>

<div class="row" style="justify-content: space-between">

   <div class="col-lg-6 col-sm-12">

      <form class="" action="<?php $this->url('devis_action') ?>" enctype="multipart/form-data" method="post">

         <!-- Section : E-mail -->
         <label for="email">E-mail</label> <span class="error">*</span>
         <input class="input-form" type="text" name="email" value="<?php if(!empty($_POST['email'])){ echo $_POST['email']; } else { echo $w_user['email']; } ?>">
         <?php if(!empty($error['email'])){ echo '<p id="error-email" class="error">' . $error['email'] . '</p>'; } ?>

         <!-- Section : Message / Specificités -->
         <label for="message">Votre demande (Specificités)</label> <span class="error">*</span>
         <textarea rows="12" cols="50" class="input-form" name="message" value="<?php if(!empty($_POST['message'])){ echo $_POST['message']; } else { echo $w_user['message']; } ?>"></textarea>
         <?php if(!empty($error['message'])){ echo '<p id="error-message" class="message">' . $error['message'] . '</p>'; } ?>

         <!-- Section : upload fichier -->
         <label for="stlfile">Fichier 3D au format stl</label>
         <input id="file" class="input-form" type="file" accept=".stl" name="stlfile" value="<?php if(!empty($_FILES['stlfile'])){ echo $_FILES['stlfile']; } ?>" style="max-width: 100%; overflow: hidden;">
         <?php if(!empty($error['stlfile'])){ echo '<p id="error-stlfile" class="error">' . $error['avatar'] . '</p>'; } ?>

         <div class="row mt-2">
           <input class="btn_ok mx-auto" type="submit" name="submit" value="Envoyer">
         </div>

      </form>

   </div>

   <div class="col-lg-5 col-sm-12">
      <!-- Visualisation fichier 3D -->
      <!-- id view utilisée dans js pour dimensionner image à la largeur de la div x 500px de haut -->
      <!-- ficher loader.js ligne 7 -->
      <div id="view"></div>
   </div>

</div>


<script src="<?= $this->assetUrl('js/loader.js') ?>"></script>
<script src="<?= $this->assetUrl('js/stl.js') ?>"></script>
<?php $this->stop('main_content') ?>
