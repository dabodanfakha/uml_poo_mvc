<?php
class Etudiant implements IQuizz {
    //Attributs
       //Encapsulation
        protected  $id;
        protected  $matricule;
        protected  $nom;
        protected  $prenom;
        protected  $dateN;
        protected  $email;
        protected  $telephone;
        protected  $adresse;
        protected  $num_chbr;
        protected  $bourse;
        protected  $champ;
        protected  $val;

        
// public abstract  function hydrate($row);
  
     public   function __construct($row=null){
         if($row!=null){
             $this->hydrate($row);
         }

     }
    
     public  function hydrate($row){
        $this->id=$row['NUM_ETUDIANT']; 
        $this->matricule=$row['MATRICULE'];  
        $this->nom=$row['NOM'];  
        $this->prenom=$row['PRENOM'];  
        $this->dateN=$row['DATE_NAISS'];  
        $this->email=@$row['EMAIL'];  
        $this->telephone=@$row['TEL'];  
        $this->adresse=@$row['ADRESSE'];  
        $this->num_chbr=@$row['CHAMBRE'];  
        $this->bourse=@$row['BOURSE'];  
     }
      //Methodes
        //Getters
        public function getId(){
            return $this->id;
        }
        public function setId($id){
             $this->id = $id;
        }
        public function getMatr(){
            return $this->matricule;
        }
        public function getNom(){
            return $this->nom;
        }
        public function getPrenom(){
            return $this->prenom;
        }

        public function getDateN(){
            return $this->dateN;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getTelephone(){
            return $this->telephone;
        }

        public function getAdresse(){
            return $this->adresse;
        }

        public function getNumCH(){
            return isset( $this->num_chbr)? $this->num_chbr:'Non logé(e)';
        }
        public function getBourse(){
            return isset( $this->bourse)? $this->bourse:'Non boursier(e)';
        }

        public function getChamp(){
            return $this-> champ;
        }
        public function setChamp($champ){
             $this-> champ = $champ;
        }

        public function getVal(){
            return $this-> val;
        }
        public function setVal($val){
            $this-> val = $val;
        }
}