<?php
include './header.php';
include './connection.php';

echo $header_html;
echo "<div class='ms-3 mt-3'><a href='../index.php'>inicio</a></div>
<div class='row mt-2'>";
echo '<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " data-bs-toggle="tab" href="historia.php">Historia</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" data-bs-toggle="tab" href="mision.php">Misión</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="vision.php">Visión</a>
  </li>

</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade" id="Historia">
    <p>Era el año 2010. Dick Hayne tenía solo 23 años cuando él, su compañero de cuarto de la universidad Scott Belair y Judy Wicks tuvieron la idea de abrir una tienda minorista en línea. Belair estaba buscando un tema para una clase empresarial que estaba tomando en ese momento. Su misión era brindar ropa a los clientes en un ambiente informal y divertido.</p>
  </div>
  <div class="tab-pane fade active show" id="Misión">
    <p>Ayudar a nuestros clientes a verse y sentirse bien. Queremos ayudarte a crear los mejores recuerdos con los mejores outfits. Estamos comprometidos a brindar a nuestros clientes el mejor servicio posible y a mejorarlo todos los días</p>
  </div>
  <div class="tab-pane fade" id="dropdown1">
    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeneys organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
  </div>
</div>';
echo "<img class='img-fluid' width='100%' src='../img/visionsin.png'>";
echo $footer_html;
