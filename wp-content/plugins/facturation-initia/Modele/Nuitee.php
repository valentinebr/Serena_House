<?php

require_once (__ROOT__.'/facturation-initia/Modele/ModeleDeDonnees.php');

class Nuitee extends ModeleDeDonnees
{

    public function afficherNuitees () {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}fact_tarif_nuitee";

        return $this->executerGetResults($sql, null);
    }

}