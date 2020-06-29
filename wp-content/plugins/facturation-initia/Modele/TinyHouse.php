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

    function afficherAllTinyHouse(){
        global $wpdb;

        $archive_tiny_house = 0;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tiny_house WHERE archive_tiny = %d";
        $datas = $archive_tiny_house;

        return $this->executerGetResults($sql, $datas);
    }

    function selectByIdTinyHouse ($id) {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tiny_house WHERE id_tiny= %d";

        $this->executerGetResults($sql, $id);
    }

    function updateTinyHouse ($id) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_tiny_house';
        $datas = array('archive_tiny' => 1);
        $where = array ('id_tiny' => $id);

        $this->executerUpdate($table, $datas, $where);
    }

}