<?php
require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');
require_once (__ROOT__.'/../../wp-config.php');

class CarteVoyage extends ModeleDeDonnees
{

    function AfficherCarteVoyage(){
        global $wpdb;

        $id = 1;

        $sql = "SELECT * FROM {$wpdb->prefix}dopbsp_coupons WHERE user_id = %d";
        $datas = array($id);

        return $this->executerGetResults($sql, $datas);
    }

}