<?php
    class Chambre{
        public $numChambre;
        public $type;
        
        
        public function __construct($etd = []){
            $this-> numChambre = $etd['numChambre'];
            $this-> type = $etd['type'];
    
        }
    }
?>