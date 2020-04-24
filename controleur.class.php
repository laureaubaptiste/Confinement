<?php
    require_once("model/modele.class.php");

    class Controleur
    {
        private $unModele;

        public function __construct ($serveur, $bdd, $user, $mdp)
        {
            //  Instanciation de la classe Modele
            $this->unModele = new Modele($serveur, $bdd, $user, $mdp);
        }

        

        public function selectAllJeux ()
        {
            //  Appel de la fonction selectAllProfs du modèle
            $lesJeux = $this->unModele->selectAllJeux();
            //  Eventuellement faire des contrôles sur les données
            return $lesJeux;
        }

        public function selectAllJouets ()
        {
            //  Appel de la fonction selectAllProfs du modèle
            $lesJouets = $this->unModele->selectAllJouets();
            //  Eventuellement faire des contrôles sur les données
            return $lesJouets;
        }
        
        

        public function insertObjet ($tab)
        {
            $this->unModele->insertObjet($tab);
        }

        public function searchObjet ($tab)
        {
            $lObjet = $this->unModele->searchObjet($tab);
            return $lObjet;
        }

        public function barterObjets ($tab)
        {
            $this->unModele->barterObjets($tab);
        }

        public function sellObjets ($tab)
        {
            $this->unModele->sellObjets($tab, $this->unModele->getPortefeuille0($tab), $this->unModele->getPortefeuille1($tab));
        }

        

        public function deleteObjet ($tab)
        {
            $this->unModele->deleteObjet($tab);
        }
    }
?>