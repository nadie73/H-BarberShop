<?php
$usuario = "root";
$password = "";
$servidor = "localhost";
$db = "proyecto";

$conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de la base de datos");
$db = mysqli_select_db($conexion, $db) or die("No se ha podido conectar a la base de datos");

$filtroNombre = isset($_GET['buscar']) ? mysqli_real_escape_string($conexion, $_GET['buscar']) : "";

$consultaactivo = "SELECT * FROM tbl_barbero WHERE estado = 1";
if (!empty($filtroNombre)) {
    $consultaactivo .= " AND nombre_barbero LIKE '%$filtroNombre%'";
}
$resultadoactivo = mysqli_query($conexion, $consultaactivo) or die("Error al consultar");

$consultainactivo = "SELECT * FROM tbl_barbero WHERE estado = 0";
if (!empty($filtroNombre)) {
    $consultainactivo .= " AND nombre_barbero LIKE '%$filtroNombre%'";
}
$resultadoinactivo = mysqli_query($conexion, $consultainactivo) or die("Error al consultar");

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">';
echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">';
echo '<link href="css/listado_barberos.css" rel="stylesheet">';
echo '<link href="img/logo.png" rel="icon">';
echo '<div class="container py-5 letra">';
echo "<form method='get' action='" . $_SERVER['PHP_SELF'] . "'>";
echo "  <input type='text' name='buscar' placeholder='Buscar por nombre'>";
echo "  <input type='submit' value='Buscar'>";
// echo '<button type="button" class="btn btn-dark fw-bold volver">Volver al menu</button>';
echo '<a href="menu_admin.php" class="btn btn-dark fw-bold volver">Volver al menú</a>';
echo "</form>";
echo '<h2 class="text-center fw-bold mt-5 activos"> Listado de barberos activos </h2>';
echo '<div class="table-responsive">';
echo '<table class="table table-dark table-bordered mt-5 tabla-activos" style = "background-color: black !important;">';
echo '<thead>';
echo '<tr>';
echo '<th> ID </th>';
echo '<th> Nombre </th>';
echo '<th> Celular </th>';
echo '<th> Fecha ingreso </th>';
echo '<th> Fecha modificacón </th>';
echo '<th> Horario atención </th>';
echo '<th> Acción </th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($datos = mysqli_fetch_array($resultadoactivo)) {
    echo '<tr>';
    echo "<td>" . $datos['id_barbero'] . "</td> 
    <td>" . $datos['nombre_barbero'] . "</td>
    <td>" . $datos['celular'] . "</td>
    <td>" . $datos['fecha_ingreso'] . "</td> 
    <td>" . $datos['fecha_modificacion'] . "</td> 
    <td>" . $datos['horario_atencion'] . "</td> 
    <td> <a href='estado_inactivo_barbero.php?id=" . $datos['id_barbero'] . "'>Desactivar</a> </td>";
    echo "</tr>";
}
echo '</tbody>';
echo '</table>';
echo '</div>';

echo '<h2 class="text-center fw-bold mt-5 activos"> Listado de barberos activos </h2>';
echo '<div class="table-resposive">';
echo '<table class="table table-dark table-bordered mt-5">';
echo '<thead>';
echo '<tr>';
echo '<th> ID </th>';
echo '<th> Nombre </th>';
echo '<th> Celular </th>';
echo '<th> Fecha ingreso </th>';
echo '<th> Fecha modificacón </th>';
echo '<th> Horario atención </th>';
echo '<th> Acción </th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($datos = mysqli_fetch_array($resultadoinactivo)) {
    echo '<tr>';
    echo "<td>" . $datos['id_barbero'] . "</td> 
    <td>" . $datos['nombre_barbero'] . "</td>
    <td>" . $datos['celular'] . "</td>
    <td>" . $datos['fecha_ingreso'] . "</td> 
    <td>" . $datos['fecha_modificacion'] . "</td> 
    <td>" . $datos['horario_atencion'] . "</td> 
    <td> <a href='estado_activo_barbero.php?id=" . $datos['id_barbero'] . "'>Desactivar</a> </td>";
    echo "</tr>";
}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"</script>';
mysqli_close($conexion);
?>