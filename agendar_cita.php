<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H BarberShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/agendar_cita.css" rel="stylesheet">
    <link href="img/logo.png" rel="icon">
</head>

<body class="d-flex justify-content-center align-items-center letra">
    <div class="bg-black p-5 rounded-5 mt-5">
        <div class="logo-centrado">
            <img src="img/logo.png" alt="" class="logo">
        </div>
        <div class="text-center">
            <h3 class="fw-bold mt-4">Agendar cita</h3>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mt-5">
                    <div class="input-group-text w-100">
                        <i class="bi bi-scissors"></i>
                        <input class="form-control fw-bold color" type="text" placeholder="Servicio">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group mt-5">
                    <div class="input-group-text w-100">
                        <i class="bi-person-circle"></i>
                        <input class="form-control fw-bold color" type="text" placeholder="Barbero">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-text w-100">
                        <i class="bi bi-calendar2-week-fill"></i>
                        <input class="form-control fw-bold" type="date" placeholder="Fecha">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-text w-100">
                        <i class="bi bi-clock-fill iconos"></i>
                        <input class="form-control fw-bold" type="time" placeholder="Hora">
                    </div>
                </div>
            </div>
        </div>



        <div class="d-flex justify-content-center gap-3 mt-2">
            <!-- <button type="button" class="btn btn-outline-light mt-4 fw-bold">Iniciar sesión</button> -->
            <!-- <button type="button" class="btn btn-outline-light mt-4 fw-bold">Volver al inicio</button> -->
            <a href="mis_citas.php" class="btn btn-outline-light mt-4 fw-bold">Agendar cita</a>
            <a href="menu.php" class="btn btn-outline-light mt-4 fw-bold">Volver al menú</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>