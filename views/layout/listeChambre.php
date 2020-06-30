
  
<?php
    $chambre = new ChambreDao();
    $chambres = $chambre -> findAll();
    function generateB($n){
      $i=0;
      $c=$n;
      while ($c>=1)
      {
        $c=$c/10;  
        $i++;
      }
      if ($i>=3 || $i == 0) {
        return $n;
      }
      elseif ($i == 2) {
        return '0'.$n;
      }
      elseif ($i==1) {
        return '00'.$n;
      }
   }
    function generateC($n){
      $i=0;
      $c=$n;
      while ($c>=1)
      {
        $c=$c/10;  
        $i++;
      }
      if ($i>=3 || $i == 0) {
        return $n;
      }
      elseif ($i == 3) {
        return '0'.$n;
      }
      elseif ($i == 2) {
        return '00'.$n;
      }
      elseif ($i==1) {
        return '000'.$n;
      }
   }

?>      
<div class="border" id="listeChambre">
    <h3 class="text-center">Liste chambres</h3>

     <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Num Chambre</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tchbr">
                    <?php
                      for ($i=0; $i < 5;   $i++) {
                        $id = $chambres[$i] -> getNumChambre();
                        $nb = generateB($chambres[$i] -> getNumBat());
                        $n = generateC($chambres[$i] -> getNumChambre());
                        $t = @$chambres[$i] -> getTypeChambre();
                    ?>
                        <tr  class="text-center">
                          <td ><?=@$nb?>-<?=@$n?></td>
                          <td><?=@$t?></td>
                          <td><button id="<?=@$id?>" style="background-color:#C79DD3;" class="fa fa-trash-o supp" aria-hidden="true"></button></td>
                        </tr>
                      <?php
                      }?>
                </tbody>
            </table>
            <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link btn btn-primary" href="">Precedent</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link btn btn-primary active" href="">Suivant</a>
            </li>
        </ul>
        </nav>
</div>
