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

        $facture = new Facture();
        $facture = $facture->selectYearFactures();
        $annees = array();

        foreach ($facture as $f) {
            $insert = true;
            $date = explode('-', $f->date_fact);
            foreach ($annees as $a) {
                if($a == $date[0]) {
                    $insert=false;
                    break;
                }
            }
            if($insert == true) {
                array_push($annees, $date[0]);
            }
        }

        return ['annees' => $annees];
    }

    public function historique() {
        $annee = $_GET['annee'];

        $facture = new Facture();
        $facture = $facture->afficherFactures($annee);

        return ['factures' => $facture, 'annee' => $annee];
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

        $pdf = $this->creerPDF($services);
        $pdf = substr_replace($pdf, '', 0,65 );

        $nomFact = $_POST['nom-fact'];
        $idFact = $facture->insertFacture($nomFact, $pdf);

        foreach ($services as $s) {
            $values = array($_POST['nb-service-'.$s->id_tsrv], $s->id_tsrv, $idFact);
            $service->insertService($values);
        }


        $this->executer('ajouterFacture');
    }

    function creerPDF($services) {

        $societe = new Societe();
        $nth = new NuiteeTinyHouse();

        $societe = $societe->afficherSociete();
        $nth= $nth->afficherNuiteeTinyHouse($societe[0]->id_tiny);

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

        $pdf->Output('I', $_POST['nom-fact'].'.pdf');
        $nomFact = str_replace('/', '_', $_POST['nom-fact']);
        $nomFact = str_replace('-','_', $nomFact);
        $path = __ROOT__.'/facturation-initia/FacturesPDF/'.$nomFact.'.pdf';
        $pdf->Output('F', $path, true);

        return $path;
    }

}