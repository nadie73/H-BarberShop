<?php
include '../conexion/confing.php';

if (isset($_POST['celular']) && isset($_POST['contrasena'])) {
    $celular = $_POST['celular'];
    $contrasena = $_POST['contrasena'];

    // Evitar inyección SQL utilizando consultas preparadas
    $consulta = "SELECT * FROM tbl_usuario WHERE celular = ? AND contrasena = ?";
    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($stmt, 'ss', $celular, $contrasena);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($fila = mysqli_fetch_array($result)) {
        header("location: menu_cliente.php");
        exit;
    } else{
        echo '<script>';
        echo 'alert("Nombre de usuario o contraseña incorrectos. Inténtelo de nuevo.");';
        echo 'window.location.href = "iniciar_sesion.php";';
        echo '</script>';
    }
}

mysqli_close($conexion);
?>