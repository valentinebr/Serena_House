<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');
require_once (__ROOT__.'/../../wp-config.php');

class Taxe extends ModeleDeDonnees
{

    function afficherTaxes () {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_taxe";

        return $this->executerGetResults($sql, null);
    }

    function insererTaxe($values) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_taxe';
        $datas = array(
            'libelle_taxe'      => $values[0],
            'taux_taxe'         =>$values[1],
        );

        $this->executerInsert($table, $datas);
    }

    function updateTaxe($id, $values) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_taxe';
        $datas = array(
            'libelle_taxe'      =>  $values[0],
            'taux_taxe'         =>  $values[1],
        );
        $where = array('id_taxe' => $id);

        $this->executerUpdate($table, $datas, $where);
    }

    function deleteTaxe($id) {
        global $wpdb;

        $table = $wpdb->prefix.'fact_taxe';
        $where = array('id_taxe' => $id);

        $this->executerDelete($table, $where);
    }
}