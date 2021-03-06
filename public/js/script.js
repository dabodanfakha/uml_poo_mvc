$(document).ready(function(){
    var url = "http://binome.alwaysdata.net";
    //click bouton valider ajout chambre
    $('.addChbr').click(function(){
        // alert('ok');
        if ($('#select_bat option:selected').val() === '' || $('#select_type  option:selected').val() === '') {
            $('#addChbrMsg').attr("class","bg-danger col-3 text-white text-center");
            $('#addChbrMsg').text('Selectionnez une option partout');
            event.preventDefault();
        }
        
    })
    //click bouton annuler ajout chambre
    $('.resetChbr').click(function(){
        $('#formAddChambre')[0].reset(); // reinitiqlisqtion des champs
        $('#addChbrMsg').hide();
        $('.msgAjout').hide();
        event.preventDefault();
    })

    



    /*================================================================
	------------------PARTIE LISTE DES ETUDIANTS------------------------
	=================================================================*/
    var limit = 7;
    var offset = 0;
 

    /*-----------------------------------------------------
	fonction liste
    -------------------------------------------------------*/
    // listeEtudiant();

	function listeEtudiant(typeEtd){
        let type = typeEtd;
		$.ajax({
			type: "POST",
            url: url+"Admin/liste",
			data: {type,limit:limit,offset:offset}, //on pouvait faire data: {limit,offset}, si identik
			dataType: "JSON",
		})
		.done(data =>{
            addLine(data);
            // alert(data)
            offset += 7;
        })
    }

	/*---------------------------------
	----Ajouter de nouvelles lignes-----
	-----------------------------------*/ 
	function addLine(values){
        console.log(values);
        //$("#tbody").empty();
        let line;
		for (let i = 0; i < values.length; i++){
			line = `
                <tr class="text-center" id = ligne-${values[i].id}>
                    <td class="ma" id = matricule-${values[i].id}>${values[i].mat}</td>
                    <td class="nm" id = t-nom-${values[i].id}>${values[i].nom}</td>
                    <td class="prn" id = t-prenom-${values[i].id}>${values[i].prenom}</td>
					<td class = "dtns" id = d-date_naiss-${values[i].id}>${values[i].dateN}</td>
					<td class = "email" id = t-email-${values[i].id}>${values[i].email}</td>
					<td class = "tlphn" id = t-tel-${values[i].id}>${values[i].tel}</td>
					<td class = "brse" id = t-bourse-${values[i].id}>${values[i].bourse}</td>
                    <td class = "chbr" id = t-chambre-${values[i].id}>${values[i].numCh}</td>
                    <td class = "adr" id = t-chambre-${values[i].id}>${values[i].adr}</td>
                    <td><button style="background-color:#C79DD3;" class="fa fa-trash-o suppr" aria-hidden="true"></button></td>
                </tr>`;
            $("#tbody").append(line);
            // console.log(line);
		}
    }

    if (!$('#select_bourse').val()) {
        offset = 0;
        listeEtudiant("etudiant");
    }

/*-----------------------------------------------
        Modifier Supprimer
-------------------------------------------------*/ 
$(document).ready(function(){
        // 
    let coul;
    let clone;
    let type;
    let objEnCours=null;
    // 
	$("#tbody")
    .on("click","tr",function(){
    //  alert($(this).html())
        let identif = $(this).attr("id");
        const tab = identif.split("-");
        identif = tab[1];
        // alert(identif);
        $(".suppr").attr("id",identif);
       coul=$("#tbody").css("background-color");
       $(this).css("background-color","#CF9B9B");
       $("#tbody tr").not(this).css("background-color",coul);
    })

    .on('dblclick',"td",function(){
        // alert($(this).attr('id'))
        // $(this).parents().css("background-color",coul);
        const id =$(this).attr("id");
        const tab = id.split("-");
        objEnCours=$(this);
        //console.log($(this).children().clone());
        type=tab[0];
        clone=type==="d"?$(this).children().clone():$(this).text();
    //    alert(clone)
        if((type==='t') || (type ==='d')){
            const input=getInput(tab,clone);
            $(this).html(input);
            $(this).children().focus();
        }
    })

    .on("focusout","td",function(e){
        
        const {id,value} = e.target;
        const tab=id.split("-");
        if(type==='t' || type === 'd') {
            if(value.trim() != ""){
                if (tab[0]==='email' && !isEmail(value)) {
                    $('.mesgRqet').addClass("p-1 bg-danger");
                    $('.mesgRqet').text('Email non valide');
                    return false;
                }
                $(this).html(value); 
                const data={
                    "update":"etudiant",
                    "champ":tab[0],
                    "id":tab[1],
                    "val":value
                }
                $.ajax({
                method:"POST",
                url: url+"Admin/updateEtudiant",
                data:data
                })
                .done(data =>{
                    $('.mesgRqet').addClass("p-1");
                    $('.mesgRqet').text(data);
                    // alert(data);
                })
            }
            else{
                $(this).html(clone);
            } 
        }
        setTimeout( 
            function() {
              window.location.reload(true);
            }, 2000);
        
    })

    function getInput(tab,txt){
        const tp={
            "t":"text",
            "d":"date"
        };
        type=tab[0];
        const v= type=="d"?'':` value="${txt}"`;
        const input = `<input type ="${tp[type]}" id="${tab[1]}-${tab[2]}" ${v} />`;
        return input;
    }

    /*--------------------------------------------
        Test de l'email
    ----------------------------------------------*/
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

        
    /*--------------------------------------------
        Click sur le bouton supprimer
    ----------------------------------------------*/
    $(document).on("click",".suppr", function () {

        // alert($(this).attr('id'))
        let id = $(this).attr('id');
        if (id) {
            let ln = 'ligne-'+id;//la ligne c a d le joueur
            let prn = $('#'+ln).find('.prn').html();//son prenom
            let nm = $('#'+ln).find('.nm').html();//son nom
            if (confirm('Vous voulez supprimer '+prn+' '+nm+' ?')) {
                const data={
                    "action":"delete",
                    "id":id
                }
                $.ajax({
                method:"POST",
                url: url+"Admin/deleteEtudiant",
                data:data
                })
                .done(data =>{
                    // alert(data);
                    $('.mesgRqet').addClass("p-1");
                    $('.mesgRqet').text(data);
                })
                if (data) {
                    $('#'+ln).hide();
                }
            }
        }
        else{
            $('.mesgRqet').text('Selectionnez un Etudiant');
        }
    })
})


/*--------------------------------------------
    Recherche par type d'etudiants
----------------------------------------------*/ 
$(document).ready(function(){
    $('#select_bourse').change(function() {
        offset = 0;
        // alert($(this).val())
        let type = $(this).val();
        $("#tbody").empty();
        listeEtudiant(type);
        
    });
})


/*--------------------------------------------
    Recherche manuelle
----------------------------------------------*/
$(document).ready(function(){
    $("#matr_search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });

 
    /*--------------------------------------------
        Scroll
    ----------------------------------------------*/
    const scrollZone = $('.tableDiv')
    scrollZone.scroll(function(){
        //console.log(scrollZone[0].clientHeight)
        const st = scrollZone[0].scrollTop;
        const sh = scrollZone[0].scrollHeight;
        const ch = scrollZone[0].clientHeight;
    
        //console.log(st,sh, ch);
        
        if(sh-st <= ch){
            if (!$('#select_bourse').val()) {
                listeEtudiant("etudiant");
            }
            else{
                listeEtudiant($('#select_bourse').val());
            };
        }        
    })
})

    /*--------------------------------------------
        Inscription etudiant
    ----------------------------------------------*/
$(document).ready(function(){
    $('#select_type_etd').change(function(){
        $('.bourse').removeClass('d-none');
      if($(this).val() === 'bourseir_loge'){
          $('.chambre').removeClass('d-none');
      }
      else{
        $('.chambre').addClass('d-none');
      }
    })
  })