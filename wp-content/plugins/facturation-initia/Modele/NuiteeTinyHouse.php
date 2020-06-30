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
                WHERE (id_tiny=%d AND archive_nth=%d)";
        $datas = array($id, 0);

        return $this->executerGetResults($sql, $datas);
    }

    function updateNuiteeTinyHouse ($id) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_nuitee_tiny_house';
        $datas = array('archive_nth' => 1);
        $where = array('id_nth' => $id);

        $this->executerUpdate($table,$datas,$where);
    }

}