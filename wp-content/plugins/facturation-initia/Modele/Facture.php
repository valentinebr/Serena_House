<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');


class Facture extends ModeleDeDonnees
{

    public function afficherFactures($annee) {
        global $wpdb;
        $current_user = wp_get_current_user();

        $sql = "SELECT * FROM {$wpdb->prefix}fact_facture 
                WHERE id_user=%d AND YEAR(date_fact) = %d";

        $datas = array($current_user->ID, $annee);

        return $this->executerGetResults($sql, $datas);
    }

    public function selectYearFactures() {
        global $wpdb;
        $current_user = wp_get_current_user();

        $sql = "SELECT date_fact FROM {$wpdb->prefix}fact_facture 
                WHERE id_user=%d";

        $datas = $current_user->ID;

        return $this->executerGetResults($sql, $datas);
    }

    public function insertFacture($nomFact, $pdf) {
        global $wpdb;
        $current_user = wp_get_current_user();
        date_default_timezone_set('UTC');

        $table = $wpdb->prefix.'fact_facture';
        $datas = array(
            'nom_fact'      =>      $nomFact,
            'date_fact'     =>      date('Y/m/d h:i:s'),
            'statut_fact'   =>      'En cours de validation',
            'pdf_fact'      =>      $pdf,
            'id_user'       =>      $current_user->ID
        );

        return $this->executerInsert($table, $datas);
    }

}