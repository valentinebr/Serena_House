<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');


class Facture extends ModeleDeDonnees
{

    public function insertFacture($nomFact) {
        global $wpdb;
        $current_user = wp_get_current_user();
        date_default_timezone_set('UTC');

        $table = $wpdb->prefix.'fact_facture';
        $datas = array(
            'nom_fact'      =>      $nomFact,
            'date_fact'     =>      date('Y/m/d h:i:s'),
            'statut_fact'   =>      'En cours de validation',
            'id_user'       =>      $current_user->ID
        );

        return $this->executerInsert($table, $datas);
    }

}