<?php
require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');
require_once (__ROOT__.'/../../wp-config.php');

class CarteVoyage extends ModeleDeDonnees
{

    function afficherCarteVoyage(){
        global $wpdb;
        $current_user = wp_get_current_user();

        $sql = "SELECT * FROM {$wpdb->prefix}dopbsp_coupons WHERE user_id = %d";
        $datas = array($current_user->ID);

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
            'user_id'       =>      $current_user->ID
        );

        return $this->executerInsert($table, $datas);
    }

}