<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlTinyHouse.php';

$titre = 'Tiny houses';

ob_start();
?>

<h1>Tiny houses</h1>

<table>
    <tr>
        <th>Nom</th>
        <th>Nombre de places</th>
        <th>Tarif / nuitée</th>
        <th>Taxe</th>
    </tr>

    <?php foreach ($tinyHouse as $t) { ?>
    <tr>
        <td><?php echo $t->nom_tiny ?></td>
        <td><?php echo $t->nombre_places_tiny ?></td>
        <td><?php echo $t->tarif_nuitee ?></td>
        <td><?php echo $t->taux_taxe ?></td>
        <td><a href="#">Modifier</a></td>
        <td><a href="?ctrl=TinyHouse&amp;action=deleteTinyHouse&amp;id=<?php echo $t->id_tiny ?>">Supprimer</a></td>
    </tr>
    <?php } ?>
</table>

<a href="#" onclick="show('show', 'lien');return false;" id="lien">Ajouter une tiny house</a>

<div id="show" style="display: none">
    <form>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <label for="nombre-places">Nombre de places :</label>
        <input type="number" name="nombre-places" id="nombre-places">
        <label for="tarif">Tarif de la nuitée :</label>
        <select>
            <?php foreach ($nuitee as $n) {?>
            <option value="<?php echo $n->id_nuitee ?>"><?php echo $n->tarif_nuitee ?></option>
            <?php } ?>
        </select>
        <label>Taxe :</label>
        <select>
            <?php foreach ($taxe as $t) {?>
            <option value="<?php echo $t->id_taxe ?>"><?php echo $t->taux_taxe ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Valider">
        <button onclick="show('lien', 'show');return false;">Annuler</button>
    </form>
</div>