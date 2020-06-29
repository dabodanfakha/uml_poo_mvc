<?php
  
$btdao = new BatimentDao();
$getBat = ($btdao -> findAll());
?>

  <h3 class="text-center mb-3"> Ajout chambre</h3>

<form  method = "POST" action = "<?=BASE_URL?>/Admin/addChambre" id="formAddChambre">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Num batiment</label>
    <select class="form-control col-6 d-inline" name="num_bat" id="select_bat">
		<option selected="" disabled value="">selectionner le batiment</option>
    <?php
      foreach ($getBat as $key => $value) {
        echo '<option value="'.($value-> getBatNum()).'">'. $value-> getBatNum(); echo ' '. $value-> getBatNom();  echo '</option>';
      }
    ?>
	</select>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Type chambre</label>
    <select class="form-control col-6 d-inline" name="type" id="select_type">
		<option selected="" disabled value="">le type de cette chambre</option>
		<option value="collectif">Chambre a deux</option>
		<option value="individuel">Chambre individuelle</option>
	</select>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="btn_newChambre" class="btn btn-danger resetChbr">Annuler</button>
      <button type="submit" name="btn_newChambre" class="btn btn-primary float-right addChbr">Valider</button>
    </div>
  </div>
</form>
<div id="addChbrMsg"></div>
<?php if (isset($res)) {
  echo '<div  class="bg-success msgAjout col-3 text-center rounded p-1">'.@$res.'</div>';
}
?>


<script>
    // $(document).ready(function(){
    //     $('#formAddChambre').submit(function(){
    //         // alert('ok');
    //         event.preventDefault();
    //     })
        
    // })
</script>