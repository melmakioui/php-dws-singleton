<? require_once './connexio.php'?>
<?include './capsalera.php'?>

    <?php
    $conn = Connexio::connect();
    $sql = "SELECT * FROM camisetes";
    $result = $conn->query($sql);
    ?>

    <div class="d-flex flex-wrap justify-content-evenly w-75 m-auto mt-3">
        <?php if ($result->num_rows > 0) : ?>
            <?php while ($row = $result->fetch_assoc()) : ?>

                <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 16rem; border-style:none ">
                    <img class="card-img-top " src="./images/<?= $row["id"] ?>.jpg" alt="Card image cap">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <h5 class="card-title"><?= $row["nom"] ?></h5>
                        <h5 class="card-title"><?= $row["preu"] ?></h5>
                        <a href="./fitxa.php?id=<?= $row["id"] ?>" class="btn btn-dark">DETALLS</a>
                    </div>
                </div>

            <?php endwhile ?>
    </div>
<?php else : ?>
    <h1>NO CAMISETES DISPONIBLES</h1>
<?php endif ?>

<?php $conn->close(); ?>
    </body>
</html>