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

    public function insertService()
    {
        $service = new Service();

        $values = array($_POST['service'], $_POST['reference'],
            $_POST['prix-ht'], $_POST['taxe']);

        echo 'Inséré !';

        $service->insertTarifService($values);

    }
}