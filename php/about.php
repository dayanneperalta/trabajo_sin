<?php
include './header.php';
include './connection.php';

echo $header_html;
echo "<div class='ms-3 mt-3'><a href='../index.php'>inicio</a></div>
<div class='row mt-2'>";

echo '<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
  <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked="">
  <label class="btn btn-outline-secondary" for="btnradio1">Historia</label>
  <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" checked="">
  <label class="btn btn-outline-secondary" for="btnradio2">Misión</label>
  <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" checked="">
  <label class="btn btn-outline-secondary" for="btnradio3">Visión</label>
</div>';

echo $footer_html;
