<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlTinyHouse.php';

$titre = 'Tiny houses';

ob_start();
?>

<h1>Tiny houses</h1>

<table border="solid">
    <tr>
        <th>Nom</th>
        <th>Tarif / nuitée (HT)</th>
        <th>Pour</th>
        <th>Taxe</th>
    </tr>

    <?php $i=0;
    foreach ($tinyHouse as $t) { ?>
    <tr>
        <?php if($recurrence[$t->nom_tiny]>1) {
            if ($i == 0) {
            $i++; ?>
                <td rowspan="<?php echo $recurrence[$t->nom_tiny] ?>"><?php echo $t->nom_tiny ?></td>
        <?php } else {
                $i++;
                if ($recurrence[$t->nom_tiny] == $i) {
                    $i=0;
                }
            }?>
        <?php } else {
            $i=0; ?>
            <td><?php echo $t->nom_tiny ?></td>
        <?php }?>
        <td><?php echo $t->tarif_nuitee.'€' ?></td>
        <td><?php echo $t->nombre_personnes_nuitee.' personnes'?></td>
        <td><?php echo $t->taux_taxe.'%' ?></td>
        <td><a href="#">Modifier</a></td>
        <td><a href="?ctrl=TinyHouse&amp;action=deleteTinyHouse&amp;id=<?php echo $t->id_tiny ?>">Supprimer</a></td>
    </tr>
    <?php } ?>
</table>

<a href="#" onclick="show('show', 'lien', 'block');return false;" id="lien">Ajouter une tiny house</a>

<div id="show" style="display: none">
    <form action="?ctrl=TinyHouse&amp;action=insertTinyHouse" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <label for="nombre-places">Nombre de places :</label>
        <input type="number" name="nombre-places" id="nombre-places">
        <label for="tarif">Accessible pour :</label>
            <?php foreach ($nuitee as $n) {?>
                <input type="checkbox" name="nuitee-<?php echo $n->id_nuitee ?>" id="tarif" value="<?php echo $n->id_nuitee ?>">
                <label for="<?php echo $n->id_nuitee ?>"><?php echo $n->nombre_personnes_nuitee.' personnes' ?></label>
            <?php } ?>
        <input type="submit" value="Valider">
        <button onclick="show('lien', 'show', 'block');return false;">Annuler</button>
    </form>
</div>