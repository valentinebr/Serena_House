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
        $carteVoyage = new CarteVoyage();


        return ['services' => $services, 'societe' => $societe, 'nth' => $nth];
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

        $this->creerPDF();

        $this->executer('ajouterFacture');
    }

    function creerPDF() {

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->header();
        $pdf->tableArticles();
        $pdf->Output();
    }

}