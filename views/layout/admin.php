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

    
  <body  style="background-image: url(../public/img/uadb.jpg); background-size: cover;">
      
    <div class="container col-12 col-md-8 mt-3" >
        <div class="text-center container text-white bg-primary pt-3" style="opacity: 0.899">
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
        <div id="default" class="p-2" style="background-color:#C79DD3; opacity: 0.95">
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

<?php
    //recuperation nombre total de chambre
    $chambre = new ChambreDao();
    $chambres = $chambre -> findAll();
?>
    <input type="hidden" id="nbChbr" value="<?= @count($chambres);?>">
    <script>
       var url="http://binome.alwaysdata.net";

        //supprimer chambre

        $('.supp').click(function(){
       // alert($(this).attr('id'));
        const id = $(this).attr('id');
        if (confirm('Supprimer la chambre')) {
            $.ajax({
                method:"POST",
                url:url+"/Admin/supprimerChambre", 
                data:{id}
            })
            .done(result=>{
                alert(result);
            })
            setTimeout( //rafraichir automatiquement la page apres deux secondes
            function() {
              window.location.reload(true);
            }, 2000);
        }
        })
        var limit = 5;//nbre d'element par page
        var offset = 0;// le point de depart
        var i = 0;
        var total_chbr = $('#nbChbr').val();
        var nb_page = Math.ceil(total_chbr/limit);

  
        
    /*-----------------------------------------------------
	pagination
	-------------------------------------------------------*/
	
    $(".pagination .page-item a").click(function(e){
		e.preventDefault()
        // alert($(this).text())
        if($(this).text() === 'Suivant'){
            i++;
            offset += 5;
        }
        else if($(this).text() === 'Precedent'){
            i--;
            offset -= 5;
        }
        else if($(this).text() === '1'){
            i = 1;
            offset =0;
        }
        else if($(this).text() === '2'){
            i = 2;
            offset =5;
        }
        else if($(this).text() === '3'){
            i = 3;
            offset =10;
        }
        listeChbre();
        
        if(i > 1){
            $(".pagination").find(".disabled").removeClass("disabled").addClass("active")
        }
        else{
            $(this).addClass("disabled")
        }
        if(i === nb_page){
            $(this).addClass("disabled")
        }
    })
    //listeChbre();


    $(document).on("click",".supp", function () {
        alert(ok)
    })

    /*---------------------------------
	----Ajouter de nouvelles lignes-----
    -----------------------------------*/ 
    function listeChbre(){
        var liste = 'chambre';
            $.ajax({
			type: "POST",
			url:url+"/Admin/paginer",
			data: {liste,limit,offset}, //on pouvait faire data: {liste,limit,offset}, si identik
			dataType: "JSON",
            })
            .done(data =>{
                //alert(data)
                addLine(data);
            })
    }

    function generateB(n){
      let j=0;
      let c=n;
      while (c>=1)
      {
        c=c/10;  
        j++;
      }
      if (j>=3 || j == 0) {
        return n;
      }
      else if (j == 2) {
        return '0'+n;
      }
      else if (j==1) {
        return '00'+n;
      }
   }
    function generateC(n){
      let j=0;
      let c=n;
      while (c>=1)
      {
        c=c/10;  
        j++;
      }
      if (j>=3 || j == 0) {
        return n;
      }
      else if (j == 3) {
        return '0'+n;
      }
      else if (j == 2) {
        return '00'+n;
      }
      else if (j==1) {
        return '000'+n;
      }
   }

	function addLine(values){
        $("#tchbr").empty();
		let line;
		for(let i = 0; i < values.length; i++){
            let n = generateB(values[i].nb);
            let c = generateC(values[i].nc);
			line = `
				<tr class="text-center">
                          <td >${n}-${c}</td>
                          <td>${values[i].tc}</td>
                          <td><button id=${values[i].nc} style="background-color:#C79DD3;" class="fa fa-trash-o supp" aria-hidden="true"></button></td>
				</tr>`;
			$("#tchbr").append(line);
		}
    }

    </script>
    </body>
  </html>