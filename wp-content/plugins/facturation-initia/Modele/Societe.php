<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');
require_once (__ROOT__.'/../../wp-config.php');

class Societe extends ModeleDeDonnees
{

    function AfficherSociete(){
        global $wpdb;

        $id = 1;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_societe WHERE id_users = %d";
        $datas = array($id);

        return $this->executerGetResults($sql, $datas);
    }

    function updateFieldSociete($values){
        global $wpdb;
        $table = $wpdb->prefix . "fact_societe";
        $datas = array(
            'nom_ste'           =>      $values[0],
            'adresse_ste'       =>      $values[1],
            'code_postal_ste'   =>      $values[2],
            'ville_ste'         =>      $values[3],
            'telephone_ste'     =>      $values[4],
            'numero_ste'        =>      $values[5],
            'tiny_house_ste'    =>      $values[6],
            'id_users'          =>      1 //get_currentuser_id()
        );
        $format = array('%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d');

        echo $table;

        return $this->executerUpdate($table, $datas, $format);

    }

}