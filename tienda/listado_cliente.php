<?php
include '../conexion/confing.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>H BarberShop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link href="../img/logo.png" rel="icon">
  <link rel="stylesheet" href="../css/tienda.css">
  <link rel="stylesheet" href="../js/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src=""></script>
</head>

<body>
  <div class="container">
    <h3 id="tienda">Tienda</h3>
    <div class="row">

      <?php
      //sentencia de base de datos
      $tienda = "SELECT * FROM tbl_producto WHERE estado = '1'";
      $accion = $mysqli->query($tienda);
      while ($row = $accion->fetch_assoc()) {
      ?>

        <div class="col">
          <div class="card" style="width: 18rem;">
            <img src="../img/<?php echo $row["imagen"] ?>" class="card-img-top" width="100" height="300">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["nombre_producto"] ?></h5>
              <p class="card-text"><?php echo $row["precio_producto"] ?></p>
              <a href="#" class="btn btn-primary">Añadir al carrito</a>
              <button type="button" class="btn btn-success openBtn" data-bs-toggle="modal" data-target="#miModal" method="GET">Detalles</button>
            </div>
          </div>
        </div>
      <?php   
      }
      'include ../tienda/modal_cliente.php';
      ?>
  </div>

  <script>

// $('.openBtn').on('click',function(){
//     $('.modal-body').load('tienda_modal.php?id_producto=2',function(){
//         $('#miModal').modal({show:true});
//     });
// });
</script>