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
if(empty($rol == 3)){
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
    <link href="../css/menu_admin.css" rel="stylesheet">
    <link href="../img/logo.png" rel="icon">
</head>

<body>
    <nav class="navbar navbar-expand-md" id="nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <img src="../img/logo.png" alt="H BarberShop" width="95px">
            </a>

            <button id="menu_responsive" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>



            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active titulosmenu" href="../admin/menu_admin.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link titulosmenu" href="">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link titulosmenu" href="">Muestras de trabajo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link titulosmenu" href="">Tienda virtual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link titulosmenu" href="listado_clientes.php">L. Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link titulosmenu" href="listado_barberos.php">L. Barberos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link titulosmenu" href="">L. Citas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle titulosmenu" role="button" data-bs-toggle="dropdown" href="">Productos</a>
                        <ul class="dropdown-menu">
                            <li><a href="../tienda/tienda_insertar.php" class="dropdown-item titulosmenu">Insertar</a></li>
                            <li><a href="../tienda/listado_editar.php" class="dropdown-item titulosmenu">Listado activos</a></li>
                            <li><a href="../tienda/listado_inactivo.php" class="dropdown-item titulosmenu">listado inactivos</a></li>
                        </ul>
                    </li>
                    <?php if (isset($_SESSION["nombre_usuario"])): ?>
                    <li class="nav-item flex-grow-1 text-center">
                        <a href="" class="nav-link titulosmenu" style="color:white !important"> <?php echo htmlspecialchars($_SESSION["nombre_usuario"]);?></a>
                    </li>
                    <?php endif; ?>
                <a class="item" href="../Login/cerrar_sesion.php" id="titulosmenu">cerrar session</a>
                </ul>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container">
        <h3 id="servicios">Servicios</h3>

        <?php
        $usuario = "root";
        $password = "";
        $servidor = "localhost";
        $db = "proyecto";

        $mysqli = new mysqli($servidor, $usuario, $password,  $db);
        $estado = 1;
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
                            <a href="#" class="btn btn-dark editar" id="agendar">Editar servicio</a>
                        </div>
                    </div>';

            $counter++; // Incrementar el contador
        }

        echo '</div>'; // Cerrar el último grupo de tarjetas
        echo '<div class="card" id="bordecarta">
                <div class="card-body text-center">
                    <a href="insertar_servicio.php"><img src="../img/plus.png" heigth="100px" width="100px"></a>
                </div>
            </div>';
        ?>
                <?php 
        include '../muestras/muestras_admin.php';
        echo '<div class="card" id="bordecarta">
                <div class="card-body text-center">
                    <a href="../muestras/insertar_muestras.php"><img src="../img/plus.png" heigth="100px" width="100px"></a>
                </div>
            </div>';
        ?>
        ?>
        <br>
        <br>
        <?php 
        include '../tienda/listado_activo.php';
        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php
include '../conexion/footer.php';
?>
</html>