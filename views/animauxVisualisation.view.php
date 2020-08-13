<?php ob_start(); ?>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">animal_id</th>
      <th scope="col">animal_nom</th>
      <th scope="col">animal_description</th>
      <th scope="col" colspan="2">actions</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($animaux as $animal) :?>
      <tr>
            <td scope="row"><?= $animal['animal_id'] ?></td>
            <td><?= $animal['animal_nom'] ?></td>
            <td><?= $animal['animal_description'] ?></td>
            <td>
                <form method="POST" action="">
                  <input type="hidden"  name="animal_id" value="<?= $animal['animal_id']  ?>"/>
                  <button class="btn btn-warning" type="submit">Modifier</button>
                </form>
            </td>
            <td>
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