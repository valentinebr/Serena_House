<?php

require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/TinyHouse.php');
require_once (__ROOT__.'/facturation-initia/Modele/Taxe.php');
require_once (__ROOT__.'/facturation-initia/Modele/Nuitee.php');
require_once (__ROOT__.'/facturation-initia/Modele/NuiteeTinyHouse.php');
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
        $nth = new NuiteeTinyHouse();
        $nuitee = $nuitee->afficherNuitees();

        $values = array($_POST['nom'], $_POST['nombre-places']);
        $idTiny = $tinyHouse->insertTinyHouse($values);

        foreach ($nuitee as $n) {
            if ($_POST['nuitee-'.$n->id_nuitee]) {
                $values2 = array ($_POST['nuitee-'.$n->id_nuitee], $idTiny);
                $nth->insertNuiteeTinyHouse($values2);
            }
        }

        $this->executer('index');
    }

    function updateTinyHouse () {

        $tinyHouse = new TinyHouse();
        $nuitee = new Nuitee();

        $idTiny = $_POST['id-modif'];

        $tiny = $tinyHouse->selectByIdTinyHouse($idTiny);
        $nuitee = $nuitee->afficherNuitees();

        if ($tiny[0]->nom_tiny !== $_POST['nom-modif'] || $tiny[0]->nombre_places_tiny !== $_POST['nb-places-modif']) {
            $values = array($_POST['nom-modif'], $_POST['nb-places-modif']);
            $idTiny = $tinyHouse->insertTinyHouse($values);
            $tinyHouse->updateTinyHouse($_POST['id-modif']);
        }

        foreach ($nuitee as $n) {
            if ($_POST['nuitee-'.$n->id_nuitee]) {
                $insert = true;
                $nth = new NuiteeTinyHouse();
                $nth = $nth->afficherNuiteeTinyHouse($idTiny);

                foreach ($nth as $x) {
                    if ($x->id_nuitee == $_POST['nuitee-'.$n->id_nuitee]) {
                        $insert = false;
                        break;
                    }
                }
                if ($insert == true ) {
                    $values2 = array ($_POST['nuitee-'.$n->id_nuitee], $idTiny);
                    $nth = new NuiteeTinyHouse();
                    $nth->insertNuiteeTinyHouse($values2);
                }

            } else {
                $nth = new NuiteeTinyHouse();
                $nth = $nth->afficherNuiteeTinyHouse($idTiny);

                foreach ($nth as $x) {
                    if ($x->id_nuitee == $n->id_nuitee) {
                        echo 'else + if';
                        echo $x->id_nth;
                        $nth = new NuiteeTinyHouse();
                        $nth->updateNuiteeTinyHouse($x->id_nth);
                    }
                    }

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