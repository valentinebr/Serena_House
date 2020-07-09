<?php
require_once __ROOT__ . '/facturation-initia/Controller/CtrlCarteVoyage.php';

$titre = 'Tarif Carte Voyage';

ob_start();
?>

<h1>Tarifs Carte Voyage</h1>

<div class="container">
    <form method="post" action="?ctrl=CarteVoyage&amp;action=updateTarifCarteVoyage">
        <table>
            <tr>
                <th>Nom</th>
                <th>Tarifs</th>
                <th>Taxe</th>
            </tr>

            <?php foreach($tarifCarteVoyage as $tcv) { ?>
                <tr id="<?php echo $tcv->id_tcv ?>" style="display: block">
                    <td><?php echo $tcv->nom_tcv ?></td>
                    <td><?php echo $tcv->tarif_tcv.'€' ?></td>
                    <td><?php echo $tcv->taux_taxe.'%' ?></td>

                    <td><a href="#" onclick="show('modifier-<?php echo $tcv->id_tcv ?>', <?php echo $tcv->id_tcv ?>, 'block')">Modifier</a></td>
                    <td><a href="?ctrl=CarteVoyage&amp;action=deleteCarteVoyage&amp;id=<?php echo $tcv->id_tcv?>">Supprimer</a></td>
                </tr>

                <tr id="modifier-<?php echo $tcv->id_tcv ?>" style="display: none">
                    <input type="hidden" value="<?php echo $tcv->id_tcv?>" name="id-tcv">

                    <td><label for="nom-tcv">Nom : </label><input type="text" value="<?php echo $tcv->nom_tcv ?>" name="nom-tcv"></td>
                    <td><label for="tarif-tcv">Tarif : </label>
                        <input type="number" step="0.01" min="0" value="<?php echo $tcv->tarif_tcv ?>" name="tarif-tcv">
                    </td>
                    <td><label for="taxe-tcv">Taxe : </label>
                        <select name="taxe-tcv">
                            <?php foreach ($taxe as $t) { ?>
                                <option value="<?php echo $t->id_taxe ?>"
                                    <?php if ($t->id_taxe == $tcv->id_taxe) {
                                        echo 'selected';
                                    } ?>>
                                    <?php echo $t->taux_taxe . '%' ?></option>
                            <?php }?>
                        </select>
                    </td>

                    <td><input type="submit" value="Valider"></td>
                    <td><a href="#" onclick="show(<?php echo $tcv->id_tcv ?>, 'modifier-<?php echo $tcv->id_tcv ?>', 'block')">Annuler</a></td>
                </tr>
            <?php } ?>
        </table>
    </form>

    <div id="forms-tcv">
        <div id="tcv-1" style="display:none;">
            <form action="?ctrl=CarteVoyage&amp;action=insertTarifCarteVoyage" method="post">
                <label for="nom-tcv">Nom :</label>
                <input type="text" id="nom-tcv" name="nom-tcv">

                <label for="tarif-tcv">Tarif : </label>
                <input type="number" step="0.01" min="0" id="tarif-tcv" name="tarif-tcv">

                <label for="taxe-tcv">Taxe : </label>
                <select id="taxe-tcv" name="taxe-tcv">
                    <?php foreach ($taxe as $t) { ?>
                        <option value="<?php echo $t->id_taxe ?>"><?php echo $t->taux_taxe.'%'  ?></option>
                    <?php } ?>
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

