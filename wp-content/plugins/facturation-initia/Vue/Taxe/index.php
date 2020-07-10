<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlTaxe.php';

$titre = 'Taxes';

ob_start();
?>

<h1>Gestion des taxes</h1>


<table>
    <tr>
        <th>Nom</th>
        <th>Taux</th>
    </tr>

    <?php foreach ($taxes as $t) { ?>
        <tr id="<?php echo $t->id_taxe ?>">
            <td><?php echo $t->libelle_taxe ?></td>
            <td><?php echo $t->taux_taxe . '%'?></td>

            <td><a href="#" onclick="show('modifier-<?php echo $t->id_taxe ?>', <?php echo $t->id_taxe ?>, 'table-row')">Modifier</a></td>
            <td><a href="?ctrl=Taxe&amp;action=deleteTaxe&amp;id=<?php echo $t->id_taxe?>">Supprimer</a></td>
        </tr>
    <form method="post" action="?ctrl=Taxe&amp;action=updateTaxe">
        <tr id="modifier-<?php echo $t->id_taxe ?>" style="display: none">
            <input type="hidden" value="<?php echo $t->id_taxe?>" name="id-taxe">
            <td><input type="text" value="<?php echo $t->libelle_taxe ?>" name="nom-taxe"></td>
            <td><input type="number" step="0.01" min="0" value="<?php echo $t->taux_taxe ?>" name="taux-taxe"></td>
            <td><input type="submit" value="Valider"></td>
            <td><a href="#" onclick="show(<?php echo $t->id_taxe ?>, 'modifier-<?php echo $t->id_taxe ?>', 'table-row')">Annuler</a></td>
        </tr>
    </form>
    <?php } ?>
</table>

<a href="#" id="lien" onclick="show('show', 'lien', 'inline-block');return false;">Ajouter une taxe</a>

<div id="show" style="display: none">
    <form method="post" action="?ctrl=Taxe&amp;action=insertTaxe">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom-taxe">
        <label for="taux">Taux :</label>
        <input type="number" step="0.01" min="0" id="taux" name="taux-taxe">
        <input type="submit" value="Valider">
        <button onclick="show('lien', 'show', 'inline-block');return false;">Annuler</button>
    </form>
</div>