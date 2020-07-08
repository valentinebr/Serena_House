<?php
require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');
require_once (__ROOT__.'/../../wp-config.php');

class CarteVoyage extends ModeleDeDonnees
{

    function afficherCarteVoyage(){
        global $wpdb;
        $current_user = wp_get_current_user();

        $sql = "SELECT * FROM {$wpdb->prefix}dopbsp_coupons c
                WHERE user_id = %d";
        $datas = array($current_user->ID);

        return $this->executerGetResults($sql, $datas);
    }

    function afficherCarteVoyageParMois($mois){
        global $wpdb;
        $current_user = wp_get_current_user();

        $sql = "SELECT * FROM {$wpdb->prefix}dopbsp_coupons c
                INNER JOIN {$wpdb->prefix}fact_tarif_carte_voyage tcv ON c.id_tcv=tcv.id_tcv
                INNER JOIN {$wpdb->prefix}fact_taxe t ON tcv.id_taxe = t.id_taxe
                WHERE user_id = %d AND MONTH(start_date) = %d";
        $datas = array($current_user->ID, $mois);

        return $this->executerGetResults($sql, $datas);
    }


    function insertNewCarteVoyage($values){
        global $wpdb;
        $current_user = wp_get_current_user();

        $table = $wpdb->prefix . 'dopbsp_coupons';
        $datas = array(
            'price'         =>      $values[0],
            'code'          =>      $values[1],
            'start_date'    =>      $values[2],
            'user_id'       =>      $current_user->ID,
            'id_tcv'        =>      $values[3]
        );

        return $this->executerInsert($table, $datas);
    }

}