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

        $sql = "SELECT * FROM {$wpdb->prefix}fact_nuitee_tiny_house WHERE id_tiny=%d";

        $this->executerGetResults($sql, $id);
    }

}