<?php
    class Chambre implements IQuizz{
        protected $numero;
        protected $type;
        protected $num_bat;

        public function __construct($ch){
            if (!empty($ch)) {
                $this -> hydrate($ch);
            }
        }
        public function hydrate($ch){
            $this -> numero = $ch['NUM_CHAMBRE'];
            $this -> type = $ch['TYPE_CHAMBRE'];
            $this -> num_bat = @$ch['NUM_BAT'];
        }

        public function getNumBat(){
            return $this -> num_bat;
        }
        public function getNumChambre(){
            return $this -> numero;
        }

        public function getTypeChambre(){
            return $this -> type;
        }
    }
?>