<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlService.php';

$titre = 'Mes services';

ob_start();
?>

<h1>Mes services</h1>

<form action="?ctrl=Service&amp;action=updateTService" method="post" class="lignes">
<table>
<tr>
    <th class="column-1">Service</th>
    <th class="column-2">Référence</th>
    <th class="column-3">Prix HT</th>
    <th class="column-4">Taxe</th>
</tr>

<!-- Foreach pour afficher tous les services liés à un utilisateur -->

<?php foreach ($services as $s) {
        if ($s->archive == 0) {
            ?>
            <tr id="<?php echo $s->id_tsrv ?>">
                <td><?php echo $s->nom_tsrv ?></td>
                <td><?php echo $s->reference_tsrv ?></td>
                <td><?php echo $s->prix_ht_tsrv . ' €' ?></td>
                <td><?php echo $s->taux_taxe . '%' ?></td>
                <td><a href="#" onclick="show('modifier-<?php echo $s->id_tsrv ?>', <?php echo $s->id_tsrv ?>, 'block')">Modifier</a></td>
                <td><a class="column-6" href="?ctrl=Service&amp;action=deleteTService&amp;id=<?php echo $s->id_tsrv ?>">Supprimer</a></td>
            </tr>
                <tr id="modifier-<?php echo $s->id_tsrv ?>" style="display: none">
                    <td><input type="hidden" name="id" value="<?php echo $s->id_tsrv ?>" required></td>
                    <td><input class="column-1" type="text" name="service" value="<?php echo $s->nom_tsrv ?>" required></td>
                    <td><input class="column-2" type="text" name="reference" value="<?php echo $s->reference_tsrv ?>" required></td>
                    <td><input class="column-3" type="text" name="prix-ht" value="<?php echo $s->prix_ht_tsrv ?>" required></td>
                    <td><select class=column-4" name="taxe" required>
            <?php foreach ($taxes as $t) { ?>
                <option value="<?php echo $t->id_taxe ?>"
                    <?php if ($t->id_taxe == $s->id_taxe) {
                        echo 'selected';
                    } ?>
                >
                    <?php echo $t->taux_taxe ?>
                </option>
            <?php } ?>
                        </select></td>
                    <td><input class="column-5" type="submit" value="Valider"></td>
                <td><a class="column-6" href="#"
                       onclick="show(<?php echo $s->id_tsrv ?>, 'modifier-<?php echo $s->id_tsrv ?>', 'flex')">Annuler</a></td>
                </tr>
            <?php
        }
}
    ?>
</table>
</form>

        <form action="?ctrl=Service&amp;action=insertTService" method="post" class="lignes" id="show" style="display:none;">
            <input class="column-1" type="text" name="service" required>
            <input class="column-2" type="text" name="reference" required>
            <input class="column-3" type="number" name="prix-ht" required>
            <select class="column-4" name="taxe" required>
                <?php foreach ($taxes as $t) { ?>
                    <option value="<?php echo $t->id_taxe ?>"><?php echo $t->taux_taxe?></option>
                <?php } ?>
            </select>
            <input class="column-5" type="submit" value="Ajouter" name="ajouter">
            <button  class="column-6" type="reset" name="annuler" onclick="show('lien', 'show', 'block'); return false;">Annuler</button>
        </form>

<!-- fonction JS pour afficher les champs pour ajouter le service -->
<a href="#" id="lien" onclick="show('show', 'lien', 'flex'); return false;">Ajouter un service</a>