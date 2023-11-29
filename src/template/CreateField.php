<?php ob_start(); ?>

<form method="post" action="index.php?controller=field&action=store">
  <div class="form-group">
    <label for="fieldName">Nom du terrain</label>
    <input type="text" class="form-control" name="fieldName" id="fieldName" placeholder="Nom du terrain">
  </div>
  <div class="form-group">
    <label for="fieldTarifHourHT">Tarif par heure (HT)</label>
    <input type="text" class="form-control" name="fieldTarifHourHT" id="fieldTarifHourHT" placeholder="Tarif par heure (HT)">
  </div>
  <div class="form-group">
    <label for="fieldTarifDayHT">Tarif par jour (HT)</label>
    <input type="text" class="form-control" name="fieldTarifDayHT" id="fieldTarifDayHT" placeholder="Tarif par jour (HT)">
  </div>
  <div class="form-group">
    <label for="fieldPicture">Photo du terrain</label>
    <input type="file" class="form-control" name="fieldPicture" id="fieldPicture" placeholder="Photo du terrain">
  </div>
  <div class="form-group">
    <label for="centerId">Centre</label>
    <input type="text" class="form-control" name="centerId" id="centerId" placeholder="Centre">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>


  <?php
  $content = ob_get_clean();
  require('src/template/Layout.php');
  ?>