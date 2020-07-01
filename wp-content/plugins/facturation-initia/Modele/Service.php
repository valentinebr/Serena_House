<?php

require_once __ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php';
require_once __ROOT__.'/../../wp-config.php';

class Service extends ModeleDeDonnees
{


    function afficherServices() {
        global $wpdb;
        $current_user = wp_get_current_user();

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tarif_service s
                                            INNER JOIN {$wpdb->prefix}fact_taxe t ON s.id_taxe=t.id_taxe
                                            WHERE s.id_user = %d AND s.archive_tsrv = %d";
        $datas = array($current_user->ID, 0);

        return $this->executerGetResults($sql, $datas);
    }

    function insertTarifService ($values) {
        global $wpdb;
        $current_user = wp_get_current_user();

        $table = $wpdb->prefix . "fact_tarif_service";
        $datas = array(
            'nom_tsrv'          =>      $values[0],
            'reference_tsrv'    =>      $values[1],
            'prix_ht_tsrv'      =>      $values[2],
            'archive_tsrv'      =>      0,
            'id_taxe'           =>      $values[3],
            'id_user'           =>      $current_user->ID
        );

        $this->executerInsert($table, $datas);
    }

    function updateTarifService ($id) {
        global $wpdb;

        $table = $wpdb->prefix."fact_tarif_service";
        $datas = array('archive_tsrv' => 1);
        $where = array('id_tsrv' => $id);

        $this->executerUpdate($table, $datas, $where);
    }

    function insertService ($values) {
        global $wpdb;
        $table = $wpdb->prefix . "fact_service";
        $datas = array(
            'nombre_srv'    =>      $values[0],
            'id_tsrv'       =>      $values[1],
            'id_fact'       =>      $values[2]);

        $this->executerInsert($table, $datas);
    }

}