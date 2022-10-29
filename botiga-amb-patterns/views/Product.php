
<?php
require_once './connexio.php';
include './capsalera.php';

$conn = Connexio::connect();
$sql = "SELECT * FROM camisetes WHERE id = " . $_GET['id'];

$result = $conn->query($sql);
?>

<body>

    <? if ($result->num_rows > 0): ?>
        <? while ($row = $result->fetch_assoc()) : ?>
            <div class="d-flex flex-row  align-items-center justify-content-center">
                <img class="" style="max-width: 40% ;" src="./images/<?= $row['id'] ?>.jpg" alt="producte">
                <div class="text-center w-50">
                    <p class="fs-1"><?= $row['nom'] ?></p>
                    <p class="fs-4 "><?= $row['descripcio'] ?></p>
                    <a href="./carreto.php" class="btn btn-dark w-25">AFEGEIX AL CARRETO</a>
                </div>
            </div>
        <? endwhile ?>
    <? else : ?>
        <h1 class="text-center">PRODUCTE NO TROBAT</h1>
        <a class="text-center" href="./llista.php">TORNA A LA PAGINA INICIAL</a>
    <? endif ?>
    <? $conn->close() ?>
</body>
</html>