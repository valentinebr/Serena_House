<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');


class TinyHouse extends ModeleDeDonnees
{
    function afficherTinyHouse () {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tiny_house t
                INNER JOIN {$wpdb->prefix}fact_nuitee_tiny_house n ON t.id_tiny=n.id_tiny
                INNER JOIN {$wpdb->prefix}fact_tarif_nuitee tn ON n.id_nuitee=tn.id_nuitee
                INNER JOIN {$wpdb->prefix}fact_taxe ta ON tn.id_taxe=ta.id_taxe";

        return $this->executerGetResults($sql, null);
    }

    function afficherAllTinyHouse(){
        global $wpdb;

        $archive_tiny_house = 0;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tiny_house";

        return $this->executerGetResults($sql, null);
    }

    function selectByIdTinyHouse ($id) {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tiny_house WHERE id_tiny= %d";

        return $this->executerGetResults($sql, $id);
    }

    function insertTinyHouse($values) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_tiny_house';

        $datas = array(
            'nom_tiny'              =>      $values[0],
            'nombre_places_tiny'    =>      $values[1],
        );

        return $this->executerInsert($table, $datas);
    }

    function updateTinyHouse ($id, $values) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_tiny_house';
        $datas = array(
            'nom_tiny'              =>      $values[0],
            'nombre_places_tiny'    =>      $values[1],
        );
        $where = array ('id_tiny' => $id);

        $this->executerUpdate($table, $datas, $where);
    }

    function deleteTinyHouse ($id) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_tiny_house';
        $where = array('id_tiny' => $id);
        $this->executerDelete($table,$where);

        $table = $wpdb->prefix.'fact_nuitee_tiny_house';
        $where = array('id_tiny' => $id);
        $this->executerDelete($table, $where);
    }

}