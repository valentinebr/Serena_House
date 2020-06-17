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
        <th>TVA</th>
    </tr>

<!-- Foreach pour afficher tous les services liés à un utilisateur -->

<?php
    foreach ($services as $s) {
        if ($s->archive == 0) {
            ?>
            <tr id="<?php echo $s->id_tsrv ?>">
                <td><?php echo $s->nom_tsrv ?></td>
                <td><?php echo $s->reference_tsrv ?></td>
                <td><?php echo $s->prix_ht_tsrv . ' €' ?></td>
                <td><?php echo $s->libelle_taxe ?></td>
                <td><a href="#"
                       onclick="show('modifier-<?php echo $s->id_tsrv ?>', <?php echo $s->id_tsrv ?>)">Modifier</a></td>
                <td><a href="?ctrl=Service&amp;action=deleteTService&amp;id=<?php echo $s->id_tsrv ?>">Supprimer</a></td>
            </tr>

            <div id="modifier-<?php echo $s->id_tsrv ?>" style="display: none">
                <form action="?ctrl=Service&amp;action=updateTService" method="post">
                    <input type="hidden" name="id" value="<?php echo $s->id_tsrv ?>">
                    <input type="text" name="service" value="<?php echo $s->nom_tsrv ?>">
                    <input type="text" name="reference" value="<?php echo $s->reference_tsrv ?>">
                    <input type="text" name="prix-ht" value="<?php echo $s->prix_ht_tsrv ?>">
                    <select name="taxe">
                        <?php foreach ($taxes as $t) { ?>
                            <option value="<?php echo $t->id_taxe ?>"
                                <?php if ($t->id_taxe == $s->id_taxe) {
                                    echo 'selected';
                                } ?>
                            >
                                <?php echo $t->libelle_taxe ?>
                            </option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="Valider">
                    <a href="#"
                       onclick="show(<?php echo $s->id_tsrv ?>, 'modifier-<?php echo $s->id_tsrv ?>')">Annuler</a>
                </form>
            </div>
        <?php
        }
    }
    ?>
</table>

    <div id="show" style="display:none;">
        <form action="?ctrl=Service&amp;action=insertTService" method="post">
            <input type="text" name="service">
            <input type="text" name="reference">
            <input type="number" name="prix-ht">
            <select name="taxe">
                <?php foreach ($taxes as $t) { ?>
                <option value="<?php echo $t->id_taxe ?>"><?php echo $t->libelle_taxe?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Ajouter" name="ajouter">
            <button type="reset" name="annuler">Annuler</button>
        </form>
    </div>


<!-- fonction JS pour afficher les champs pour ajouter le service -->
<a href="#" id="lien" onclick="show('show', 'lien'); return false;">Ajouter un service</a>