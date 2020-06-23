<?php

require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/Taxe.php');

class CtrlTaxe extends Controleur
{

    function index()
    {
        $taxes = new Taxe();
        $taxes = $taxes->afficherTaxes();

        return ['taxes' => $taxes];
    }

    function insertTaxe() {
        $values = array($_POST['nom-taxe'], $_POST['taux-taxe']);

        $taxe = new Taxe();
        $taxe->insererTaxe($values);
        $this->executer('index');

    }

    function updateTaxe() {
        $values = array($_POST['nom-taxe'], $_POST['taux-taxe']);

        $taxe = new Taxe();
        $taxe->insererTaxe($values);
        $taxe->updateTaxe($_POST['id-taxe']);
        $this->executer('index');
    }

    function deleteTaxe() {
        $taxe = new Taxe();
        $taxe->updateTaxe($_GET['id']);

        $this->executer('index');
    }
}