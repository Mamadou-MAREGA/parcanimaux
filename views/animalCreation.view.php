<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>back/animaux/creationValidation" enctype="multipart/form-data">
  <div class="form-group">
    <label for="animal_nom">Nom de l'animal</label>
    <input type="text" class="form-control" id="famille_libelle" aria-describedby="animal_nom" name="animal_nom">
  </div>
  <div class="form-group">
    <label for="animal_description">Description</label>
    <textarea class="form-control" name="animal_description" id="animal_description"></textarea>
  </div>
  <div class="form-group">
    <label for="animal_image">Image</label>
    <input type="file" class="form-control-file" id="animal_image" name="animal_image">
  </div>
  <div class="form-group">
    <label for="famille">Famille : </label>
    <select class="form-control" name="famille_id">
      <option value=""></option>
        <?php foreach ($familles as $famille) : ?>
            <option value="<?= $famille['famille_id'] ?>"><?= $famille['famille_id'] ?> - <?= $famille['famille_libelle'] ?></option>
        <?php endforeach ; ?>
    </select>
  </div>
  <div class="row no-gutters">
    <div class="col-1"></div>
      <?php foreach($continents  as $continent ) : ?>
        <div class="form-group form-check col-2">
          <input type="checkbox" class="form-check-input " name="continent-<?= $continent['continent_id']; ?>">
          <label class="form-check-label" for="exampleCheck1"><?= $continent['continent_libelle']?></label>
        </div>
      <?php endforeach; ?>
    <div class="col-1"></div>
  
  </div>
  <button type="submit" class="btn btn-primary">Créer</button>
</form>

<?php
  $content = ob_get_clean();
  $titre = "Page de création d'un animal";
  require_once ("views/commons/template.php");