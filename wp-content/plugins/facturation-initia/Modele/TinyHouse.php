<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');


class TinyHouse extends ModeleDeDonnees
{

    public function insertTinyHouse($values) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_tiny_house';

        $datas = array(
            'nom_tiny'              =>      $values[0],
            'nombre_places_tiny'    =>      $values[1],
            'archive_tiny'          =>      0
        );

        $this->executerInsert($table, $datas);
    }

    public function afficherTinyHouse () {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tiny_house WHERE archive_tiny=%d";

        return $this->executerGetResults($sql, 0);
    }
}