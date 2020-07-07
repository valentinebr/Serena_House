<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlCarteVoyage.php';

$titre = 'Mes cartes voyage';

$current_user = wp_get_current_user();
if (is_user_logged_in()){
    echo 'Connecté en tant que : '.$current_user->display_name .' qui a pour ID : '. $current_user->ID;
} else {
    echo 'Pas connecté';
}

ob_start();
?>

<h1>Carte Voyage</h1>

<div class="container">
    <table>
        <tr>
            <th>Carte</th>
            <th>Référence</th>
            <th>Date de la vente</th>
        </tr>

        <!-- if le + ou le valider est cliqué -->

        <?php foreach ($carteVoyage as $cv) { ?>
            <tr>
                <td><?php echo $cv->price ?></td>
                <td><?php echo $cv->code ?></td>
                <td><?php echo $cv->start_date ?></td>
            </tr>
        <?php }?>
    </table>

    <!-- if le lien est cliqué -->
    <div id="forms">
        <div id="form-1" style="display:none;">
            <form action="?ctrl=CarteVoyage&amp;action=insertCarteVoyage" method="post">

                    <label for="price">Tarif :</label>
                    <select name="price">
                        <?php foreach ($tarifCarteVoyage as $tcv) { ?>
                            <option value="<?php echo $tcv->id_tcv ?>"><?php echo $tcv->tarif_tcv ?></option>
                        <?php }?>
                    </select>

                    <label for="reference">Référence :</label>
                    <input type="text" name="reference">

                    <label for="start_date">Date : </label>
                    <input type="date" name="start_date">

                    <a href="#" id="plus-1" style="display:inline-block;" onclick="addLigne('form-1', <?php echo htmlspecialchars(json_encode($tarifCarteVoyage));?>); hide('plus-1');">+</a>


                <input type="submit" value="Valider">
                <button name="annuler" class="annuler" onclick="show('lien', 'form-1', 'block'); return false;">Annuler</button>
            </form>
        </div>
    </div>

    <div style="display:flex;">
        <a href="#" id="lien" onclick="show('form-1', 'lien', 'block'); return false;">Ajouter une carte voyage</a>
        <button name="retour">Retour</button>
    </div>
</div> <!-- END CONTAINER -->