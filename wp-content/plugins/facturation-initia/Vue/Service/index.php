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

<?php foreach ($services as $s) { ?>
    <tr id="<?php echo $s->id_tsrv ?>">
        <td><?php echo $s->nom_tsrv ?></td>
        <td><?php echo $s->reference_tsrv ?></td>
        <td><?php echo $s->prix_ht_tsrv . ' €' ?></td>
        <td><?php echo $s->libelle_taxe ?></td>
        <td><a href="#" onclick="show('modifier-<?php echo $s->id_tsrv ?>', <?php echo $s->id_tsrv ?>)">Modifier</a></td>
        <td><a href="#">Supprimer</a></td>
    </tr>

    <div id="modifier-<?php echo $s->id_tsrv ?>" style="display: none">
        <form>
            <input type="text" value="<?php echo $s->nom_tsrv ?>">
            <input type="text" value="<?php echo $s->reference_tsrv ?>">
            <input type="text" value="<?php echo $s->prix_ht_tsrv ?>">
            <input type="text" value="<?php echo $s->libelle_taxe ?>">
            <a href="#">Valider</a></td>
            <a href="#" onclick="show(<?php echo $s->id_tsrv ?>, 'modifier-<?php echo $s->id_tsrv ?>')">Annuler</a>
        </form>
    </div>
<?php } ?>
</table>

    <div id="show">
        <form action="?ctrl=Service&amp;action=insertService" method="post">
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