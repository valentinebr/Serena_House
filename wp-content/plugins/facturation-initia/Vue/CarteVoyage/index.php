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
        <!-- if le lien est cliqué -->
        <tr>
            <td>
                <select>
                    <option>50€</option>
                    <option>100€</option>
                    <option>150€</option>
                </select>
            </td>
            <td>
                <input type="text">
            </td>
            <td><input type="date"></td>
            <td><a href="#">+</a></td>
        </tr>

    </table>

    <a href="#">Ajouter une carte voyage</a>

    <input type="submit" value="Valider">
    <button type="button">Retour</button>
</div>
