<?php

require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/Service.php');
require_once (__ROOT__.'/facturation-initia/Modele/Taxe.php');

class CtrlService extends Controleur
{

    public function index()
    {
        $services = new Service();
        $services = $services->afficherServices();
        $taxes = new Taxe();
        $taxes = $taxes->afficherTaxes();

        return ['services' => $services, 'taxes' => $taxes];
    }

    public function insertTService()
    {
        $service = new Service();

        $values = array($_POST['service'], $_POST['reference'],
            $_POST['prix-ht'], $_POST['taxe']);

        $service->insertTarifService($values);
        $this->executer('index');


    }

    public function updateTService() {
        $service = new Service();

        $values = array($_POST['service'], $_POST['reference'],
            $_POST['prix-ht'], $_POST['taxe']);

        $service->updateTarifService($_POST['id'], $values);
        $this->executer('index');
    }

    public function deleteTService() {
        $service = new Service();

        $service->deleteTarifService($_GET['id']);
        $this->executer('index');
    }
}