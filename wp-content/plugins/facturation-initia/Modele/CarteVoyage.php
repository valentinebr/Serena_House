<?php
require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');
require_once (__ROOT__.'/../../wp-config.php');

class CarteVoyage extends ModeleDeDonnees
{

    function AfficherCarteVoyage(){
        global $wpdb;

        $id = 0;

        $sql = "SELECT * FROM {$wpdb->prefix}dopbsp_coupons WHERE user_id = %d";
        $datas = array($id);

        return $this->executerGetResults($sql, $datas);
    }


    function insertNewCarteVoyage($values){
        global $wpdb;
        $table = $wpdb->prefix . 'dopbsp_coupons';
        $datas = array(
            'price'         =>      $values[0],
            'code'          =>      $values[1],
            'start_date'    =>      $values[2]
        );

        return $this->executerInsert($table, $datas);
    }

}