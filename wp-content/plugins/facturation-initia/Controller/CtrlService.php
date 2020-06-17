<?php

require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/Service.php');
require_once (__ROOT__.'/facturation-initia/Modele/Taxe.php');

class CtrlService extends Controleur
{

    public function index()
    {
        $services = new Service();
        $services = $services->AfficherServices();
        $taxes = new Taxe();
        $taxes = $taxes->AfficherTaxes();

        return ['services' => $services, 'taxes' => $taxes];
    }

    public function insertTService()
    {
        $service = new Service();

        $values = array($_POST['service'], $_POST['reference'],
            $_POST['prix-ht'], $_POST['taxe']);

        $this->index();
        $service->insertTarifService($values);


    }

    public function updateTService() {
        $service = new Service();

        $values = array($_POST['service'], $_POST['reference'],
            $_POST['prix-ht'], $_POST['taxe']);

        $service->updateTarifService($_POST['id']);
        $service->insertTarifService($values);
        $this->index();
    }

    public function deleteTService() {
        $service = new Service();

        $service->updateTarifService($_GET['id']);
        $this->index();
    }
}