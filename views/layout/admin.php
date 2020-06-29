<!doctype html>
<html lang="en">
  <head>
    <title><?=@$title?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/public/css/classe.css">
  </head>

    
  <body>
      
    <div class="container col-12 col-md-8 mt-3">
        <div class="text-center container text-white bg-primary pt-3">
        <h3 class="mb-5">Bienvenue</h3>
            <div class="container menu  d-xs-none">
                <ul class="nav nav-tabs nav-justified   flex-column flex-sm-row">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $_GET['url']=='Admin/listeEtudiant'?'active':''?> " href="<?=BASE_URL?>/Admin/listeEtudiant">Liste des Etudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $_GET['url']=='Admin/listeChambre'?'active':''?>" href="<?=BASE_URL?>/Admin/listeChambre">Liste Chambre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $_GET['url']=='Admin/addEtudiant'?'active':''?>" href="<?=BASE_URL?>/Admin/addEtudiant">Enregistrer Etudiant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $_GET['url']=='Admin/addChambre'?'active':''?>" href="<?=BASE_URL?>/Admin/addChambre">Ajout Chambre</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="default" class="p-2" style="background-color:#C79DD3">
        <?php echo  $content_for_layout?>
        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="../public/js/script.js"></script>
    </body>
  </html>