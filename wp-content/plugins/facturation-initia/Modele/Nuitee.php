<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');

class Nuitee extends ModeleDeDonnees
{

    function afficherNuitees () {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tarif_nuitee tn
                INNER JOIN {$wpdb->prefix}fact_taxe t ON tn.id_taxe = t.id_taxe
                ORDER BY nombre_personnes_nuitee ASC ";

        return $this->executerGetResults($sql, null);
    }

    function insertNewNuitee($values){
        global $wpdb;

        $table = $wpdb->prefix.'fact_tarif_nuitee';
        $datas = array(
            'nom_nuitee'                =>      $values[0],
            'reference_nuitee'          =>      $values[1],
            'nombre_personnes_nuitee'   =>      $values[2],
            'tarif_nuitee'              =>      $values[3],
            'id_taxe'                   =>      $values[4]
        );

        $this->executerInsert($table, $datas);
    }

    function updateNuitee($id, $values){
        global $wpdb;

        $table = $wpdb->prefix.'fact_tarif_nuitee';
        $datas = array(
            'nom_nuitee'                =>      $values[0],
            'reference_nuitee'          =>      $values[1],
            'nombre_personnes_nuitee'   =>      $values[2],
            'tarif_nuitee'              =>      $values[3],
            'id_taxe'                   =>      $values[4]);
        $where = array('id_nuitee' => $id);

        $this->executerUpdate($table, $datas, $where);
    }

    function deleteNuitee($id) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_tarif_nuitee';
        $where = array('id_nuitee' => $id);

        $this->executerDelete($table,$where);
    }

}