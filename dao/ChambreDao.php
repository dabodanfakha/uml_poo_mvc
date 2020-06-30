<?php
class ChambreDao extends Manager {


    public function __construct(){
        $this->tableName="chambre";
        $this->className="Chambre";
    }


    public function add($obj){
        try{
            $n = $obj -> getNumChambre();
            $t = $obj -> getTypeChambre();
            // echo 'n= '.$n.' et t= '.$t;
            $sql = "INSERT INTO `chambre`(`NUM_BAT`, `TYPE_CHAMBRE`) VALUES ($n,'$t')";
            $query = $this -> executeUpdate($sql);
            return $query;
            }
            catch(PDOException $e){
            exit($e -> getMessage());
        }
    }

    public function findAll(){
        $sql="select * from $this->tableName";
        $data=$this->executeSelect($sql);
        if(count($data)==0){
              echo 0;
        }
        return $data;
    }
    
    public function update($obj){

    }
    





}