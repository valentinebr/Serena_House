<?php
require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/CarteVoyage.php');
require_once (__ROOT__.'/facturation-initia/Modele/TarifCarteVoyage.php');
require_once (__ROOT__.'/facturation-initia/Modele/Taxe.php');

class CtrlCarteVoyage extends Controleur
{

    public function index()
    {
        $carteVoyage = new CarteVoyage();
        $carteVoyage = $carteVoyage->afficherCarteVoyage();

        $tarifCarteVoyage = new TarifCarteVoyage();
        $tarifCarteVoyage = $tarifCarteVoyage->afficherTarifCarteVoyage();

        return ['carteVoyage' => $carteVoyage, 'tarifCarteVoyage' => $tarifCarteVoyage];
    }

    public function tarifCarteVoyage()
    {
        $tarifCarteVoyage = new TarifCarteVoyage();
        $tarifCarteVoyage = $tarifCarteVoyage->afficherTarifCarteVoyage();

        $taxe = new Taxe();
        $taxe = $taxe->afficherTaxes();

        return ['tarifCarteVoyage' => $tarifCarteVoyage, 'taxe' => $taxe];
    }

    public function insertCarteVoyage()
    {
        $carteVoyage = new CarteVoyage();

        $values = array($_POST['price'], $_POST['reference'], $_POST['start_date']);

        $carteVoyage->insertNewCarteVoyage($values);
        $this->executer('index');
    }

    public function insertTarifCarteVoyage()
    {
        $tarifCarteVoyage = new TarifCarteVoyage();

        $values = array($_POST['nom-tcv'], $_POST['tarif-tcv'], $_POST['taxe-tcv']);

        $tarifCarteVoyage->insertNewTarifCarteVoyage($values);
        $this->executer('tarifCarteVoyage');
    }

    public function updateTarifCarteVoyage()
    {
        $values = array($_POST['nom-tcv'], $_POST['tarif-tcv'], $_POST['taxe-tcv']);

        $tarifCarteVoyage = new TarifCarteVoyage();
        $tarifCarteVoyage->updateFieldTarifCarteVoyage($_POST['id-tcv']);
        $tarifCarteVoyage->insertNewTarifCarteVoyage($values);
        $this->executer('tarifCarteVoyage');
    }
}