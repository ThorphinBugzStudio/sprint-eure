<?php $this->layout('back_layout', ['title' => 'Ajouter un produit']) ?>

<?php $this->start('main_content') ?>

<div class="global">
  <form action="" method="post" enctype="multipart/form-data">

    <div class="col-sm-12 col-md-8 py-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-plus fa-fw"></i> Nouveau produit
        </div>
        <div class="p-4">
          <!-- Catégorie : Désignation -->
          <div class="designation">
            <label for="designation">Désignation : </label>
            <input class="input-back" type="text" name="designation" id="designation" placeholder="Saisir un titre" value="<?php if(!empty($_POST['designation'])) { echo $_POST['designation'];} ?>" />
            <span class="error"><?php if(!empty($error['exist'])) { echo $error['exist']; } ?></span>
            <span class="error"><?php if(!empty($error['designation'])) { echo $error['designation']; } ?></span><br>
          </div>

          <!-- Catégorie : Description -->
          <div class="description mt-3">
            <label for="description">Description : </label>
            <textarea name="description" rows="8" cols="80" class="input-back" placeholder="Saisir une description de l'article..."><?php if(!empty($_POST['description'])) { echo $_POST['description'];} else { if(!empty($article['description'])) { echo $article['description']; }} ?></textarea>
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
                <input class="input-back" type="number" name="quantite" id="quantite" value="<?php if(!empty($_POST['quantite'])) { echo $_POST['quantite'];} ?>" />
                <span class="error"><?php if(!empty($error['quantite'])) { echo $error['quantite']; } ?></span><br>
              </div>

              <!-- Catégorie : Prix HT -->
              <div class="col-lg-6 ml-auto prix mt-3">
                <label for="prix">Prix HT : </label>
                <input class="input-back" type="text" name="prix" id="prix" value="<?php if(!empty($_POST['prix'])) { echo $_POST['prix'];} ?>" />
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
        </div>
      </div>

      <div class="panel panel-default mt-4">
        <div class="panel-heading">
          <i class="fa fa-gear fa-fw"></i> Paramètres
        </div>
        <!-- Catégorie : Article en avant ou non -->
        <div class="checkbox mx-5 p-2 my-3">
          <INPUT type="checkbox" name="home" value="1"> Mettre l'article en avant sur la page d'accueil
          <?php if(!empty($error['home'])) { echo '<p class="error">' . $error['home'] . '</p>'; } ?>
        </div>

        <!-- Bouton d'envoie -->
        <div class="row w-100 mx-auto" style="text-align: center;">
          <input type="submit" name="submit" value="Ajouter" class="btn_ok w-50 mb-3"/>
        </div>

      </div>
    </div>




      </form>
    </div>
<?php $this->stop('main_content') ?>
