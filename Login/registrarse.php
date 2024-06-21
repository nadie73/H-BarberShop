<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H BarberShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/registrarse.css" rel="stylesheet">
    <link href="img/logo.png" rel="icon">
</head>
<body class="letra">
    <div class="container">
        <form action="../Login/insertar_cliente.php" method="post">
            <div class="bg-black p-5 rounded-5 mt-3 DivRegis">
                <div class="d-flex justify-content-center">
                    <img src="img/logo.png" alt="" class="logo">
                </div>
                <div class="text-center">
                    <h3 class="fw-bold mt-4">Regístrate</h3>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="input-group mt-5">
                            <div class="input-group-text w-100">
                                <i class="bi bi-person-circle"></i>
                                <input class="form-control fw-bold" type="text" placeholder="Nombre" name="nombre_usuario" id="nombre_usuario" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="input-group campo-correo">
                            <div class="input-group-text w-100">
                                <i class="bi bi-envelope-at-fill"></i>
                                <input class="form-control fw-bold correo" type="email" placeholder="Correo Electrónico" name="correo" id="correo" required="">
                            </div>
                        </div>
                    </div>
                
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="input-group mt-3">
                            <div class="input-group-text w-100">
                                <i class="bi bi-phone-fill"></i>
                                <input class="form-control fw-bold" type="number" placeholder="Celular" name="celular" id="celular" required="">
                            </div>
                        </div>
                    </div>
<!--                     
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="input-group mt-3">
                            <div class="input-group-text w-100">
                                <i class="bi bi-calendar2-week-fill"></i>
                                <input class="form-control fw-bold" type="date" placeholder="Fecha de Nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" required="">
                            </div>
                        </div>
                    </div> -->
                
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="input-group mt-3">
                            <div class="input-group-text w-100">
                                <i class="bi bi-lock-fill"></i>
                                <input class="form-control fw-bold" type="password" placeholder="Contraseña" name="contrasena" id="contrasena" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="input-group mt-3">
                            <div class="input-group-text w-100">
                                <i class="bi bi-lock-fill"></i>
                                <input class="form-control fw-bold" type="password" placeholder="Confirmar Contraseña" name="confirmar_contrasena" id="confirmar_contrasena" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-2">
                    <input type="submit" name="registrarse" id="registrase" class="btn btn-outline-light mt-4 fw-bold" value="Registrarse">
                    <a href="inicio.php" class="btn btn-outline-light mt-4 fw-bold">Ir al inicio</a>
                </div>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">


    </script>

</body>
</html>
