<?php
    class Modele
    {
        private $pdo;

        public function __construct ($serveur, $bdd, $user, $mdp)
        {
            $this->pdo = NULL;    //  Variable locale
            try
            {
                $pdo = new PDO("mysql:host=localhost:8889;dbname=COVID", "root", "root");
            }
            catch (PDOException $exp)
            {
                echo "Erreur de connexion à la base de données";
            }
        }

        

        public function selectAllJeux ()
        {
            if ($this->pdo != NULL)    //  Appel de la fonction connexion
            {
                $requete = "SELECT * FROM JEU;";
                //  Preparation des requêtes
                $select = $this->pdo->prepare($requete);
                //  Exécution des requêtes
                $select->execute();
                return $select->fetchAll();
            }
            else
            {
                return NULL;
            }
        }

        public function selectAllJouets ()
        {
            if ($this->pdo != NULL)    //  Appel de la fonction connexion
            {
                $requete = "SELECT * FROM JOUET;";
                //  Preparation des requêtes
                $select = $this->pdo->prepare($requete);
                //  Exécution des requêtes
                $select->execute();
                return $select->fetchAll();
            }
            else
            {
                return NULL;
            }
        }


        public function insertObjet ($tab)
        {
            if ($this->pdo != NULL && $tab['objet'] == 'Jeu')    //  Appel de la fonction connexion
            {
                $requete = "INSERT INTO JEU VALUE(NULL, :idenfant, :nom, :valeur);";
                $donnees = array(   ":idenfant" => $tab['idenfant'],
                                    ":nom"      => $tab['nom'],
                                    ":valeur"   => $tab['valeur']);
                //  Preparation de la requête
                $select = $this->pdo->prepare($requete);
                //  Exécution de la requête avec les données des variables PDO
                $select->execute($donnees);
            }
            else if ($this->pdo != NULL && $tab['objet'] == 'Jouet')    //  Appel de la fonction connexion
            {
                $requete = "INSERT INTO JOUET VALUE(NULL, :idenfant, :nom, :valeur);";
                $donnees = array(   ":idenfant" => $tab['idenfant'],
                                    ":nom"      => $tab['nom'],
                                    ":valeur"   => $tab['valeur']);
                //  Preparation de la requête
                $select = $this->pdo->prepare($requete);
                //  Exécution de la requête avec les données des variables PDO
                $select->execute($donnees);
            }
        }

        public function searchObjet ($tab)
        {
            if ($this->pdo != NULL && $tab['objet'] == 'Jeu')    //  Appel de la fonction connexion
            {
                $requete = "SELECT * FROM JEU WHERE NOM = :objet";
                $donnees = array(":objet" => $tab['nomobjet']);
                //  Preparation de la requête
                $select = $this->pdo->prepare($requete);
                //  Exécution de la requête avec les données des variables PDO
                $select->execute($donnees);
                return $select->fetchAll();
            }
            else if ($this->pdo != NULL && $tab['objet'] == 'Jouet')    //  Appel de la fonction connexion
            {
                $requete = "SELECT * FROM JOUET WHERE NOM = :objet";
                $donnees = array(":objet" => $tab['nomobjet']);
                //  Preparation de la requête
                $select = $this->pdo->prepare($requete);
                //  Exécution de la requête avec les données des variables PDO
                $select->execute($donnees);
                return $select->fetchAll();
            }
        }

        public function barterObjets ($tab)
        {
            if ($this->pdo != NULL && $tab['objet0'] == 'Jeu')    //  Appel de la fonction connexion
            {
                if ($this->pdo != NULL && $tab['objet1'] == 'Jeu')
                {
                    $requete = "UPDATE JEU SET IDENFANT = :enfant1 WHERE IDJEU = :objet0; UPDATE JEU SET IDENFANT = :enfant0 WHERE IDJEU = :objet1;";
                }
                else if ($this->pdo != NULL)
                {
                    $requete = "UPDATE JEU SET IDENFANT = :enfant1 WHERE IDJEU = :objet0; UPDATE JOUET SET IDENFANT = :enfant0 WHERE IDJOUET = :objet1;";
                }
                $donnees = array(   ":enfant0" => $tab['idenfant0'],
                                    ":enfant1" => $tab['idenfant1'],
                                    ":objet0" => $tab['idobjet0'],
                                    ":objet1" => $tab['idobjet1']);
                //  Preparation de la requête
                $select = $this->pdo->prepare($requete);
                //  Exécution de la requête avec les données des variables PDO
                $select->execute($donnees);
            }
            else if ($this->pdo != NULL)
            {
                if ($this->pdo != NULL && $tab['objet1'] == 'Jeu')
                {
                    $requete = "UPDATE JOUET SET IDENFANT = :enfant1 WHERE IDJEU = :objet0; UPDATE JEU SET IDENFANT = :enfant0 WHERE IDJEU = :objet1;";
                }
                else if ($this->pdo != NULL)
                {
                    $requete = "UPDATE JOUET SET IDENFANT = :enfant1 WHERE IDJEU = :objet0; UPDATE JOUET SET IDENFANT = :enfant0 WHERE IDJOUET = :objet1;";
                }
                $donnees = array(   ":enfant0" => $tab['idenfant0'],
                                    ":enfant1" => $tab['idenfant1'],
                                    ":objet0" => $tab['idobjet0'],
                                    ":objet1" => $tab['idobjet1']);
                //  Preparation de la requête
                $select = $this->pdo->prepare($requete);
                //  Exécution de la requête avec les données des variables PDO
                $select->execute($donnees);
            }
        }

       

        public function sellObjets ($tab, $portefeuille0, $portefeuille1)
        {
            if ($this->pdo != NULL && $tab['objet'] == 'Jeu')
            {
                $requete = "UPDATE JEU SET IDENFANT = :enfant1 WHERE IDJEU = :idobjet; UPDATE ENFANT SET PORTEFEUILLE = :portefeuille0 + (SELECT VALEUR FROM JEU WHERE IDJEU = :idobjet) WHERE IDENFANT = :enfant0; UPDATE ENFANT SET PORTEFEUILLE = :portefeuille1 - (SELECT VALEUR FROM JEU WHERE IDJEU = :idobjet) WHERE IDENFANT = :enfant1;";
            }
            else if ($this->pdo != NULL)
            {
                $requete = "UPDATE JOUET SET IDENFANT = :enfant1 WHERE IDJOUET = :idobjet; UPDATE ENFANT SET PORTEFEUILLE = :portefeuille0 + (SELECT VALEUR FROM JOUET WHERE IDJOUET = :idobjet) WHERE IDENFANT = :enfant0; UPDATE ENFANT SET PORTEFEUILLE = :portefeuille1 - (SELECT VALEUR FROM JOUET WHERE IDJOUET = :idobjet) WHERE IDENFANT = :enfant1;";
            }
            $donnees = array(   ":enfant0"          => $tab['idenfant0'],
                                ":enfant1"          => $tab['idenfant1'],
                                ":objet"            => $tab['objet'],
                                ":idobjet"          => $tab['idobjet'],
                                ":portefeuille0"    => $portefeuille0,
                                ":portefeuille1"    => $portefeuille1);
            //  Preparation de la requête
            $select = $this->pdo->prepare($requete);
            //  Exécution de la requête avec les données des variables PDO
            $select->execute($donnees);
        }

        

        public function deleteObjet ($tab)
        {
            if ($this->pdo != NULL && $tab['objet'] == 'Jeu')    //  Appel de la fonction connexion
            {
                $requete = "DELETE FROM JEU WHERE IDJEU = :idobjet;";
                $donnees = array(":idobjet" => $tab['idobjet']);
                //  Preparation de la requête
                $select = $this->pdo->prepare($requete);
                //  Exécution de la requête avec les données des variables PDO
                $select->execute($donnees);
            }
            else if ($this->pdo != NULL && $tab['objet'] == 'Jouet')    //  Appel de la fonction connexion
            {
                $requete = "DELETE FROM JOUET WHERE IDJOUET = :idobjet;";
                $donnees = array(":idobjet" => $tab['idobjet']);
                //  Preparation de la requête
                $select = $this->pdo->prepare($requete);
                //  Exécution de la requête avec les données des variables PDO
                $select->execute($donnees);
            }
        }
    }
?>