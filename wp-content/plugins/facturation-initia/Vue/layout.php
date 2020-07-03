<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require ($root.'/wp-load.php');

get_header();

?>

<nav>
    <a href="?ctrl=Accueil">Accueil</a>
    <a href="?ctrl=Service">Services</a>
    <a href="?ctrl=Societe">Société</a>
    <a href="?ctrl=CarteVoyage">Carte Voyage</a>
    <a href="?ctrl=CarteVoyage&amp;action=tarifCarteVoyage">Tarif Carte Voyage</a>
    <a href="?ctrl=Facture">Factures</a>
    <a href="?ctrl=Taxe">Taxes</a>
    <a href="?ctrl=TinyHouse">Tiny houses</a>
    <a href="?ctrl=Nuitee">Nuitées</a>
</nav>
<?php echo $contenu; ?>

<script type="text/javascript" src="http://localhost/Serena_House/wp-content/plugins/facturation-initia/JS/app.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossOrigin="anonymous"></script>

<?php
get_footer();
?>