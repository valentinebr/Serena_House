<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');


class TinyHouse extends ModeleDeDonnees
{

    function insertTinyHouse($values) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_tiny_house';

        $datas = array(
            'nom_tiny'              =>      $values[0],
            'nombre_places_tiny'    =>      $values[1],
            'archive_tiny'          =>      0
        );

        return $this->executerInsert($table, $datas);
    }

    function afficherTinyHouse () {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tiny_house t
                INNER JOIN {$wpdb->prefix}fact_nuitee_tiny_house n ON t.id_tiny=n.id_tiny
                INNER JOIN {$wpdb->prefix}fact_tarif_nuitee tn ON n.id_nuitee=tn.id_nuitee
                INNER JOIN {$wpdb->prefix}fact_taxe ta ON tn.id_taxe=ta.id_taxe
                WHERE archive_tiny=%d";

        return $this->executerGetResults($sql, 0);
    }

    function insertNuiteeTinyHouse ($values) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_nuitee_tiny_house';

        $datas = array(
            'id_nuitee'     =>      $values[0],
            'id_tiny'       =>      $values[1]
        );

        $this->executerInsert($table, $datas);
    }
}