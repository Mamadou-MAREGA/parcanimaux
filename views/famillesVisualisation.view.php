<?php ob_start(); ?>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">familles_id</th>
      <th scope="col">Libellé</th>
      <th scope="col">Description</th>
      <th scope="col" colspan="2">actions</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($familles as $famille) :?>
        <tr>
            <td scope="row"><?= $famille['famille_id'] ?></td>
            <td><?= $famille['famille_libelle'] ?></td>
            <td><?= $famille['famille_description'] ?></td>
            <td><button class="btn btn-warning">Modifier</button></td>
            <td>
                <form method="POST" action="<?= URL ?>back/familles/validationSuppression" onSubmit="return confirm('Voulez-vous supprimer?')">
                    <input type="hidden"  name="famille_id" value="<?= $famille['famille_id']  ?>"/>
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
            
        </tr>
    <?php endforeach ;?>
        
  </tbody>
</table>



<?php
    $content = ob_get_clean();
    $titre = "La visualisation des familles";
    require_once ("views/commons/template.php");