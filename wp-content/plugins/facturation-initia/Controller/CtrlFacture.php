<?php

require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/Service.php');
require_once (__ROOT__.'/facturation-initia/Modele/Facture.php');


class CtrlFacture extends Controleur
{
    public function index()
    {

        return [];
    }

    public function ajouterFacture() {
        $services = new Service;
        $services = $services->AfficherServices();
        $societe = new Societe();
        $societe = $societe->AfficherSociete();

        return ['services' => $services, 'societe' => $societe];
    }

    public function insertService () {
        $facture = new Facture();
        $service = new Service();
        $services = $service->AfficherServices();

        $nomFact = $_POST['nom-fact'];
        $idFact = $facture->insertFacture($nomFact);

        foreach ($services as $s) {
            $values = array($_POST['nb-service-'.$s->id_tsrv], $s->id_tsrv, $idFact);
            $service->insertService($values);
        }

        $this->executer('ajouterFacture');
    }

}