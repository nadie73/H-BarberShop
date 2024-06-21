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
  <link href="../css/menu_admin.css" rel="stylesheet">
</head>
<body>
<div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTittle">
    <?php
    if(!empty($_GET['id_producto'])){
     $modal = "SELECT * FROM tbl_producto WHERE id_producto = {$_GET['id_producto']}";
     $accion = $mysqli->query($modal);
     
     while($row = $accion->fetch_assoc()){
    ?>

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-tittle" id="modalTittle"><?php echo $row["nombre_producto"]?></h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="close"></button>
          </div>
          <div class="modal-body">
            <p>
              <?php echo $row["descripcion_producto"]?>
            </p>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Inactivar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Editar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Agregar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrrar</button>
          </div>
        </div>
      </div>
    
<?php 
     }
    }else{
      echo 'Content not found....';
  }
  
?>
</div>
