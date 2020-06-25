<h3>Ajouter Nvlle chambre</h3>

<form id="formAddChambre">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Num batiment</label>
    <select class="form-control col-6 d-inline" name="select" id="select_type">
		<option selected="" value="">selectionner le batiment</option>
		<option value="checkbox">............</option>
		<option value="radio">.............</option>
		<option value="text">...............</option>
	</select>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Type chambre</label>
    <select class="form-control col-6 d-inline" name="select" id="select_type">
		<option selected="" value="">le type de cette chambre</option>
		<option value="collectif">Chambre a deux</option>
		<option value="individuel">Chambre individuelle</option>
	</select>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Valider</button>
    </div>
  </div>
</form>

<script>
    $(document).ready(function(){
        $('#formAddChambre').submit(function(){
            // alert('ok');
            event.preventDefault();
        })
        
    })
</script>