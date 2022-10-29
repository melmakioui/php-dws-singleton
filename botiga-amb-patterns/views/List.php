<?php
require_once './layouts/Header.php'; 
require_once '../validation/RegisterProduct.php';
$variable = new RegisterProduct();
$data = $variable->getList();


?>
<div class="d-flex flex-wrap justify-content-evenly w-75 m-auto mt-5">
    <?foreach ($data as $product):?>
    <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 16rem; border-style:none ">
        <img class="card-img-top " src="./images/<?=$product["id"]?>.jpg" alt="Card image cap">
        <div class="card-body text-center d-flex flex-column justify-content-center">
            <h5 class="card-title"><?=$product["name"] ?></h5>
            <h5 class="card-title"><?=$product["price"] ?></h5>
            <a href="./fitxa.php?id=<?=$product["id"] ?>" class="btn btn-dark">DETALLS</a>
        </div>
    </div>
<? endforeach?>


</div>
</body>

</html>