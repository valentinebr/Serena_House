<?php
require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');
require_once (__ROOT__.'/../../wp-config.php');

class TarifCarteVoyage extends ModeleDeDonnees
{

    function afficherTarifCarteVoyage(){
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tarif_carte_voyage WHERE archive_tcv = %d";
        $datas = 0;


        return $this->executerGetResults($sql, $datas);

    }

    //TO DO insertTarifCarteVoyage()
}