<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlFacture.php';

$titre = 'Factures - Année '. $annee;

ob_start();
?>

<table>
    <tr>
        <th> </th>
        <th>Nom</th>
        <th>Statut</th>
        <th>Facture</th>
    </tr>
    <?php
    $num = 0;
    foreach ($factures as $f) {
        $num++;
        ?>
    <tr>
        <td><?php echo $num ?></td>
        <td><?php echo $f->nom_fact ?></td>
        <td><?php echo $f->statut_fact?></td>
        <td><a href="<?php echo $f->pdf_fact ?>" target="_blank">Facture</a></td>
    </tr>
    <?php } ?>
</table>
