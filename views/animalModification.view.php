<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>back/animaux/modificationValidation" enctype="multipart/form-data">
  <input type="hidden" name="animal_id" value="<?= $animal['animal_id']  ?>">
  <div class="form-group">
    <label for="animal_nom">Nom de l'animal</label>
    <input type="text" class="form-control" id="famille_libelle" aria-describedby="animal_nom" name="animal_nom" value="<?= $animal['animal_nom']?>">
  </div>
  <div class="form-group">
    <label for="animal_description">Description</label>
    <textarea class="form-control" name="animal_description" id="animal_description"><?= $animal['animal_description']?></textarea>
  </div>
  <div class="form-group">
      <img src="<?= URL?>public/images/<?=  $animal['animal_image'] ?>" style="width:50px" />
    <label for="animal_image">Image</label>
    <input type="file" class="form-control-file" id="animal_image" name="animal_image" >
  </div>
  <div class="form-group">
    <label for="famille">Famille : </label>
    <select class="form-control" name="famille_id">
      <option></option>
        <?php foreach ($familles as $famille) : ?>
            <option value="<?= $famille['famille_id'] ?>"
                <?php if ($famille['famille_id'] === $animal['famille_id']) echo "selected"; ?>
            >
                <?= $famille['famille_id'] ?> - <?= $famille['famille_libelle'] ?>
            </option>
        <?php endforeach ; ?>
    </select>
  </div>
  <div class="row no-gutters">
    <div class="col-1"></div>
      <?php foreach($continents  as $continent ) : ?>
        <div class="form-group form-check col-2">
          <input type="checkbox" class="form-check-input " name="continent-<?= $continent['continent_id']; ?>"
            <?php if(in_array($continent['continent_id'],$tabContinents)) echo "checked"; ?>
          >
          <label class="form-check-label" for="exampleCheck1"><?= $continent['continent_libelle']?></label>
        </div>
      <?php endforeach; ?>
    <div class="col-1"></div>
  
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
  $content = ob_get_clean();
  $titre = "Page de modification de l'animal : ". $animal['animal_nom'];
  require_once ("views/commons/template.php");