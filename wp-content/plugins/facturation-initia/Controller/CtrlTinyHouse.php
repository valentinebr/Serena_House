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

        //On vérifie que le nom et le nombre de place de la tiny house à été modifié
        if ($tiny[0]->nom_tiny !== $_POST['nom-modif'] || $tiny[0]->nombre_places_tiny !== $_POST['nb-places-modif']) {
            //Si c'est le cas on update les infos dans la table tiny house
            $values = array($_POST['nom-modif'], $_POST['nb-places-modif']);
            $tinyHouse->updateTinyHouse($_POST['id-modif'], $values);
        }

        //On passe en revue toutes les checkboxs du formulaire
        foreach ($nuitee as $n) {
            //Si la checkbox est cochée
            if ($_POST['nuitee-'.$n->id_nuitee]) {
                $insert = true;
                $nth = new NuiteeTinyHouse();
                $nth = $nth->afficherNuiteeTinyHouse($idTiny);

                //On vérifie si elle était déjà cochée avant
                foreach ($nth as $x) {
                    //Si elle était déjà cochée on ne fait rien
                    if ($x->id_nuitee == $_POST['nuitee-'.$n->id_nuitee]) {
                        $insert = false;
                        break;
                    }
                }
                //Si elle n'était pas déjà cochée on insère la ligne dans nuitée tiny house
                if ($insert == true ) {
                    $values2 = array ($_POST['nuitee-'.$n->id_nuitee], $idTiny);
                    $nth = new NuiteeTinyHouse();
                    $nth->insertNuiteeTinyHouse($values2);
                }

                //Si la checkbox n'est pas cochée
            } else {
                $nth = new NuiteeTinyHouse();
                $nth = $nth->afficherNuiteeTinyHouse($idTiny);

                foreach ($nth as $x) {
                    //On vérifie si elle était cochée avant la modification, si c'est le cas on supprime la ligne
                    if ($x->id_nuitee == $n->id_nuitee) {
                        $nth = new NuiteeTinyHouse();
                        $nth->deleteNuiteeTinyHouse($x->id_nth);
                    }
                    }

            }

        }


        $this->executer('index');

    }

    function deleteTinyHouse() {
        $id = $_GET['id'];

        $tinyHouse = new TinyHouse();
        $tinyHouse->deleteTinyHouse($id);

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