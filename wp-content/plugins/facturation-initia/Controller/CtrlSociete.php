<?php

require_once (__ROOT__.'/facturation-initia/Controller/Controleur.php');
require_once (__ROOT__.'/facturation-initia/Modele/Societe.php');
require_once (__ROOT__.'/facturation-initia/Modele/TinyHouse.php');

class CtrlSociete extends Controleur
{

    public function index()
    {
        $societe = new Societe();
        $societe = $societe->afficherSociete();

        return ['societe' => $societe];

    }

    public function listeSociete()
    {
        $allSociete = new Societe();
        $allSociete = $allSociete->afficherAllSociete();

        $tinyHouse = new TinyHouse();
        $tinyHouse = $tinyHouse->afficherAllTinyHouse();

        return ['allSociete' => $allSociete, 'tinyHouse' => $tinyHouse];
    }

    public function societeById()
    {
        $societeById = new Societe();
        $idSociete = $_GET['id'];
        $societeById = $societeById->afficherSocieteById($idSociete);

        echo json_encode(array(
            'nom_ste'               =>      $societeById[0]->nom_ste,
            'numero_ste'            =>      $societeById[0]->numero_ste,
            'adresse_ste'           =>      $societeById[0]->adresse_ste,
            'code_postal_ste'       =>      $societeById[0]->code_postal_ste,
            'ville_ste'             =>      $societeById[0]->ville_ste,
            'telephone_ste'         =>      $societeById[0]->telephone_ste,
            'tiny_house_ste'        =>      $societeById[0]->id_tiny
        ));
    }

    public function updateSociete()
    {
        $societe = new Societe();

        $values = array($_POST['nom_ste'], $_POST['numero_ste'], $_POST['adresse_ste'], $_POST['code_postal_ste'], $_POST['ville_ste'],
            $_POST['telephone_ste'], $_POST['tiny_house_ste']);

        $societe->updateFieldSociete($values);
        $this->executer('index');
    }

    public function updateSocieteAdmin()
    {
        $societe = new Societe();

        $values = array($_POST['numero_ste'], $_POST['adresse_ste'], $_POST['code_postal_ste'], $_POST['ville_ste'],
            $_POST['telephone_ste'], $_POST['tiny_house_ste'], $_POST['nom_ste']);

        $societe->updateFieldSocieteAdmin($values);
        $this->executer('listeSociete');
    }

    public function insertSociete()
    {
        $societe = new Societe();

        $values = array($_POST['nom_ste'], $_POST['adresse_societe'], $_POST['code_postal_ste'], $_POST['ville_ste'], $_POST['telephone_ste'],
            $_POST['numero_ste'], $_POST['tiny_house_ste']);

        $societe->insertNewSociete($values);
        $this->executer('index');
    }
}