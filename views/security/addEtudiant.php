<h3 class="text-center mb-3">Enregistrer un etudiant</h3>
<form>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Nom</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Nom"  required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Prenom</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Prenom"  required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefaultUsername">Date de naissance</label>
      <div class="input-group">
        <input type="date" class="form-control" id="validationDefaultUsername" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-4">
      <label for="validationDefault03">Email</label>
      <input type="email" class="form-control" id="validationDefault03" placeholder="Email" required>
    </div>
    <div class="col-md-4 mb-4">
      <label for="validationDefault04">Telephone</label>
      <input type="phone" class="form-control" id="validationDefault04" placeholder="Telephone" required>
    </div>
    <div class="col-md-4 mb-4">
      <label for="validationDefault05">Adresse</label>
      <input type="text" class="form-control" id="validationDefault05" placeholder="Adresse" required>
    </div>
    <select class="form-control col-md-4 ml-1 d-inline" name="select_type_etd" id="select_type_etd">
		<option selected="" disabled value="">Autres infos</option>
		<option value="bourseir_loge">Etudiant Boursier logé</option>
		<option value="boursier_non_loge">Etudiant Boursier non logé</option>
  </select>
  <select name="bourse" class="form-control col-md-4 bourse d-none">
    <option selected="" disabled value="">Choisir la Bourse</option>
    <option value="40000">Bourse entiere</option>
    <option value="20000">Demie bourse</option>
  </select>
    <div class="col-md-3 mb-3 chambre d-none">
      <!-- <label for="validationDefault05">Adresse</label> -->
      <input type="text" class="form-control" placeholder="Numero de chambre" required>
    </div>
    <div class="w-100"></div>
  <button class="btn btn-primary align-right mt-3" type="button">Enregistrer</button>
</form>
