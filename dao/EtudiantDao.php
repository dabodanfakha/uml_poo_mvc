<?php
class EtudiantDao extends Manager {


    public function __construct(){
        $this->tableName="etudiant";
        $this->className="Etudiant";
    }
    public function add($obj){
        $sql="";
       return $this->executeUpdate($sql)!=0;
    }
    public function update($obj){
        $table = $this-> tableName;
        $champ = $obj -> getChamp();
        $val = $obj -> getVal();
        $id = $obj -> getId();
        $sql = ("UPDATE `{$table}` SET `{$champ}` = '{$val}' WHERE `{$table}`.`NUM_ETUDIANT` = {$id}");
        return $this->executeUpdate($sql)!=0?'
        Valeur Modifiée':'Annulé';
    }

    public function findByType($type){
        $sql="select * from $this->tableName where type='$type' ";
        $data=$this->executeSelect($sql);
        return count($data)==1?$data[0]:$data;
    }
}