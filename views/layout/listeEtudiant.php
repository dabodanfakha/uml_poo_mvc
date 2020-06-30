<div class="mt-3" id="listeEtudiant">
        <div class="col-12">
                <select class="form-control col-12 col-md-4 mb-2 d-inline" name="etd_search" id="select_bourse">
                    <option selected="" disabled value="">Afficher par</option>
                    <option value="loge">Etudiants Boursiers logés</option>
                    <option value="non_loge">Etudiants Boursiers non logés</option>
                    <option value="non_boursier">Etudiants non Boursiers</option>
                </select>
                <label class="ml-3 border rouded" for="matr_search">Recherche Manuelle:&nbsp</label>&nbsp<input type="text" id="matr_search">
                <div class="mesgRqet d-inline ml-1 text-white bg-primary rounded"  style="width:auto"></div>
              <div style="overflow: auto;scrollbar-width: thin;">
              <table class="table tEtd table-striped">
                <thead>
                        <tr class="">
                            <th>Matricule</th>
                            <th>Noms</th>
                            <th>Prenoms</th>
                            <th class="dtns">Date naiss</th>
                            <th class="email">Email</th>
                            <th class="tlphn">Telephone</th>
                            <th class="brse">Bourse</th>
                            <th class="chbr">Chambre</th>
                            <th class="adr">Adresse</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
              </div>
            <div class="tableDiv" style="height:300px;overflow-y: scroll;scrollbar-width: thin;">
                <table class="table tEtd table-striped">
                    
                    <tbody id="tbody">
                        
                    </tbody>
                </table>
            </div>
         </div>
</div>
