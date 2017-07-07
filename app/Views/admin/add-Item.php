<?php $this->layout('layout', ['title' => 'Ajouter un article']) ?>

<?php $this->start('main_content') ?>

<h2>Ajouter un article</h2>

<div class="global">

  <form action="" method="post" enctype="multipart/form-data">

    <div class="famille">
      <label for="famille">Categorie de produit: </label><br>
        <select width="100" name="famille">
          <?php foreach ($family as $famille) { ?>
            <option value="<?php echo $famille['id']; ?>"><?php echo $famille['family']; ?></option>
          <?php } ?>
        </select>
    </div>

    <div class="designation">
      <label for="designation">designation: </label>
      <span class="error"><?php if(!empty($error['designation'])) { echo $error['designation']; } ?></span><br>
      <input type="text" name="designation" id="designation" value="<?php if(!empty($_POST['designation'])) { echo $_POST['designation'];} ?>" />
    </div>

    <div class="description">
         <label for="description">Description: </label>
         <span class="error"><?php if(!empty($error['description'])) { echo $error['description']; } ?></span><br>
         <textarea name="description" rows="8" cols="80" ><?php if(!empty($_POST['description'])) { echo $_POST['description'];} else { if(!empty($article['description'])) { echo $article['description']; }} ?></textarea>
    </div>

    <div class="quantite">
      <label for="quantite">Quantité par packaging: </label>
      <span class="error"><?php if(!empty($error['quantite'])) { echo $error['quantite']; } ?></span><br>
      <input type="number" name="quantite" id="quantite" value="<?php if(!empty($_POST['quantite'])) { echo $_POST['quantite'];} ?>" />
    </div>

    <div class="prix">
      <label for="prix">Prix HT: </label>
      <span class="error"><?php if(!empty($error['prix'])) { echo $error['prix']; } ?></span><br>
      <input type="text" name="prix" id="prix" value="<?php if(!empty($_POST['prix'])) { echo $_POST['prix'];} ?>" />
    </div>

    <div class="checkbox">
         <span class="error"><?php if(!empty($error['home'])) { echo $error['home']; } ?></span><br>
         <INPUT type= "checkbox" name="home" value="1"> Mettre l'article en avant sur la page d'accueil
    </div>

    <div class="image">
      <span class="error"><?php if(!empty($error['image'])) { echo $error['image']; } ?></span><br>
      <input type="file" name="image" >
    </div>

    <br><input type="submit" name="submit" value="Ajouter" />

      </form>
    </div>
<?php $this->stop('main_content') ?>
