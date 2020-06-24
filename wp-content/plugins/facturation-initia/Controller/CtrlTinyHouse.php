<?php

require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/TinyHouse.php');
require_once (__ROOT__.'/facturation-initia/Modele/Taxe.php');
require_once (__ROOT__.'/facturation-initia/Modele/Nuitee.php');
require_once (__ROOT__.'/../../wp-config.php');


class CtrlTinyHouse extends Controleur
{

    function index()
    {
        $tinyHouse = new TinyHouse();
        $tinyHouse = $tinyHouse->afficherTinyHouse();
        $taxe = new Taxe();
        $taxe = $taxe->afficherTaxes();
        $nuitee = new Nuitee();
        $nuitee = $nuitee->afficherNuitees();

        $recurrence = $this->countNomsTiny($tinyHouse);

        return ['tinyHouse' => $tinyHouse, 'taxe' => $taxe, 'nuitee' => $nuitee, 'recurrence' => $recurrence];
    }

    function insertTinyHouse() {
        $tinyHouse = new TinyHouse();
        $nuitee = new Nuitee();
        $nuitee = $nuitee->afficherNuitees();

        $values = array($_POST['nom'], $_POST['nombre-places']);
        $idTiny = $tinyHouse->insertTinyHouse($values);

        foreach ($nuitee as $n) {
            if ($_POST['nuitee-'.$n->id_nuitee]) {
                $values2 = array ($_POST['nuitee-'.$n->id_nuitee], $idTiny);
                $tinyHouse->insertNuiteeTinyHouse($values2);
            }
        }

        $this->executer('index');
    }

    private function countNomsTiny ($tinyHouse) {
        $noms = array();

        foreach ($tinyHouse as $t) {
            array_push($noms, $t->nom_tiny);
        }

        $values = array_count_values($noms);

        return $values;
    }
}