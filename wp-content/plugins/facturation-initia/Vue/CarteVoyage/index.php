<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlCarteVoyage.php';

$titre = 'Mes cartes voyage';

ob_start();
?>

<div class="container">
    <table>
        <tr>
            <th>Carte</th>
            <th>Référence</th>
            <th>Date de la vente</th>
        </tr>

        <!-- if le + ou le valider est cliqué -->

        <?php foreach($carteVoyage as $cv){ ?>
            <tr>
                <td><?php echo $cv->price ?></td>
                <td><?php echo $cv->code ?></td>
                <td><?php echo $cv->start_date ?></td>
            </tr>
        <?php } ?>


    </table>

    <!-- if le lien est cliqué -->
    <div id="show" style="display:none;">
        <form action="" method="post">
            <tr>
                <td>
                    <select name="price">
                        <?php foreach ($tarifCarteVoyage as $tcv){ ?>
                            <option><?php echo $tcv->tarif_tcv ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <input type="text" name="reference">
                </td>
                <td><input type="date" name="start_date"></td>
                <td><a href="#" id="plus" onclick="addLigne('show', <?php echo htmlspecialchars(json_encode($tarifCarteVoyage)); ?>);">+</a></td>
            </tr>

            <input type="submit" value="Valider">
            <button name="annluer" onclick="show('lien', 'show'); return false;">Annuler</button>
        </form>
    </div>

    <div style="display:flex;">
        <a href="#" id="lien" onclick="show('show', 'lien'); return false;">Ajouter une carte voyage</a>
        <button name="retour">Retour</button>
    </div>

</div>
