<?php
include '../conexion/confing.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre_muestra = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $fecha_modificacion = date('Y-m-d H:i:s');
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];
    
    $imagen = $_FILES['imagen']['name'] ? $_FILES['imagen']['name'] : null;
    if ($imagen) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($imagen);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
    }

    $stmt =  $mysqli->prepare("UPDATE tbl_producto SET nombre_producto=?, descripcion=?, fecha_modificacion=?, imagen=IFNULL(?, imagen), precio_prodcuto = ?, stock = ? WHERE id=?");
    if ($stmt) {
        $stmt->bind_param("ssssiii", $producto, $descripcion, $fecha_modificacion, $imagen, $id, $precio, $stock);
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