<?php
require_once './layouts/Header.php';


$carreto = array(
        array("id"=>"1", "Producte"=>"Nike", "Quantitat"=>"2","Total"=>40),
        array("id"=>"2", "Producte"=>"Adidas", "Quantitat"=>"1","Total"=>10.99),
        array("id"=>"3", "Producte"=>"Vagrant", "Quantitat"=>"1","Total"=>12.95)
    );
?>


<body>
<div class="d-flex flex-column align-items-center">

<p class="fs-1">CARRETO</p>

<table class="table table-striped table-dark w-50">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nº</th>
      <th scope="col">Producte</th>
      <th scope="col">Quantitat</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
  <?foreach($carreto as $product):?>
    <tr>
      <th scope="row"><?=$product['id']?></th>
      <td><?=$product['Producte']?></td>
      <td><?=$product['Quantitat']?></td>
      <td><?=$product['Total']?></td>
    </tr>
   <?endforeach?>
  </tbody>
</table>

<button class="btn btn-dark mt-5">COMPRA</button>

</div>
</body>
</html>