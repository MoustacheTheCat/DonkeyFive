<?php ob_start(); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h2 class="text-center">Modifier le Terrain </h2>
    </div>
  </div>
</div>

<div>
  <form action="">
    <label for="fieldName">Nom du terrain</label>
    <input type="text" name="fieldName" id="fieldName" value="<?= ($fields['fieldName']) ?>">
    <label for="fieldTarifHourHT">Tarif par heure (HT)</label>
    <input type="text" name="fieldTarifHourHT" id="fieldTarifHourHT" value="<?= ($fields['fieldTarifHourHT']) ?>">
    <label for="fieldTarifDayHT">Tarif par jour (HT)</label>
    <input type="text" name="fieldTarifDayHT" id="fieldTarifDayHT" value="<?= ($fields['fieldTarifDayHT']) ?>">
    <label for="fieldPicture">Photo du terrain</label>
    <input type="file" name="fieldPicture" id="fieldPicture" value="<?= ($fields['fieldPicture']) ?>">
    <label for="centerId">Centre</label>
    <input type="text" name="centerId" id="centerId" value="<?= ($fields['centerId']) ?>">
    <input type="submit" value="Submit">


  </form>
</div>
<?php
$content = ob_get_clean();
require('src/template/Layout.php');
?>