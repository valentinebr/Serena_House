<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlFacture.php';

$titre = 'Mes factures';

ob_start();
?>

<h1>Ajouter une facture</h1>
<h2>Nom tiny house - <?php echo date("d/m/Y") ?></h2>

<h3>Les services</h3>

<form method="post" action="?ctrl=Facture&amp;action=insertService">

    <?php foreach ($services as $s) {?>

        <label for="<?php echo $s->id_tsrv ?>"><?php echo $s->nom_tsrv ?> :</label>
        <input type="number" min="0" id="<?php echo $s->id_tsrv ?>" name="nb-service-<?php echo $s->id_tsrv ?>"><br>

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
    <!-- Foreach pour recenser tous les services -->
    <tr>
        <td>Nuitées</td>
        <td>XXXXXXXX</td>
        <td>40</td>
        <td>15</td>
        <td>600</td>
        <td>20%</td>
        <td>120</td>
        <td>720</td>
    </tr>
    <!-- Fin du foreach -->
</table>

</body>
</html>