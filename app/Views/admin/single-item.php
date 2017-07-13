<?php $this->layout('back_layout', ['title' => 'Modifier le produit']) ?>

<?php $this->start('main_content') ?>

<div class="global">
  <form action="" method="post" enctype="multipart/form-data">

    <div class="col-sm-12 col-md-8 py-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-edit fa-fw"></i> Modification de l'article
        </div>
        <div class="p-4">
          <!-- Catégorie : Désignation -->
          <div class="designation">
            <label for="designation">Désignation : </label>
            <input class="input-back" type="text" name="designation" id="designation" placeholder="Saisir un titre" value="<?php if(!empty($_POST['designation'])) { echo $_POST['designation'];} else { echo $item['designation'] ;}?>" />
            <span class="error"><?php if(!empty($error['exist'])) { echo $error['exist']; } ?></span>
            <span class="error"><?php if(!empty($error['designation'])) { echo $error['designation']; } ?></span><br>
          </div>

          <!-- Catégorie : Description -->
          <div class="description mt-3">
            <label for="description">Description : </label>
            <textarea name="description" rows="8" cols="80" class="input-back" placeholder="Saisir une description de l'article..."><?php if(!empty($_POST['description'])) { echo $_POST['description'];}
            elseif(!empty($article['description'])) { echo $article['description']; }
            else { echo $item['description'] ;}  ?></textarea>
            <span class="error"><?php if(!empty($error['description'])) { echo $error['description']; } ?></span><br>
          </div>

          <!-- Catégorie : Catégorie de produit -->
          <div class="famille mt-3">
            <label for="famille">Catégorie de produit : </label>
            <select width="100" name="famille" class="input-back b-radius-left">
              <?php foreach ($family as $famille) { ?>
                <option value="<?php echo $famille['id']; ?>"><?php echo $famille['family']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="row">
              <!-- Catégorie : Quantité -->
              <div class="col-lg-6 mr-auto quantite mt-3">
                <label for="quantite">Quantité par packaging : </label>
                <input class="input-back" type="number" name="quantite" id="quantite" value="<?php if(!empty($_POST['quantite'])) { echo $_POST['quantite'];} else{ echo $item['packaging']; } ?>" />
                <span class="error"><?php if(!empty($error['quantite'])) { echo $error['quantite']; } ?></span><br>
              </div>

              <!-- Catégorie : Prix HT -->
              <div class="col-lg-6 ml-auto prix mt-3">
                <label for="prix">Prix HT : </label>
                <input class="input-back" type="text" name="prix" id="prix" value="<?php if(!empty($_POST['prix'])) { echo $_POST['prix'];} else { echo $item['puht']; }?>" />
                <span class="error"><?php if(!empty($error['prix'])) { echo $error['prix']; } ?></span><br>
              </div>
            </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-4 py-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-picture-o fa-fw"></i> Miniature de l'article
        </div>
      <!-- Catégorie : Image à la une -->
        <div class="image m-4">
          <input type="file" name="image" style="max-width: 100%;">
          <?php if(!empty($error['image'])) { echo '<p class="error">' . $error['image'] . '</p>'; } ?>

          <?php
          // CONDITION : Si il y a une miniature, alors on l'affiche. Sinon, une image par défaut sera installé, le temps d'avoir une miniature.
          if(!empty($item['img_name'])) { ?>
            <img src="<?= $this->assetUrl('img/uploaded_articles/' . $item['img_name'] . '') ?>" alt="Miniature" class="hvr-grow mt-3">
          <?php } else { ?>
            <img src="<?= $this->assetUrl('img/avatar-default.png') ?>" alt="Miniature par défaut" class="hvr-grow mt-3">
          <?php } ?>
        </div>
      </div>
<!--
      <input class="input-back" type="text" name="img_name" id="img_name" placeholder="Saisir un titre" value="<?php if(!empty($_POST['img_name'])) { echo $_POST['img_name'];} else { echo $item['img_name'] ;}?>" />
-->

      <div class="panel panel-default mt-4">
        <div class="panel-heading">
          <i class="fa fa-gear fa-fw"></i> Paramètres
        </div>
        <!-- Catégorie : Article en avant ou non -->
        <div class="checkbox mx-5 p-2 my-3">
          <INPUT type="checkbox" name="home" value="1"> Mettre l'article en avant sur la page d'accueil
          <?php if(!empty($error['home'])) { echo '<p class="error">' . $error['home'] . '</p>'; } ?>
        </div>

        <!-- Catégorie : Status -->
        <div class="px-4">
          <?= $statusBox ?>
        </div>

        <!-- Bouton d'envoie -->
        <div class="row w-100 mx-auto" style="text-align: center;">
          <input type="submit" name="submit" value="Modifier" class="btn_ok w-50 mb-3"/>
        </div>

      </div>
    </div>




      </form>
    </div>


<?php $this->stop('main_content') ?>
