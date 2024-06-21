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
  <link href="../css/menu_admin.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
  <nav class="navbar navbar-expand-md" id="nav">
    <div class="container-fluid">
      <a class="navbar-brand" href="">
        <img src="../img/logo.png" alt="H BarberShop" width="95px">
      </a>

      <button id="menu_responsive" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>



      <div class="collapse navbar-collapse" id="menu">

        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active titulosmenu" href="../admin/menu_admin.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link titulosmenu" href="">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link titulosmenu" href="">Muestras de trabajo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link titulosmenu" href="">Tienda virtual</a>
          </li>
          <li class="nav-item">
            <a class="nav-link titulosmenu" href="listado_clientes.php">L. Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link titulosmenu" href="listado_barberos.php">L. Barberos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link titulosmenu" href="">L. Citas</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle titulosmenu" role="button" data-bs-toggle="dropdown" href="#">Productos</a>
            <ul class="dropdown-menu">
              <li><a href="../tienda/tienda_insertar.php" class="dropdown-item titulosmenu">Insertar</a></li>
              <li><a href="../tienda/listado_editar.php" class="dropdown-item titulosmenu">Listado activos</a></li>
              <li><a href="../tienda/listado_inactivo.php" class="dropdown-item titulosmenu">listado inactivos</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <h3 id="tienda">Tienda inactivos</h3>
    <br>
    <div class="row">

      <?php
      //sentencia de base de datos
      $tienda = "SELECT * FROM tbl_producto WHERE estado = '0'";
      $accion = $mysqli->query($tienda);
      while ($row = $accion->fetch_assoc()) {
      ?>

        <div class="col">
          <div class="card" style="width: 18rem;">
            <img src="../img/<?php echo $row["image"] ?>" class="card-img-top" width="100" height="300">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["nombre_producto"] ?></h5>
              <p class="card-text"><?php echo $row["precio_producto"] ?></p>
              <a href="#" class="btn btn-primary">cambiar estado</a>
              <button type="button" class="btn btn-success openBtn" data-bs-toggle="modal" data-target="#miModal" method="GET">Detalles</button>
            </div>
          </div>
        </div>


      <?php
      }
      'include ../tienda/modal_admin.php';
      ?>
    </div>

    <script>
      // $('.openBtn').on('click',function(){
      //     $('.modal-body').load('tienda_modal.php?id_producto=2',function(){
      //         $('#miModal').modal({show:true});
      //     });
      // });
    </script>