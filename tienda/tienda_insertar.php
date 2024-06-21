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
        <form action="../tienda/insertar_t.php" method="POST" enctype="multipart/form-data">
        <div class="logo-centrado">
            <img src="../img/logo.png" alt="" class="logo">
        </div>
        <div class="text-center">
            <h3 class="fw-bold mt-4">Agregar producto</h3>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mt-5">
                    <div class="input-group-text w-100">
                        <i class="bi bi-scissors"></i>
                        <input class="form-control fw-bold" type="text" placeholder="Nombre Producto" name="nombre_producto" id="nombre_producto" required>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group mt-5">
                    <div class="input-group-text w-100">
                        <i class="bi bi-currency-dollar"></i>
                        <input class="form-control fw-bold" type="text" placeholder="Descripcion Producto" name="descripcion_producto" id="descripcion_producto" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="input-group mt 5">
                    <div class="input-group-text w-100">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <input class="form-control fw-bold" type="number" placeholder="Costos Producto " name="costo_producto" id="costo_producto" required>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-text w-100">
                        <i class="bi bi-clock-fill iconos"></i>
                        <input class="form-control fw-bold" type="number" placeholder="Precio producto" name="precio_producto" id="precio_producto" required> 
                    </div>
                </div>
            </div>
        </div>
            <div class="row mt-4">
            <div class="col">
                <div class="input-group mt 5">
                    <div class="input-group-text w-100">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <input class="form-control fw-bold" type="number" placeholder="stock" name="stock" id="stock" required>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-text w-100">
                        <i class="bi bi-clock-fill iconos"></i>
                        <input class="form-control fw-bold" type="number" placeholder="stock maximo" name="stock_maximo" id="stock_maximo" required>
                    </div>
                </div>
            </div>
                <div class="col">
                <div class="input-group mt 5">
                    <div class="input-group-text w-100">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <input class="form-control fw-bold" type="number" placeholder="stock minimo " name="stock_minimo" id="stock_minimo" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-text w-100">
                        <i class="bi bi-clock-fill iconos"></i>
                        <input class="form-control fw-bold" type="file" placeholder="imagen" name="imagen" id="imagen" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-3 mt-2">
            <!-- <button type="button" class="btn btn-outline-light mt-4 fw-bold">Iniciar sesión</button> -->
            <!-- <button type="button" class="btn btn-outline-light mt-4 fw-bold">Volver al inicio</button> -->
            <button type="submit" class="btn btn-primary btn-outline-light mt-4 fw-bold">Agregar producto</button>
            <a href="../admin/menu_admin.php" class="btn btn-outline-light mt-4 fw-bold">Volver al menú</a>
        </div>
    </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
   
    </script>
</body>
</html>