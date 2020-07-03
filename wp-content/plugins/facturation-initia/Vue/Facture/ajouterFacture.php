<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlFacture.php';

$titre = 'Mes factures';

ob_start();
?>

<h1>Ajouter une facture</h1>
<h2><?php echo $societe[0]->nom_tiny . '-'. date("d/m/Y") ?></h2>

<h3>Les services</h3>

<form method="post" action="?ctrl=Facture&amp;action=insertFacture">

    <?php foreach ( $nth as $n) { ?>
            <label><?php echo $n->nom_nuitee ?> :</label>
            <input class="input" type="number" min="0" onchange="affichageFacture('nuitée', <?php echo htmlspecialchars(json_encode($n))?>, this.value);calculTotal(<?php echo htmlspecialchars(json_encode($nth)).','. htmlspecialchars(json_encode($services))?>);" id="<?php echo $n->id_nuitee?>" name="nb-nuitees-<?php echo $n->id_nuitee ?>"><br>
    <?php } ?>


    <input type="hidden" name="nom-fact" value="<?php echo $societe[0]->tiny_house_ste . '-'. date("d/m/Y") ?>">

    <?php foreach ($services as $s) { ?>
        <label for="<?php echo $s->id_tsrv ?>"><?php echo $s->nom_tsrv ?> :</label>
        <input class="input" type="number" min="0" onchange="affichageFacture('service', <?php echo htmlspecialchars(json_encode($s)) ?>, this.value);calculTotal(<?php echo htmlspecialchars(json_encode($nth)).','. htmlspecialchars(json_encode($services))?>);"  id="<?php echo $s->id_tsrv ?>" name="nb-service-<?php echo $s->id_tsrv ?>"><br>
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
            <td><?php echo $n->tarif_nuitee.'€'?></td>
            <td id="quantite-nuitee-<?php echo $n->id_nuitee ?>">0</td>
            <td id="tarif-ht-nuitee-<?php echo $n->id_nuitee ?>">0 €</td>
            <td><?php echo $n->taux_taxe .'%' ?></td>
            <td id="tarif-taxe-nuitee-<?php echo $n->id_nuitee ?>">0 €</td>
            <td id="tarif-ttc-nuitee-<?php echo $n->id_nuitee ?>">0 €</td>
        </tr>
    <?php } ?>

    <?php foreach ($services as $s) {?>
    <tr>
        <td><?php echo $s->nom_tsrv?></td>
        <td><?php echo $s->reference_tsrv?></td>
        <td><?php echo $s->prix_ht_tsrv?></td>
        <td id="quantite-service-<?php echo $s->id_tsrv ?>">0</td>
        <td id="tarif-ht-service-<?php echo $s->id_tsrv ?>">0 €</td>
        <td><?php echo $s->taux_taxe.'%' ?></td>
        <td id="tarif-taxe-service-<?php echo $s->id_tsrv ?>">0 €</td>
        <td id="tarif-ttc-service-<?php echo $s->id_tsrv ?>">0 €</td>
    </tr>
    <?php } ?>


    <tr style="font-weight: bolder">
        <td style="border: none"> </td>
        <td style="border-left: none; border-bottom: none"> </td>
        <td>Total :</td>
        <td id="total-quantite">0</td>
        <td id="total-unitaire-ht">0 €</td>
        <td> </td>
        <td id="total-tva">0 €</td>
        <td id="total-prix-ttc">0 €</td>
    </tr>
</table>