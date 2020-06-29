<?php
    class Batiment implements IQuizz{
        protected $numero;
        protected $nom;

        public function __construct($bat){
            if (!empty($bat)) {
                $this -> hydrate($bat);
            }
        }
        public function hydrate($bat){
            $this -> numero = $bat['NUM_BAT'];
            $this -> nom = $bat['NOM_BAT'];
        }

        public function getBatNum(){
            return $this -> numero;
        }

        public function getBatNom(){
            return $this -> nom;
        }
    }
?>