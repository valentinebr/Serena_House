<?php
require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/Nuitee.php');

class CtrlNuitee extends Controleur
{

    function index()
    {
        $nuitees = new Nuitee();
        $nuitees = $nuitees->afficherNuitees();

        return ['nuitees' => $nuitees];
    }

    function insertNuitee(){
        $values = array($_POST['nom-nuitee'], $_POST['nombre-personnes-nuitee'], $_POST['tarif-nuitee']);

        $nuitee = new Nuitee();
        $nuitee->insertNewNuitee($values);
        $this->executer('index');
    }

    function updateNuitee(){
        $nuitee = new Nuitee();

        $values = array($_POST['nom-nuitee'], $_POST['nombre-personnes-nuitee'], $_POST['tarif-nuitee']);

        $nuitee->insertNewNuitee($values);
        $nuitee->updateFieldNuitee($_POST['id-nuitee']);
        $this->executer('index');
    }
}