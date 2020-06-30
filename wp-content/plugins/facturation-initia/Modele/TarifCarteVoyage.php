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

    function insertNewTarifCarteVoyage($values){
        global $wpdb;

        $table = $wpdb->prefix.'fact_tarif_carte_voyage';
        $datas = array(
          'tarif_tcv'       =>      $values[0],
          'archive_tcv'     =>      0
        );

        $this->executerInsert($table, $datas);
    }

}