<?php
require_once __ROOT__ . '/facturation-initia/Vue/CarteVoyage/tarifCarteVoyage.php';

$titre = 'Tarif Carte Voyage';

ob_start();
?>

<h1>Tarifs Carte Voyage</h1>

<div class="container">
    <table>
        <tr>
            <th>Nom</th>
            <th>Tarifs</th>
            <th>Taxe</th>
        </tr>

        <?php foreach($tarifCarteVoyage as $tcv) { ?>
            <tr>
                <td><?php echo $tcv->nom_tcv ?></td>
                <td><?php echo $tcv->tarif_tcv.'€' ?></td>
                <td><?php echo $tcv->taux_taxe.'%' ?></td>
            </tr>
        <?php } ?>

    </table>

    <div id="forms-tcv">
        <div id="tcv-1" style="display:none;">
            <form action="?ctrl=CarteVoyage&amp;action=insertTarifCarteVoyage" method="post">
                <label for="new-nom-tcv">Nom :</label>
                <input type="text" id="new-nom-tcv" nom="new-nom-tcv">

                <label for="new-tarif-tcv">Tarif : </label>
                <input type="number" step="0.01" min="0" id="new-tarif-tcv" name="new-tarif-tcv">

                <label for="taxe-tcv">Taxe : </label>
                <select name="taxe-tcv">
                    <?php foreach ($taxe as $t) { ?>
                        <option><?php echo $t->taux_taxe.'%' ?></option>
                    <?php }?>
                </select>
                
                <input type="submit" value="Valider">
                <button name="annuler-tarif" class="annuler" onclick="show('lien-2', 'tcv-1', 'block'); return false;">Annuler</button>
            </form>
        </div>
    </div>

    <div style="display: flex;">
        <a href="#" id="lien-2" onclick="show('tcv-1', 'lien-2', 'block'); return false;">Ajouter un tarif</a>
        <button name="retour">Retour</button>
    </div>

</div>

