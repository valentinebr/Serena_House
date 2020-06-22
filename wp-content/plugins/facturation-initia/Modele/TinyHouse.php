<?php


class TinyHouse extends ModeleDeDonnees
{

    public function insertTinyHouse($values) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_tiny_house';

        $datas = array(
            'nom_tiny'              =>      $values[0],
            'nombre_places_tiny'    =>      $values[1]
        );

        $this->executerInsert($table, $datas);
    }

    public function afficherTinyHouse () {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tiny_house";

        return $this->executerGetResults($sql, null);
    }
}