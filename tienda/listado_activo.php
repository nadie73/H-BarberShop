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
    <h3 id="tienda">Tienda Activos</h3>
    <div class="row">

      <?php
      $tienda = "SELECT * FROM tbl_producto WHERE estado = '1'";
      $accion = $mysqli->query($tienda);
      while ($row = $accion->fetch_assoc()) {
      ?>

        <div class="col">
          <div class="card" style="width: 18rem;">
            <img src="../img/<?php echo $row["imagen"] ?>" class="card-img-top" width="100" height="300">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["nombre_producto"] ?></h5>
              <p class="card-text">Precio <?php echo $row["precio_producto"] ?></p>
              <p class="card-text">Cantidad de producto <?php echo $row["stock"] ?></p>
              <form action="../tienda/cambiar_estado.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" class="btn btn-primary">Cambiar Estado</button>
              </form>
              <button type="button" class="btn btn-success openBtn" data-bs-toggle="modal" data-bs-target="#TModal" data-id="<?php echo $row['id']; ?>" data-nombre="<?php echo $row['nombre_producto']; ?>" data-descripcion="<?php echo $row['descripcion']; ?>" data-precio="<?php echo $row['precio_producto']; ?>" data-stock="<?php echo $row['stock']; ?>" data-imagen="<?php echo $row['imagen']; ?>">
                Editar
              </button>
            </div>
          </div>
        </div>

      <?php
      }
      ?>

      <!-- Modal fuera del bucle -->
      <div class="modal fade" id="TModal" tabindex="-1" aria-labelledby="TModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="editarForm" method="POST" action="../muestras/editar_muestras.php" enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <div class="mb-3">
                  <label for="nombre_producto" class="form-label">Nombre Producto</label>
                  <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
                </div>
                <div class="mb-3">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>
                <div class="mb-3">
                  <label for="imagen" class="form-label">Imagen</label>
                  <input type="file" class="form-control" id="imagen" name="imagen">
                </div>
                <div class="mb-3">
                  <label for="precio_producto" class="form-label">Precio</label>
                  <input type="text" class="form-control" id="precio_producto" name="precio_producto" required>
                </div>
                <div class="mb-3">
                  <label for="stock" class="form-label">Stock</label>
                  <input type="text" class="form-control" id="stock" name="stock" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var exampleModal = document.getElementById('TModal');
      exampleModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget; // Botón que activó el modal
        var id = button.getAttribute('data-id');
        var nombre = button.getAttribute('data-nombre');
        var descripcion = button.getAttribute('data-descripcion');
        var precio = button.getAttribute('data-precio');
        var stock = button.getAttribute('data-stock');

        // Actualiza los valores del formulario en el modal
        var inputId = exampleModal.querySelector('#id');
        var inputNombre = exampleModal.querySelector('#nombre_producto');
        var inputDescripcion = exampleModal.querySelector('#descripcion');
        var inputPrecio = exampleModal.querySelector('#precio_producto');
        var inputStock = exampleModal.querySelector('#stock');

        inputId.value = id;
        inputNombre.value = nombre;
        inputDescripcion.value = descripcion;
        inputPrecio.value = precio;
        inputStock.value = stock;
      });
    });
  </script>