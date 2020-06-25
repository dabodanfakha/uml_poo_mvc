<?php
    class Etudiant{
        public $matricule;
        public $nom;
        public $prenom;
        public $dateN;
        public $adresse;
        public $email;
        public $tel;
        public $type;
        public $bourse;
        
        public function __construct($etd = []){
            $this-> matricule = $etd['matricule'];
            $this-> nom = $etd['nom'];
            $this-> prenom = $etd['prenom'];
            $this-> dateN = $etd['dateN'];
            $this-> adresse = $etd['adresse'];
            $this-> email = $etd['email'];
            $this-> tel = $etd['tel'];
            $this-> type = $etd['type'];
            $this-> bourse = $etd['bourse'];
        }
    }
?>