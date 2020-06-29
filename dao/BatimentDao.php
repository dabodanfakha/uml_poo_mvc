<?php
    class BatimentDao extends Manager{

        public function __construct(){
            $this->tableName="batiment";
            $this->className="Batiment";
        }


        public function findAll(){
            $sql="select * from $this->tableName";
            $data=$this->executeSelect($sql);
            if(count($data)==0){
                  echo 0;
            }
            return $data;
        }
    }
?>