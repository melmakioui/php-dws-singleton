<? include './capsalera.php' ?>

<body>

  <div id="hidden" class="mb-5"></div>

  <form class="w-25 m-auto d-flex flex-column justify-content-center align-items-center" action="../index.php" method="POST" enctype="multipart/form-data">

    <h3>AFEGIR PRODUCTE</h3>

    <div class="form-group mb-3 w-100">
      <label for="producte">Nom del producte</label>
      <input type="text" name="producte" class="form-control" id="producte">
    </div>

    <div class="form-group mb-3 w-100">
      <label for="descripcio">Descripció</label>
      <textarea type="password" name="descripcio" class="form-control" id="descripcio"></textarea>
    </div>

    <div class="form-group mb-3 w-100">
      <label for="arxiu">Arxiu</label>
      <input type="file" name="arxiu" class="form-control" id="arxiu">
    </div>

    <div class="form-group mb-3 w-100">
      <label for="preu">Preu</label>
      <input type="text" name="preu" class="form-control" id="preu">
    </div>

    <button type="submit" class="btn btn-dark w-25 ">PUJA</button>
  </form>
</body>

</html>