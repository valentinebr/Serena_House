<?php
require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');
require_once (__ROOT__.'/../../wp-config.php');

class Societe extends ModeleDeDonnees
{

    function afficherSociete(){
        global $wpdb;

        $id = 3;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_societe s
                INNER JOIN {$wpdb->prefix}fact_tiny_house t ON s.id_tiny=t.id_tiny
                WHERE id_user = %d";
        $datas = $id;

        return $this->executerGetResults($sql,$datas);
    }

    function updateFieldSociete($values){
        global $wpdb;
        $table = $wpdb->prefix . 'fact_societe';
        $datas = array(
            'nom_ste'           =>      $values[0],
            'adresse_ste'       =>      $values[1],
            'code_postal_ste'   =>      $values[2],
            'ville_ste'         =>      $values[3],
            'telephone_ste'     =>      $values[4],
            'numero_ste'        =>      $values[5],
            'id_tiny'           =>      $values[6]
        );
        $where = array('id_user' => 3); //get_currentuser_id()

        return $this->executerUpdate($table, $datas, $where);

    }

    function insertNewSociete($values){
        global $wpdb;
        $table = $wpdb->prefix . 'fact_societe';
        $datas = array(
            'nom_ste'           =>      $values[0],
            'adresse_ste'       =>      $values[1],
            'code_postal_ste'   =>      $values[2],
            'ville_ste'         =>      $values[3],
            'telephone_ste'     =>      $values[4],
            'numero_ste'        =>      $values[5],
            'id_tiny'           =>      $values[6],
            'id_user'           =>      3
        );

        return $this->executerInsert($table, $datas);
    }

}