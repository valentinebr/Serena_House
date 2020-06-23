<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlService.php';

$titre = 'Mes services';

ob_start();
?>

<h1>Mes services</h1>

<div class="titres">
    <h2 class="column-1">Service</h2>
    <h2 class="column-2">Référence</h2>
    <h2 class="column-3">Prix HT</h2>
    <h2 class="column-4">Taxe</h2>
</div>

<!-- Foreach pour afficher tous les services liés à un utilisateur -->

<?php
    foreach ($services as $s) {
        if ($s->archive == 0) {
            ?>
            <div id="<?php echo $s->id_tsrv ?>" class="lignes">
                <p class="column-1"><?php echo $s->nom_tsrv ?></p>
                <p class="column-2"><?php echo $s->reference_tsrv ?></p>
                <p class="column-3"><?php echo $s->prix_ht_tsrv . ' €' ?></p>
                <p class="column-4"><?php echo $s->taux_taxe.'%' ?></p>
                <a class="column-5" href="#"
                       onclick="show('modifier-<?php echo $s->id_tsrv ?>', <?php echo $s->id_tsrv ?>)">Modifier</a>
                <a class="column-6" href="?ctrl=Service&amp;action=deleteTService&amp;id=<?php echo $s->id_tsrv ?>">Supprimer</a>
            </div>
                <form action="?ctrl=Service&amp;action=updateTService" method="post" class="lignes"
                      id="modifier-<?php echo $s->id_tsrv ?>" style="display: none">
                    <input type="hidden" name="id" value="<?php echo $s->id_tsrv ?>" required>
                    <input class="column-1" type="text" name="service" value="<?php echo $s->nom_tsrv ?>" required>
                    <input class="column-2" type="text" name="reference" value="<?php echo $s->reference_tsrv ?>" required>
                    <input class="column-3" type="text" name="prix-ht" value="<?php echo $s->prix_ht_tsrv ?>" required>
                    <select class=column-4" name="taxe" required>
                        <?php foreach ($taxes as $t) { ?>
                            <option value="<?php echo $t->id_taxe ?>"
                                <?php if ($t->id_taxe == $s->id_taxe) {
                                    echo 'selected';
                                } ?>
                            >
                                <?php echo $t->taux_taxe ?>
                            </option>
                        <?php } ?>
                    </select>
                    <input class="column-5" type="submit" value="Valider">
                    <a class="column-6" href="#"
                       onclick="showFlex(<?php echo $s->id_tsrv ?>, 'modifier-<?php echo $s->id_tsrv ?>')">Annuler</a>
                </form>
        <?php
        }
    }
    ?>

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
            <button  class="column-6" type="reset" name="annuler" onclick="show('lien', 'show'); return false;">Annuler</button>
        </form>

<!-- fonction JS pour afficher les champs pour ajouter le service -->
<a href="#" id="lien" onclick="showFlex('show', 'lien'); return false;">Ajouter un service</a>