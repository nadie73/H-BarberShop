<?php
include '../conexion/confing.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre_muestra = $_POST['nombre_muestra'];
    $id_usuario = $_POST['barbero'];
    
    $foto = $_FILES['foto']['name'] ? $_FILES['foto']['name'] : null;
    if ($foto) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    }

    $stmt =  $mysqli->prepare("UPDATE muestras_trabajo SET nombre_muestra=?, id_usuario=?, foto=IFNULL(?, foto) WHERE id=?");
    if ($stmt) {
        $stmt->bind_param("sisi", $nombre_muestra, $id_usuario, $foto, $id);
        if ($stmt->execute()) {
            echo 'Muestra actualizada correctamente';
            header("Location: ../admin/menu_admin.php");
            exit();
        } else {
            echo 'Error al actualizar la muestra: ' . $stmt->error;
        }
    } else {
        echo "Error al preparar la consulta: " . $mysqli->error;
    }
}
$mysqli->close();
?>