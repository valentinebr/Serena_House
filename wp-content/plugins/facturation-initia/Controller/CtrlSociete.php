<?php

require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/Societe.php');

class CtrlSociete extends Controleur
{

    public function index()
    {
        $societe = new Societe();
        $societe = $societe->AfficherSociete();

        return ['societe' => $societe];

    }

    public function updateSociete()
    {
        $societe = new Societe();

        $values = array($_POST['nom_ste'], $_POST['adresse_societe'], $_POST['code_postal_ste'], $_POST['ville_ste'], $_POST['telephone_ste'],
            $_POST['numero_ste'], $_POST['tiny_house_ste']);

        echo 'Update !';

        $societe->updateFieldSociete($values);

    }

    public function insertSociete()
    {
        $societe = new Societe();

        $values = array($_POST['nom_ste'], $_POST['adresse_societe'], $_POST['code_postal_ste'], $_POST['ville_ste'], $_POST['telephone_ste'],
            $_POST['numero_ste'], $_POST['tiny_house_ste']);

        echo 'Inséré !';

        $societe->insertNewSociete($values);

    }
}