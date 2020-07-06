<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlNuitee.php';

$titre = 'Nuitées';

ob_start();
?>

<h1>Gestion des tarifs des nuitées</h1>

<form method="post" action="?ctrl=Nuitee&amp;action=updateNuitee">
    <table>
        <tr style="display: block">
            <th>Nom</th>
            <th>Tarif</th>
            <th>Taxe</th>
        </tr>



        <?php foreach ($nuitees as $n) { ?>
            <tr id="<?php echo $n->id_nuitee ?>" style="display: block">
                <td><?php echo $n->nom_nuitee ?></td>
                <td><?php echo $n->tarif_nuitee. '€' ?></td>
                <td><?php echo $n->taux_taxe.'%' ?></td>

                <td><a href="#" onclick="show('modifier-<?php echo $n->id_nuitee ?>', <?php echo $n->id_nuitee ?>, 'block')">Modifier</a></td>
                <td><a href="?ctrl=Nuitee&amp;action=deleteNuitee&amp;id=<?php echo $n->id_nuitee?>">Supprimer</a></td>
            </tr>

            <tr id="modifier-<?php echo $n->id_nuitee ?>" style="display: none">
                <input type="hidden" value="<?php echo $n->id_nuitee?>" name="id-nuitee">

                <td><label for="id-nuitee">Nom : </label><input type="text" value="<?php echo $n->nom_nuitee ?>" name="nom-nuitee"></td>
                <td><label for="nombre-personnes-nuitee">Nombre de personnes : </label>
                    <input type="number" min="0" value="<?php echo $n->nombre_personnes_nuitee ?>" name="nombre-personnes-nuitee"></td>
                <td><label for="tarif-nuitee">Tarif : </label><input type="number" step="0.01" min="0" value="<?php echo $n->tarif_nuitee ?>" name="tarif-nuitee"></td>
                <td><label for="taxe-nuitee">Taxe : </label>
                    <select name="taxe-nuitee">
                        <?php foreach ($taxe as $t) { ?>
                            <option value="<?php echo $t->id_taxe ?>"
                                <?php if ($t->id_taxe == $n->id_taxe) {
                                    echo 'selected';
                                } ?>>
                            <?php echo $t->taux_taxe . '%' ?></option>
                        <?php }?>
                    </select>
                </td>

                <td><input type="submit" value="Valider"></td>
                <td><a href="#" onclick="show(<?php echo $n->id_nuitee ?>, 'modifier-<?php echo $n->id_nuitee ?>', 'block')">Annuler</a></td>
            </tr>
            <?php
        } ?>
    </table>
</form>

<a href="#" id="lien" onclick="show('show', 'lien', 'inline-block');return false;">Ajouter une nuitée</a>

<div id="show" style="display: none">
    <form method="post" action="?ctrl=Nuitee&amp;action=insertNuitee">
        <label for="nom-nuitee">Nom :</label>
        <input type="text" id="nom-nuitee" name="nom-nuitee">
        <label for="nombre-personnes-nuitee">Nombre de personne(s) :</label>
        <input type="number" min="0" id="nombre_personnes_nuitee" name="nombre-personnes-nuitee">
        <label for="tarif-nuitee">Tarif</label>
        <input type="number" step="0.01" min="0" id="tarif-nuitee" name="tarif-nuitee">
        <label for="taxe-nuitee">Taxe</label>
        <select name="taxe-nuitee" id="taxe-nuitee">
            <?php foreach ($taxe as $t) { ?>
            <option><?php echo $t->taux_taxe.'%'  ?></option>
            <?php } ?>
        </select>

        <input type="submit" value="Valider">
        <button onclick="show('lien', 'show', 'inline-block');return false;">Annuler</button>
    </form>
</div>