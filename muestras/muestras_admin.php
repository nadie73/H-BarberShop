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
            $muestra = "SELECT m.*, b.nombre_usuario 
      FROM muestras_trabajo m
      JOIN tbl_usuario b ON m.id_usuario = b.id
      WHERE m.estado = '1'";
            $accion = $mysqli->query($muestra);
            while ($row = $accion->fetch_assoc()) {
            ?>

                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="../img/<?php echo $row["foto"] ?>" class="card-img-top" width="100" height="300">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["nombre_muestra"] ?></h5>
                            <p class="card-text" value="">Barbero: <?php echo $row["nombre_usuario"] ?></p>
                            <form action="../muestras/cambiar_estado_muestras.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-primary">Cambiar Estado</button>
                            </form>
                            <button type="button" class="btn btn-success openBtn" data-bs-toggle="modal" data-bs-target="#MModal" data-id="<?php echo $row['id']; ?>" data-nombre="<?php echo $row['nombre_muestra']; ?>" data-barbero="<?php echo $row['id_usuario']; ?>" data-foto="<?php echo $row['foto']; ?>">
                                Editar
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="MModal" tabindex="-1" aria-labelledby="MModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="editarForm" method="POST" action="../muestras/editar_muestras.php" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="miModalLabel">Editar Muestra</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id">
                                    <div class="mb-3">
                                        <label for="nombre_muestra" class="form-label">Nombre Muestra</label>
                                        <input type="text" class="form-control" id="nombre_muestra" name="nombre_muestra" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_usuario" class="form-label">Barbero</label>
                                        <select class="form-select" id="barbero" name="barbero" required>
                                            <!-- Aquí llenas las opciones de barberos -->
                                            <?php
                                            $barbero_query = "SELECT * FROM tbl_usuario WHERE estado = 1 and id_rol = 2";
                                            $barbero_result = $mysqli->query($barbero_query);
                                            while ($barbero = $barbero_result->fetch_assoc()) {
                                                echo "<option value='{$barbero['id']}'>{$barbero['nombre_usuario']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto">
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
            <?php
            }
            'include ../tienda/modal_admin.php';
            ?>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var exampleModal = document.getElementById('MModal');
                exampleModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget; // Botón que activó el modal
                    var id = button.getAttribute('data-id');
                    var nombre = button.getAttribute('data-nombre');
                    var barbero = button.getAttribute('data-barbero');
                    var foto = button.getAttribute('data-foto');

                    // Actualiza los valores del formulario en el modal
                    var modalTitle = exampleModal.querySelector('.modal-title');
                    var inputId = exampleModal.querySelector('#id');
                    var inputNombre = exampleModal.querySelector('#nombre_muestra');
                    var selectBarbero = exampleModal.querySelector('#id_usuario');

                    modalTitle.textContent = 'Editar Muestra: ' + nombre;
                    inputId.value = id;
                    inputNombre.value = nombre;
                    selectBarbero.value = barbero;
                });
            });
            //             function cambiarEstadoMuestras(id) {
            //     $.ajax({
            //         url: 'cambiar_estado_muestras_ajax.php',
            //         type: 'POST',
            //         data: { id: id },
            //         success: function(response) {
            //             alert('Estado cambiado correctamente');
            //             // Aquí podrías actualizar la interfaz de usuario si lo necesitas
            //             // Por ejemplo, cambiar el texto del botón o actualizar una lista de elementos
            //         },
            //         error: function(xhr, status, error) {
            //             alert('Error al cambiar el estado: ' + xhr.responseText);
            //         }
            //     });
            // }
        </script>