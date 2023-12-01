<?php 
ob_start(); 
$datas = $_SESSION['cart'];
?>
<div class="container bg-dark pt-5 mt-5 mb-5">
  <h2 class="fw-bold mb-2 text-uppercase text-center text-white">Détails de mon Panier</h2>
  <p class="text-white-50 mb-5 text-center">...........</p>
  <?php foreach ($datas as $key => $data) : ?>
    <div class="row">
      <div class="col-6 text-center">
        <p class="text-white mb-5">Nom du Terrain : <?= $datas[$key]['field']['fieldName'] ?></p>
        <p class="text-white mb-5">Date de debut : <?= $datas[$key]['time']['dateStart'] ?></p>
        <p class="text-white mb-5">Date de fin : <?= $datas[$key]['time']['dateEnd'] ?></p>
        <p class="text-white mb-5">Heure de debut : <?= $datas[$key]['time']['hourStart'] ?></p>
        <p class="text-white mb-5">Heure de fin : <?= $datas[$key]['time']['hourEnd'] ?></p>
        <p class="text-white mb-5">Nombre d'heures : <?= $datas[$key]['time']['nbHour'] ?></p>
      </div>
      <div class="col-6 text-center">
        <p class="text-white mb-5">Nombre d'option : <?= $datas[$key]['nbOp'] ?></p>
        <p class="text-white mb-5">Nom de des options :</p>
        <table class="table bg-dark">
          <thead>
            <tr>
              <th class="text-dark">Nom de l'option</th>
              <th class="text-dark">Prix HT</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($datas[$key]['options']['optionNames'] as $index => $optionName) : ?>
              <tr>
                <td class="text-dark"><?= $optionName ?></td>
                <td class="text-dark"><?= $datas[$key]['options']['optionPrices'][$index] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <p class="text-white mb-5">Coût des options TTC : <?= $datas[$key]['options']['totalCostTTC'] ?></p>
        <p class="text-white mb-5">Coût du terrain TTC : <?= $datas[$key]['field']['totalTTCField'] ?></p>
        <p class="text-white mb-5">Prix total TTC : <?= $datas[$key]['totalTTC'] ?> €</p>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php 
$content = ob_get_clean();
require_once 'src/template/Layout.php';
?>