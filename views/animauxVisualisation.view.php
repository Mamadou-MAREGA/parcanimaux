<?php ob_start(); ?>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">animal_id</th>
      <th scope="col">image</th>
      <th scope="col">animal_nom</th>
      <th scope="col">animal_description</th>
      <th scope="col" colspan="2">actions</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($animaux as $animal) :?>
      <tr>
            <td class="align-middle" scope="row"><?= $animal['animal_id'] ?></td>
            <td class="align-middle">
              <img src="<?= URL ?>public/images/<?= $animal['animal_image']?>" style="width:50px" />
            </td>
            <td class="align-middle"><?= $animal['animal_nom'] ?></td>
            <td class="align-middle"><?= $animal['animal_description'] ?></td>
            <td class="align-middle">
                <a href="<?= URL ?>back/animaux/modification/<?= $animal['animal_id'] ?>" class="btn btn-warning">Modifier</a>
            </td>
            <td class="align-middle">
                <form method="POST" action="<?= URL ?>back/animaux/validationSuppression" onSubmit="return confirm('Voulez-vous supprimer?')">
                    <input type="hidden"  name="animal_id" value="<?= $animal['animal_id']  ?>"/>
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
      </tr>  
    <?php endforeach ;?>
        
  </tbody>
</table>



<?php
  $content = ob_get_clean();
  $titre = "La visualisation des animaux";
  require_once ("views/commons/template.php");