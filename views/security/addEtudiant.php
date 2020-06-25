<h3>Enregistrer un etudiant</h3>
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
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Email</label>
      <input type="email" class="form-control" id="validationDefault03" placeholder="Email" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Telephone</label>
      <input type="phone" class="form-control" id="validationDefault04" placeholder="Telephone" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault05">Adresse</label>
      <input type="text" class="form-control" id="validationDefault05" placeholder="Adresse" required>
    </div>
    <select class="form-control col-8 d-inline" name="select" id="select_type">
		<option selected="" value="">Type Etudiant</option>
		<option value="checkbox">Etudiant Boursier logé</option>
		<option value="radio">Etudiant Boursier non logé</option>
		<option value="text">Etudiants non Boursier</option>
	</select>
    <div class="w-100"></div>
  <button class="btn btn-primary align-right mt-3" type="submit">Enregistrer</button>
</form>