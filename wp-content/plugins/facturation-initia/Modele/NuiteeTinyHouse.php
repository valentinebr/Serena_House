<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');

class NuiteeTinyHouse extends ModeleDeDonnees
{
    function insertNuiteeTinyHouse ($values) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_nuitee_tiny_house';

        $datas = array(
            'id_nuitee'     =>      $values[0],
            'id_tiny'       =>      $values[1]
        );

        $this->executerInsert($table, $datas);
    }

    function afficherNuiteeTinyHouse ($id) {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_nuitee_tiny_house nth
                INNER JOIN {$wpdb->prefix}fact_tarif_nuitee tn ON nth.id_nuitee=tn.id_nuitee
                INNER JOIN {$wpdb->prefix}fact_taxe t ON tn.id_taxe = t.id_taxe
                WHERE id_tiny=%d";

        return $this->executerGetResults($sql, $id);
    }

    function deleteNuiteeTinyHouse ($id) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_nuitee_tiny_house';
        $where = array('id_nth' => $id);

        $this->executerDelete($table,$where);
    }

}