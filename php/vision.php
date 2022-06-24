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
    <a class="nav-link " data-bs-toggle="tab" href="mision.php">Misión</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" data-bs-toggle="tab" href="vision.php">Visión</a>
  </li>

</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade" id="Historia">
    <p>Era el año 2010. Dick Hayne tenía solo 23 años cuando él, su compañero de cuarto de la universidad Scott Belair y Judy Wicks tuvieron la idea de abrir una tienda minorista en línea. Belair estaba buscando un tema para una clase empresarial que estaba tomando en ese momento. Su misión era brindar ropa a los clientes en un ambiente informal y divertido.</p>
  </div>
  <div class="tab-pane fade " id="Misión">
    <p>Food truck fixie locavore, accusamus mcsweeneys marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
  </div>
  <div class="tab-pane fade active show" id="dropdown1">
    <p>Ser la compañía más admirada y preferida del Peru por su experiencia de compra.</p>
  </div>
</div>';
echo "<img class='img-fluid' width='100%' src='../img/misionsin.png'>";
echo $footer_html;
