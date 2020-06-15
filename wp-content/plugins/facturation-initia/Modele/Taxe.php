<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');

class Taxe extends ModeleDeDonnees
{

    function afficherTaxes () {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_taxe WHERE archive_taxe = %d";
        $datas = 0;

        return $this->executerGetResults($sql, $datas);
    }
}