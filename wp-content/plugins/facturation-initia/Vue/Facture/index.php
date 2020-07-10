<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlFacture.php';

$titre = 'Mes factures';

ob_start();
?>

<?php
foreach ($annees as $a) { ?>
<a href="?ctrl=Facture&amp;action=historique&amp;annee=<?php echo $a?>"><?php echo $a ?></a>
<?php } ?>
<br>


<button type="button"><a  href="?ctrl=Facture&amp;action=ajouterFacture">Ajouter une facture</a></button>
