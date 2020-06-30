<?php
abstract class Manager implements IDao{
    //Connexion est Fermée
    private $pdo=null;
    protected $tableName;
    protected $className;

  private function getConnexion(){
      //Connexion est fermée
      if($this->pdo==null){
          try{
            $this->pdo = new PDO("mysql:host=mysql-binome.alwaysdata.net;dbname=binome_dd","binome","wFVAte64NtDWRtV");
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
          }catch(PDOException $ex){
             die("Erreur de Connexion");
          }
        
      }
      
  }

  
  public function add($obj){
    $this->getConnexion();
  }


  public function update($obj){
      
  }

 private function closeConnexion(){
      
    if($this->pdo!=null){
      $this->pdo=null;
    }
  }

  public function executeUpdate($sql){
    // echo 'votre rqtt est '. $sql;
          $this->getConnexion();
           $nbreLigne= $this->pdo->exec($sql);
          $this->closeConnexion();
          return $nbreLigne != 0 ?$nbreLigne:"Erreur";
   }

 

  
   public function findChambre($limit,$offset){
    $sql = "SELECT * FROM `chambre` LIMIT {$limit} OFFSET {$offset}";
    $res = $this->executeSelect($sql);
    return $res;
    }

  public function executeSelect($sql){
    $this->getConnexion();
    //Traitement
      $result=$this->pdo->query($sql);
      $data=[];
      foreach( $result as $rowBD){
        //ORM=> tuple BD transformer en Objet
        $data[]=new $this->className($rowBD);//new User($rowBD)     
      }
      $this->closeConnexion();
      return $data;
  }

  public function findAll(){
    $sql="select * from $this->tableName";
    $data=$this->executeSelect($sql);
    return $data;
  }
public function findById($id){
    $sql="select * from $this->tableName where id=$id ";
    $data=$this->executeSelect($sql);
    return count($data)==1?$data[0]:$data;

}

public function delete($id,$nomId){
    $sql="delete from $this->tableName where $nomId = $id";
    return $this->executeUpdate($sql)!=0?'Supprimé(e)':'impossible de supprimer';

    //$a = 'A' === 'a' ? 'ils sont egal' : 'ils sont diff';
    //$a = isset($_POST['id']) ? 1 : 2; condition ternaire
}





    //Connexion
    //FermerConnexion
    //Executer une requete et Retourner un Résultat
       //Execution Requete MaJ(Insert,Update,delete)
       //Execution requete Select

    
}