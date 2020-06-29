<?php
class AdminController extends Controller{


   public  function __construct(){
      $this->folder="layout";
      $this->layout="admin";
      $this->validator=new Validator();
    
   }

    public function index(){
        $this->view="listeEtudiant";
        $_GET['url'] = 'Admin/listeEtudiant';
          $this->render();
    }

    
    public function liste(){
          if (isset($_POST['type'])) {
               $stdt = new EtudiantDao();
               if ($_POST['type'] ==='etudiant') {
                    $etdt = $stdt -> findALL();
               }
               else {
                    $etdt = $stdt -> findByType($_POST['type']);
               }
               $etd = [];
               $i = 0;
               foreach ($etdt as $key => $value) {
                    $etd[$i]['id'] = @$value -> getId();
                    $etd[$i]['mat'] = @$value -> getMatr();
                    $etd[$i]['nom'] = @$value -> getNom();
                    $etd[$i]['prenom'] = @$value -> getPrenom();
                    $etd[$i]['dateN'] = @$value -> getDateN();
                    $etd[$i]['email'] = @$value -> getEmail();
                    $etd[$i]['tel'] = @$value -> getTelephone();
                    $etd[$i]['bourse'] = @$value -> getBourse();
                    $etd[$i]['numCh'] = @$value -> getNumCH();
                    $etd[$i]['adr'] = @$value -> getAdresse();
                    $i++;
               }
               echo json_encode($etd);
               // echo 'ok';
          }
     }

     public function updateEtudiant(){
          if (isset($_POST['update'])) {
               extract($_POST);
               $etd = new Etudiant();
               $etd -> setId($id);
               $etd -> setChamp($champ);
               $etd -> setVal($val);
               $this-> dao = new EtudiantDao();
               $res = $this-> dao -> update($etd);
               echo $res;
          }
     }

     public function deleteEtudiant(){
          if (isset($_POST['action'])) {
               extract($_POST);
               $this-> dao = new EtudiantDao();
               $res = $this-> dao -> delete($id,"NUM_ETUDIANT");
               echo $res;
          }
     }
    

    public function listeEtudiant(){
         $this->view="listeEtudiant";
         $this -> data_view['title']= 'liste etudiants';
         $this->render();
     }
    public function listeChambre(){
         $this->view="listeChambre";
         $this -> data_view['title']= 'liste chambres';
         $this->render();
     }

     public function addEtudiant(){
          $this->folder="security";
          $this->view="addEtudiant";
          $this -> data_view['title']= 'inscription etudiant';
          $this->render();
     }
     public function addChambre(){
          if (isset($_POST['btn_newChambre'])) {
               extract($_POST);
               $b = $arrayName = array('NUM_CHAMBRE' => $num_bat, 'TYPE_CHAMBRE' => $type);
               $c = new Chambre($b);
               $this->dao=new ChambreDao();
               $ch=$this->dao->add($c);
               $this -> data_view['res'] = $ch!='Erreur'?"Ajout succès":"Erreur d'ajout";
          }
          $this->folder="security";
          $this->view="addChambre";
          $this -> data_view['title']= 'ajout nouvelle chambre';
          $this->render();
     }

}