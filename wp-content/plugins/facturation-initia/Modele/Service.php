<?php

require_once __ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php';
require_once __ROOT__.'/../../wp-config.php';

class Service extends ModeleDeDonnees
{


    function AfficherServices() {
        global $wpdb;
        $id = 3; //temporaire

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tarif_service s
                                            INNER JOIN {$wpdb->prefix}fact_taxe t ON s.id_taxe=t.id_taxe
                                            WHERE s.id_user = %d AND s.archive_tsrv = %d";
        $datas = array($id, 0);

        return $this->executerGetResults($sql, $datas);
    }

    function insertTarifService ($values) {
        global $wpdb;
        $table = $wpdb->prefix . "fact_tarif_service";
        $datas = array(
            'nom_tsrv'          =>      $values[0],
            'reference_tsrv'    =>      $values[1],
            'prix_ht_tsrv'      =>      $values[2],
            'archive_tsrv'      =>      0,
            'id_taxe'           =>      $values[3],
            'id_user'           =>      3); //A remplacer par get_current_user
        $format = array('%s', '%s', '%f', '%d', '%d', '%d');

        echo $table;

        return $this->executerInsert($table, $datas);
    }

}