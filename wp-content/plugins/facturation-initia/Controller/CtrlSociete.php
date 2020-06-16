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
}