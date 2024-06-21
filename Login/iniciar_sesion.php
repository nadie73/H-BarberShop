<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H BarberShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/iniciar_sesion.css" rel="stylesheet">
    <link href="img/logo.png" rel="icon">

    <style>
    @media only screen and (min-width:300px) and (max-width: 599px) {
        .btn-responsive {
            font-size: 14px;
        }

        .btn-responsive.btn {
            padding: 0.375rem 0.75rem;
        }
    }

    @media only screen and (min-width:600px) and (max-width: 1200px) {
        .btn-responsive {
            font-size: 14px;
        }

        .btn-responsive.btn {
            padding: 0.375rem 0.75rem;
        }
    }

    @media only screen and (min-width:600px) and (max-width: 1200px) {
        .btn-responsive {
            font-size: 14px;
        }

        .btn-responsive.btn {
            padding: 0.375rem 0.75rem;
        }
    }
</style>
</head>

<body class="letra">
    <div class="container">
        <form action="../Login/validar.php" method="post">
            <div class="bg-black p-5 rounded-5 mt-4 DivLogin">
                <div class="d-flex justify-content-center" style="text-align:center">
                    <img src="img/logo.png" alt="" class="logo">
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="text-center">
                            <h3 class="fw-bold mt-4">Inicio de sesión</h3>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="input-group mt-5">
                            <div class="input-group-text w-100">
                                <i class="bi bi-phone-fill"></i>
                                <input class="form-control fw-bold" type="number" placeholder="Celular" name="celular" id="celular" required="">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="input-group mt-4">
                            <div class="input-group-text w-100">
                                <i class="bi bi-lock-fill"></i>
                                <input class="form-control fw-bold" type="password" placeholder="Contraseña" name="contrasena" id="contrasena" required="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="olvido_contrasena.php">¿Olvidaste la contraseña?</a>
                    </div>
                    <div class="d-flex justify-content-center gap-3 mt-2">
                        <input type="submit" name="iniciar" id="iniciar" class="btn btn-outline-light mt-4 fw-bold btn-responsive" value="Iniciar sesión">
                        <button type="button" onclick="window.location.href='../Login/iniciar_sesion.php'" class="btn btn-outline-light mt-4 fw-bold btn-responsive">Ir al inicio</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>