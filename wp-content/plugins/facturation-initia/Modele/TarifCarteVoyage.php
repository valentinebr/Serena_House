<?php
require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');
require_once (__ROOT__.'/../../wp-config.php');

class TarifCarteVoyage extends ModeleDeDonnees
{

    function afficherTarifCarteVoyage(){
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tarif_carte_voyage tcv
                INNER JOIN {$wpdb->prefix}fact_taxe t ON tcv.id_taxe = t.id_taxe
                WHERE archive_tcv = %d";
        $datas = 0;

        return $this->executerGetResults($sql, $datas);
    }

    function insertNewTarifCarteVoyage($values){
        global $wpdb;

        $table = $wpdb->prefix.'fact_tarif_carte_voyage';
        $datas = array(
          'nom_tcv'         =>      $values[0],
          'tarif_tcv'       =>      $values[1],
          'id_taxe'         =>      $values[2],
          'archive_tcv'     =>      0
        );

        $this->executerInsert($table, $datas);
    }

    function updateFieldTarifCarteVoyage($id){
        global $wpdb;

        $table = $wpdb->prefix.'fact_tarif_carte_voyage';
        $datas = array('archive_tcv' => 1);
        $where = array('id_tcv' => $id);

        $this->executerUpdate($table, $datas, $where);
    }

}