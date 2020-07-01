<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');

class Nuitee extends ModeleDeDonnees
{

    function afficherNuitees () {
        global $wpdb;
        $current_user = wp_get_current_user();

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tarif_nuitee tn
                INNER JOIN {$wpdb->prefix}fact_taxe t ON tn.id_taxe = t.id_taxe 
                WHERE archive_nuitee = %d";
        $datas = $current_user->ID;

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

    function updateFieldNuitee($id){
        global $wpdb;

        $table = $wpdb->prefix.'fact_tarif_nuitee';
        $datas = array('archive_nuitee' => 1);
        $where = array('id_nuitee' => $id);

        $this->executerUpdate($table, $datas, $where);
    }

}