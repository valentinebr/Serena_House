<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');
require_once (__ROOT__.'/../../wp-config.php');

class Societe extends ModeleDeDonnees
{

    function AfficherSociete(){
        global $wpdb;

        $id = 1;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_societe WHERE id_users = %d";

        $data = array($id);

        return $this->executerGetResults($sql, $data);
    }

}