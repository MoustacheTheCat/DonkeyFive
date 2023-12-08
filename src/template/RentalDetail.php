<?php ob_start(); ?>
<div class="container bg-dark pt-5 mt-5 mb-5">
  <h2 class="fw-bold mb-2 text-uppercase text-center text-white">Détails de La Location</h2>
  <p class="text-white-50 mb-5 text-center">...........</p>
    <div class="row">
      <div class="col-6 text-center">
        <p class="text-white mb-5">Nom du Terrain : <?= $fieldDatas['fieldName'] ?></p>
        <p class="text-white mb-5">Date de debut : <?= $dataTimes->dateStart ?></p>
        <p class="text-white mb-5">Date de fin : <?= $dataTimes->dateEnd ?></p>
        <p class="text-white mb-5">Heure de debut : <?= $dataTimes->hourStart ?></p>
        <p class="text-white mb-5">Heure de fin : <?= $dataTimes->hourEnd?></p>
        <p class="text-white mb-5">Nombre d'heures : <?= $dataTimes->nbHour ?></p>
      </div>
      <div class="col-6 text-center">
        <p class="text-white mb-5">Nombre d'option : <?= $nbOp ?></p>
        <p class="text-white mb-5">Nom de des options :</p>
        <table class="table bg-dark">
          <thead>
            <tr>
              <th class="text-dark">Nom de l'option</th>
              <th class="text-dark">Prix HT</th>
              <th class="text-dark">Prix TTC</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($array as $key => $value) : ?>
              <?php if(is_int($key)) :?>
              <tr>
                  <td class="text-dark"><?= $value->names ?></td>
                  <td class="text-dark"><?= $value->prices.' €'?></td>
                  <td class="text-dark"><?= ($value->prices*1.2).' €'?></td>
              </tr>
            <?php endif;?>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php $costTTC = $datas['rentalTotalTTC'];?> 
          <p class="text-white mb-5">Coût des options TTC : <?= ($array['costs']->totalHT*1.2).' €' ?></p>
          <p class="text-white mb-5">Coût du terrain TTC : <?= ($costTTC-($array['costs']->totalHT*1.2)).' €' ?></p>
          <p class="text-white mb-5">Prix total TTC : <?= $costTTC.' €'?></p>
      </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once 'src/template/Layout.php';
?>