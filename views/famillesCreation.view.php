<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>back/familles/creationValidation">
  <div class="form-group">
    <label for="famille_libelle">Libellés</label>
    <input type="text" class="form-control" id="famille_libelle" aria-describedby="famille_libelle" name="famille_libelle">
  </div>
  <div class="form-group">
    <label for="famille_description">Description</label>
    <textarea class="form-control" name="famille_description" id="famille_description"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
    $content = ob_get_clean();
    $titre = "Page de création d'une famille";
    require_once ("views/commons/template.php");