<?php


class Vue
{
    private $controleur;
    private $action;
    private $titre;

    public function __construct($controleur, $action)
    {
        $this->controleur = $controleur;
        $this->action = $action;
    }

    private function insererDonnees ($cheminFichier, $donnees) {
        if (!file_exists($cheminFichier)) {
            throw new Exception('Le fichier n\'existe pas !');
        }
            extract($donnees);
        ob_start();
        require($cheminFichier);
        return ob_get_clean();
    }

    function afficher ($donnees) {
        try {
            $contenu = $this->insererDonnees('Vue/' . $this->controleur . '/' . $this->action . '.php',
                $donnees);

            echo $this->insererDonnees('Vue/layout.php',
                ['titre' => $this->titre, 'contenu' => $contenu]);

        } catch (Exception $e) {
        }
    }


}