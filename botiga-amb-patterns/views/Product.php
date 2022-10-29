<?php
require_once './layouts/Header.php'; 
require_once '../validation/RegisterProduct.php';

$id = $_GET["id"];
$variable = new RegisterProduct();
$data = $variable->getProduct($id);
?>

<body>
<?if(!(empty($data))):?>
    <?foreach($data as $details):?>
            <div class="d-flex flex-row  align-items-center justify-content-center">
                <img class="" style="max-width: 40% ;" src="./images/<?= $details['id'] ?>.jpg" alt="producte">
                <div class="text-center w-50">
                    <p class="fs-1"><?= $details['name'] ?></p>
                    <p class="fs-4 "><?= $details['description'] ?></p>
                    <a href="./ShoppingCart.php" class="btn btn-dark w-25">AFEGEIX AL CARRETO</a>
                </div>
            </div>
        <? endforeach ?>
    <? else : ?>
        <h1 class="text-center">PRODUCTE NO TROBAT</h1>
        <a class="text-center" href="./llista.php">TORNA A LA PAGINA INICIAL</a>
    <? endif ?>
</body>
</html>