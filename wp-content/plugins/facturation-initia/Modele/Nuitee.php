<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');
require_once __ROOT__.'/../../wp-config.php';

class Nuitee extends ModeleDeDonnees
{

    function afficherNuitees () {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tarif_nuitee";
        $datas = 0;

        return $this->executerGetResults($sql, $datas);
    }

    function insertNewNuitee($values){
        global $wpdb;

        $table = $wpdb->prefix.'fact_tarif_nuitee';
        $datas = array(
            'nom_nuitee'                =>      $values[0],
            'nombre_personnes_nuitee'   =>      $values[1],
            'tarif_nuitee'              =>      $values[2]
        );

        $this->executerInsert($table, $datas);
    }

    function updateFieldNuitee($values, $id){
        global $wpdb;

        $table = $wpdb->prefix.'fact_tarif_nuitee';
        $datas = array(
            'nom_nuitee'                =>      $values[0],
            'nombre_personnes_nuitee'   =>      $values[1],
            'tarif_nuitee'              =>      $values[2]
        );
        $where = array('id_nuitee' => $id);

        $this->executerUpdate($table, $datas, $where);
    }

}