<?php 
    include '../conexion/confing.php';
?>
<!DOCTYPE html>
<html lang="en">
</body>
</html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H BarberShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="../css/registrarse.css" rel="stylesheet">
    <link href="../img/logo.png" rel="icon">
    <link href="../css/menu_admin.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center letra">
    <div class="bg-black p-5 rounded-5 mt-1">
        <form action="../muestras/insertar_muestras_php.php" method="POST" enctype="multipart/form-data">
        <div class="logo-centrado">
            <img src="../img/logo.png" alt="" class="logo">
        </div>
        <div class="text-center">
            <h3 class="fw-bold mt-4">Agregar Muestra de Trabajo</h3>
        </div>
        <div class="row">
                            <?php  
                            $query = "SELECT * FROM tbl_usuario WHERE estado = '$estado' and id_rol = '2'";
                            $result = $mysqli->query($query);
                            ?>
                            
            <div class="col">
                <div class="input-group mt-5">
                    <div class="input-group-text w-100">
                        <i class="bi bi-scissors"></i>
                        <input class="form-control fw-bold" type="text" placeholder="Nombre Muestra" name="nombre_muestra" id="nombre_muestra" required>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group mt-5">
                    <div class="input-group-text w-100">
                        <i class="bi bi-currency-dollar"></i>
                        <select class="form-select" name="id_usuario" id="id_usuario"  aria-label="Default select example">
                            <option>Selecione un Barbero</option>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row["id"]?>"> <?php echo $row["nombre_usuario"]; ?></option>
                                <?php      
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group mt-5">
                    <div class="input-group-text w-100">
                        <i class="bi bi-scissors"></i>
                        <input class="form-control fw-bold" type="text" placeholder="Descripcion" name="descripcion" id="descripcion" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-text w-100">
                        <i class="bi bi-clock-fill iconos"></i>
                        <input class="form-control fw-bold" type="file" placeholder="foto" name="foto" id="foto" required>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="d-flex justify-content-center gap-3 mt-2">
            <!-- <button type="button" class="btn btn-outline-light mt-4 fw-bold">Iniciar sesión</button> -->
            <!-- <button type="button" class="btn btn-outline-light mt-4 fw-bold">Volver al inicio</button> -->
            <button id="muestras" type="submit" name="muestras" class="btn btn-primary btn-outline-light mt-4 fw-bold">Agregar Muestra</button>
            <a href="../admin/menu_admin.php" class="btn btn-outline-light mt-4 fw-bold">Volver al menú</a>
        </div>
    </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>