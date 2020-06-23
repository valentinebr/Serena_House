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

        return ['tinyHouse' => $tinyHouse, 'taxe' => $taxe, 'nuitee' => $nuitee];
    }

    function insertTinyHouse() {
        $tinyHouse = new TinyHouse();

        $values = array($_POST['nom'], $_POST['nombre-places']);

        $tinyHouse->insertTinyHouse($values);
    }
}