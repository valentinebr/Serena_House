<?php
require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/CarteVoyage.php');
require_once (__ROOT__.'/facturation-initia/Modele/TarifCarteVoyage.php');

class CtrlCarteVoyage extends Controleur
{

    public function index()
    {
        $carteVoyage = new CarteVoyage();
        $carteVoyage = $carteVoyage->AfficherCarteVoyage();

        $tarifCarteVoyage = new TarifCarteVoyage();
        $tarifCarteVoyage = $tarifCarteVoyage->AfficherTarifCarteVoyage();

        return ['carteVoyage' => $carteVoyage, 'tarifCarteVoyage' => $tarifCarteVoyage];
    }

    public function insertCarteVoyage(){

        $carteVoyage = new CarteVoyage();

        $values = array($_POST['price'], $_POST['reference'], $_POST['start_date']);

        echo 'Update !';

        $carteVoyage->insertNewCarteVoyage($values);
        $this->executer('index');
    }
}