<?php
include '../conexion/confing.php';
session_start();
$usuario = $_SESSION['id'];
$rol = $_SESSION['rol'];
// Verificar si el usuario ha iniciado sesión y si tiene el rol adecuado
if (!isset($usuario) && !isset($rol)) {
    header("Location: ../Login/inicio.php"); // Redirigir a la página de inicio de sesión
    exit();
}
if(empty($rol == 1)){
    header("Location: ../Login/inicio.php"); 
    exit();
}
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
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../js/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="letra">
    <nav class="navbar navbar-expand-md" id="nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <img src="../img/logo.png" alt="H BarberShop" width="95px">
            </a>

            <button id="menu_responsive" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>



            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav me-auto d-flex justify-content-between">
                    <li class="nav-item flex-grow-1 text-center">
                        <a class="nav-link  titulosmenu" href="#" style="color:white !important">Inicio</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center">
                        <a class="nav-link titulosmenu" style="color:white !important" href="#">Servicios</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center">
                        <a class="nav-link titulosmenu" style="color:white !important" href="#">Muestras de trabajo</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center">
                        <a class="nav-link titulosmenu" href="#Tienda" style="color:white !important">Tienda</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center">
                        <a class="nav-link titulosmenu" href="#" style="color:white !important">Mis citas</a>
                    </li>
                    <?php if (isset($_SESSION["nombre_usuario"])): ?>
                    <li class="nav-item flex-grow-1 text-center">
                        <a href="" class="nav-link titulosmenu" style="color:white !important"> <?php echo htmlspecialchars($_SESSION["nombre_usuario"]);?></a>
                    </li>
                    <?php endif; ?>
                <a class="item" href="../Login/cerrar_sesion.php" id="titulosmenu">cerrar session</a>
                </ul>
                </ul>
                <span class="navbar-brand" href="../">
                    <img src="../img/icons8-shopping-cart.gif">
                </span>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3 id="servicios">Servicios</h3>

        <?php
        // $usuario = "root";
        // $password = "";
        // $servidor = "localhost";
        // $db = "proyecto";

        // $mysqli = new mysqli( $servidor, $usuario, $password,  $db);
        // $estado = 1;
        $query = "SELECT * FROM tbl_servicio WHERE estado = '$estado'";
        $result = $mysqli->query($query);

        $counter = 0; // contador para controlar las tarjetas impresas

        while ($row = $result->fetch_assoc()) {
            if ($counter % 3 == 0) {
                if ($counter != 0) {
                    echo '</div>'; // Cerrar el grupo actual solo si no es la primera iteración
                }
                echo '<div class="card-group">'; // Abrir un nuevo grupo de tarjetas
            }

            echo '<div class="card" id="bordecarta">
                        <div class="card-body text-center">
                            <h5 class="card-title texto">' . $row["nombre_servicio"] . '</h5>
                            <p class="card-text texto">' . number_format($row["costo_servicio"], 0, ",", ".") . ' COP </p>
                            <a href="agendar_cita.php" class="btn btn-dark agendar">Agendar cita</a>
                            
                        </div>
                    </div>';

            $counter++; // Incrementar el contador
        }

        echo '</div>'; // Cerrar el último grupo de tarjetas
        ?>
        <?php
        include '../muestras/muestras_cliente.php';
        ?>
        <br>
        <br>
        <?php
        include '../tienda/listado_cliente.php';
        ?>
    </div>

        <?php
        include '../conexion/footer.php';
        ?>