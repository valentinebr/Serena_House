<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');
require_once (__ROOT__.'/../../wp-config.php');

class Taxe extends ModeleDeDonnees
{

    function afficherTaxes () {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_taxe WHERE archive_taxe = %d";
        $datas = 0;

        return $this->executerGetResults($sql, $datas);
    }

    function insererTaxe($values) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_taxe';
        $datas = array(
            'libelle_taxe'      => $values[0],
            'taux_taxe'         =>$values[1],
            'archive_taxe'      =>0
        );

        $this->executerInsert($table, $datas);
    }

    function updateTaxe($id) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_taxe';
        $datas = array('archive_taxe' => 1);
        $where = array('id_taxe' => $id);

        $this->executerUpdate($table, $datas, $where);
    }
}