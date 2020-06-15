<?php
require_once (__ROOT__.'/facturation-initia/Vue/Vue.php');


class Routeur
{
    public function router() {
        try {
            $ctrl = filter_input(INPUT_GET, 'ctrl', FILTER_SANITIZE_STRING,
                ['options' => ['default' => 'Accueil']]);

            $nomClasseCtrl = 'Ctrl' . $ctrl;
            $fichierCtrl = './Controller/' . $nomClasseCtrl . '.php';

            require_once(__ROOT__ . '/facturation-initia/'.$fichierCtrl);

            $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING,
                ['options' => ['default' => 'index']]);


            if (!file_exists($fichierCtrl)) {
                throw new Exception('Controleur inexistant');
            }

            if (!class_exists($nomClasseCtrl)) {
                throw new Exception('Classe inexistante');
            }
            $instCtrl = new $nomClasseCtrl();

            $instCtrl->executer($action);
        } catch (PDOException $e) {
            $this->afficherErreur('L\'accès aux données a échoué (code : ' .
                $e->getCode() . ')');
        } catch (Exception $e) {
            $this->afficherErreur($e->getMessage());
        }
    }

    private function afficherErreur($msgErreur) {
        $vue = new Vue('Erreur', 'index');
        $vue->afficher(['msgErreur' => $msgErreur]);
    }
}