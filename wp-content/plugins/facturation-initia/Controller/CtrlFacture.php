<?php

require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/Service.php');
require_once (__ROOT__.'/facturation-initia/Modele/Facture.php');
require_once (__ROOT__.'/facturation-initia/Modele/NuiteeTinyHouse.php');
require_once (__ROOT__.'/facturation-initia/Modele/CarteVoyage.php');
require_once (__ROOT__.'/facturation-initia/Modele/Societe.php');
require_once (__ROOT__.'/facturation-initia/fpdf182/fpdf.php');
require_once(__ROOT__ . '/facturation-initia/tfpdf/PDF.php');


class CtrlFacture extends Controleur
{
    public function index()
    {

        return [];
    }

    public function ajouterFacture() {
        $services = new Service;
        $services = $services->afficherServices();
        $societe = new Societe();
        $societe = $societe->afficherSociete();
        $nth = new NuiteeTinyHouse();
        $nth = $nth->afficherNuiteeTinyHouse($societe[0]->id_tiny);

        if(date("d")>=1 AND date("d")<=15) {
            $mois = date("m", strtotime('-1month'));
        } else {
            $mois = date("m");
        }

        $cartesVoyage = new CarteVoyage();
        $cartesVoyage = $cartesVoyage->afficherCarteVoyageParMois($mois);


        return ['services' => $services, 'societe' => $societe, 'nth' => $nth, 'cartesVoyage' => $cartesVoyage];
    }

    public function insertFacture () {
        $facture = new Facture();
        $service = new Service();
        $services = $service->afficherServices();

        $nomFact = $_POST['nom-fact'];
        $idFact = $facture->insertFacture($nomFact);

        foreach ($services as $s) {
            $values = array($_POST['nb-service-'.$s->id_tsrv], $s->id_tsrv, $idFact);
            $service->insertService($values);
        }

        echo '<script>window.open('.$this->creerPDF().',\'_blank\')</script>';

        $this->executer('ajouterFacture');
    }

    function creerPDF() {

        $societe = new Societe();
        $nth = new NuiteeTinyHouse();
        $services = new Service();

        $societe = $societe->afficherSociete();
        $nth= $nth->afficherNuiteeTinyHouse($societe[0]->id_tiny);
        $services = $services->afficherServices();

        if(date("d")>=1 AND date("d")<=15) {
            $mois = date("m", strtotime('-1month'));
        } else {
            $mois = date("m");
        }

        $cartesVoyage = new CarteVoyage();
        $cartesVoyage = $cartesVoyage->afficherCarteVoyageParMois($mois);

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->enTete($societe, $_POST['nom-fact']);
        $pdf->tableArticles($_POST, $nth, $services, $cartesVoyage);
        $pdf->Output();
    }

}