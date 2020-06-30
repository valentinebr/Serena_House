<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlFacture.php';

$titre = 'Mes factures';

ob_start();
?>

<h1>Ajouter une facture</h1>
<h2><?php echo $societe[0]->nom_tiny . '-'. date("d/m/Y") ?></h2>

<h3>Les services</h3>

<form method="post" action="?ctrl=Facture&amp;action=insertService">

    <?php foreach ( $nth as $n) { ?>
            <label><?php echo $n->nom_nuitee ?> :</label>
            <input type="number" min="0" onchange="affichageFacture('nuitée', <?php echo htmlspecialchars(json_encode($n))?>);" id="<?php echo $n->id_nuitee?>" name="nb-nuitees-<?php echo $n->id_nuitee ?>"><br>

    <?php } ?>

    <input type="hidden" name="nom-fact" value="<?php echo $societe[0]->tiny_house_ste . '-'. date("d/m/Y") ?>">

    <?php foreach ($services as $s) { ?>
        <label for="<?php echo $s->id_tsrv ?>"><?php echo $s->nom_tsrv ?> :</label>
        <input type="number" min="0" onchange="affichageFacture('service', <?php echo htmlspecialchars(json_encode($s)) ?>);"  id="<?php echo $s->id_tsrv ?>" name="nb-service-<?php echo $s->id_tsrv ?>"><br>
    <?php } ?>
    <!-- Fin du foreach -->

    <input type="submit" value="Valider">
    <input type="button" value="Annuler">
</form>

<table>
    <tr>
        <th>Service</th>
        <th>Référence</th>
        <th>Prix unitaire HT</th>
        <th>Quantité</th>
        <th>Prix HT</th>
        <th>TVA</th>
        <th>Montant TVA</th>
        <th>Prix TTC</th>
    </tr>

    <?php foreach ($nth as $n) {?>
        <tr>
            <td><?php echo $n->nom_nuitee?></td>
            <td><?php echo $n->reference_nuitee?></td>
            <td><?php echo $n->tarif_nuitee?></td>
            <td id="quantite-nuitee-<?php echo $n->id_nuitee ?>"> </td>
            <td>600</td>
            <td>20%</td>
            <td>120</td>
            <td>720</td>
        </tr>
    <?php } ?>
    <!-- Foreach pour recenser tous les services -->
    <?php foreach ($services as $s) {?>
    <tr>
        <td><?php echo $s->nom_tsrv?></td>
        <td><?php echo $s->reference_tsrv?></td>
        <td><?php echo $s->prix_ht_tsrv?></td>
        <td id="quantite-nuitee-<?php echo $n->id_nuitee ?>"> </td>
        <td>600</td>
        <td>20%</td>
        <td>120</td>
        <td>720</td>
    </tr>
    <?php } ?>
    <!-- Fin du foreach -->
</table>