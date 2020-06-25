<?php

class Router{
  protected $instanceCtrl;
  function route(){
      try {
          spl_autoload_register(function($class){
              $pathModel = "./model/".$class.".php";
              if (file_exists($pathModel)) {
                  require_once($pathModel);
              }
              else{
                  echo "not existe";
              }
          });
          //si klk chose est dans l'url
          if (isset($_GET['url'])) {
              //on decoupe l'url forme de class/method
              $url = explode('/',filter_var($_GET['url'],FILTER_SANITIZE_URL));
              // print_r ($url);
              //on recupere la class
              $classCtrl = isset($url[0])?ucfirst(strtolower($url[0]))."Controller":"";
              // echo $classCtrl;
              //on recupere le chemin du fichier
              $pathCtrl = "./controllers/".$classCtrl.".php";
              // echo $pathCtrl;
              //on verifie si le fichier existe
              if (file_exists($pathCtrl)) {
                  //on le charge
                  require_once("$pathCtrl");
                  //on instancie la class
                  $this -> instanceCtrl = new $classCtrl();
                  //on recupere la methode 
                  $methodClrl = isset($url[1])?$url[1]:"";
                  //si la methode existe
                  if (method_exists($this -> instanceCtrl,$methodClrl)) {
                      //on adopte la methode
                      $this -> instanceCtrl -> {$methodClrl}();
                  }
                  else{
                      // echo $pathCtrl;
                      echo "this method does not exist<br/>";
                  }
              }
              else {
                  echo "that file does not exist<br/>";
              }
          }
          else{
              require_once('index.php');
          }
      } 
      catch (Exception $e) {
          exit('erreur '.$e);
      }
  }
}

// $route = new Router();
// $route -> route();


?>


<!doctype html>
<html lang="en">
  <head>
    <title>work groupe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
  </head>


  <body>
    <div class="container col-12 col-md-8">
      <div class="text-center container text-white bg-primary pt-3" style="height:140px">
       <h3 class="mb-5">Bienvenue</h3>
        <div class="container menu  d-xs-none">
            <ul class="nav nav-tabs nav-justified   flex-column flex-sm-row">
                <li class="nav-item">
                    <a class="nav-link active" href="view/layout/listeEtudiant.php">Liste des Etudiants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view/layout/listeChambre.php">Liste Chambre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view/security/addEtudiant.php">Enregistrer Etudiant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view/security/addChambre.php">Ajout Chambre</a>
                </li>
            </ul>
        </div>
      </div>
      <div id="default" class="p-3" style="background-color:#C79DD3">
        <?php
          require_once("view/layout/listeEtudiant.php")
        ?>
      </div>

    </div>

        
    <script>
    // window.onload = function() {
    //    $("#default").load('view/layout/listeEtudiant.php');
    // };
</script>





















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="public/js/script.js"></script>
  </body>
</html>