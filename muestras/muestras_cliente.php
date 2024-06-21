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
  <script src=""></script>
</head>

<body>


      </div>
    </div>
  </nav>
  <div class="container">
    <h3 id="tienda">Muestras De trabajo</h3>
    <div class="row">

      <?php
      //sentencia de base de datos
      $muestra = "SELECT m.foto, m.nombre_muestra, u.nombre_usuario 
      FROM 	muestras_trabajo m
      JOIN tbl_usuario u ON m.id_usuario = u.id
      WHERE m.estado = '1' and u.id_rol = 2";

      $accion = $mysqli->query($muestra);
      while ($row = $accion->fetch_assoc()) {
      ?>

        <div class="col">
          <div class="card" style="width: 18rem;">
            <img src="../img/<?php echo $row["imagen"] ?>" class="card-img-top" width="100" height="300">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["nombre_muestra"] ?></h5>
              <p class="card-text" value="">Barbero: <?php echo $row["nombre_usuario"] ?></p>
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