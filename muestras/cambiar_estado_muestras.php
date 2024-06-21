<?php
include '../conexion/confing.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Obtener el estado actual
    $query = "SELECT estado FROM muestas_trabajo WHERE id=?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($estado_actual);
    $stmt->fetch();
    $stmt->close();

    // Cambiar el estado: si es 1, cambiar a 0; si es 0, cambiar a 1
    $nuevo_estado = ($estado_actual == 1) ? 0 : 1;

    // Actualizar el estado en la base de datos
    $query = "UPDATE muestras_trabajo SET estado=? WHERE id=?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("ii", $nuevo_estado, $id);
        if ($stmt->execute()) {
            echo 'Estado cambiado correctamente';
            header("Location: ../admin/menu_admin.php");
            exit();
        } else {
            echo 'Error al cambiar el estado: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $mysqli->error;
    }
}

$mysqli->close();
?>