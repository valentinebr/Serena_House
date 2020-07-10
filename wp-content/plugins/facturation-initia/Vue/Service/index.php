<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlService.php';

$titre = 'Mes services';

ob_start();
?>

<h1>Mes services</h1>

<table>
<tr>
    <th>Service</th>
    <th>Référence</th>
    <th>Prix HT</th>
    <th>Taxe</th>
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
                <td><a href="#" onclick="show('modifier-<?php echo $s->id_tsrv ?>', <?php echo $s->id_tsrv ?>, 'table-row')">Modifier</a></td>
                <td><a href="?ctrl=Service&amp;action=deleteTService&amp;id=<?php echo $s->id_tsrv ?>">Supprimer</a></td>
            </tr>
            <form action="?ctrl=Service&amp;action=updateTService" method="post" class="lignes">
                <tr id="modifier-<?php echo $s->id_tsrv ?>" style="display: none">
                    <td><input type="text" name="service" value="<?php echo $s->nom_tsrv ?>" required></td>
                    <td><input type="text" name="reference" value="<?php echo $s->reference_tsrv ?>" required></td>
                    <td><input type="text" name="prix-ht" value="<?php echo $s->prix_ht_tsrv ?>" required></td>
                    <td><select name="taxe" required>
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
                    <input type="hidden" name="id" value="<?php echo $s->id_tsrv ?>" required>
                    <td><input type="submit" value="Valider"></td>
                <td><a href="#"
                       onclick="show(<?php echo $s->id_tsrv ?>, 'modifier-<?php echo $s->id_tsrv ?>', 'table-row')">Annuler</a></td>
                </tr>
            </form>
            <?php
        }
}
    ?>
</table>
<div  id="show" style="display:none;">
        <form action="?ctrl=Service&amp;action=insertTService" method="post">
            <h2>Ajouter un service</h2>
            <label for="nom">Nom :</label>
            <input id="nom" type="text" name="service" required>
            <label for="reference">Référence :</label>
            <input id="reference" type="text" name="reference" required>
            <label for="prixHT">Prix HT :</label>
            <input id="prixHT" type="number" name="prix-ht" required>
            <label for="taxe">Taxe :</label>
            <select id="taxe" name="taxe" required>
                <?php foreach ($taxes as $t) { ?>
                    <option value="<?php echo $t->id_taxe ?>"><?php echo $t->taux_taxe?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Ajouter" name="ajouter">
            <button type="reset" name="annuler" onclick="show('lien', 'show', 'block'); return false;">Annuler</button>
        </form>
</div>


<!-- fonction JS pour afficher les champs pour ajouter le service -->
<a href="#" id="lien" onclick="show('show', 'lien', 'flex'); return false;">Ajouter un service</a>