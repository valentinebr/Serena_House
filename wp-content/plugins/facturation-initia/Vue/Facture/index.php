<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlFacture.php';

$titre = 'Mes factures';

ob_start();
?>

<button type="button"><a  href="?ctrl=Facture&amp;action=ajouterFacture">Ajouter une facture</a></button>
