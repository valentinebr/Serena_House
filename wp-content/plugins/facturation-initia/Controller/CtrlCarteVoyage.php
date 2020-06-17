<?php
require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/CarteVoyage.php');

class CtrlCarteVoyage extends Controleur
{

    public function index()
    {
        $carteVoyage = new CarteVoyage();
        $carteVoyage = $carteVoyage->AfficherCarteVoyage();

        return ['carteVoyage' => $carteVoyage];
    }
}