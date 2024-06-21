<?php
include '../conexion/confing.php';
//mirar si la imagen si se subio

if (isset($_FILES['imagen'])) {
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //Permitir ciertos formatos de archivos
    $allowed_file_types = array('jpg', 'png', 'jpeg', 'gif');
    if (!in_array($image_file_type, $allowed_file_types)) {
        echo "Solo jpg, png, jeng o gif son permitidos.";
        exit;
    }
    //insertar datos
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        $nombre_producto = $_POST['nombre_producto'];
        $descripcion_producto = $_POST['descripcion_producto'];
        $costo_producto = $_POST['costo_producto'];
        $precio_producto = $_POST['precio_producto'];
        $stock = $_POST['stock'];
        $stock_maximo = $_POST['stock_maximo'];
        $stock_minimo = $_POST['stock_minimo'];
        $fecha_modificacion = date('Y-m-d H:i:s');
        $estado = 1;
        // $image = $target_file;

        $stmt = $mysqli->prepare("INSERT INTO tbl_producto(nombre_producto, descripcion_producto, costo_producto, precio_producto, stock, stock_maximo, stock_minimo, fecha_modificacion, estado, imagen)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // $stmt->execute();
        if ($stmt) {
            $stmt->bind_param("ssddiiisss", $nombre_producto, $descripcion_producto, $costo_producto, $precio_producto, $stock, $stock_maximo, $stock_minimo, $fecha_modificacion, $estado, $target_file);
            if ($stmt->execute()) {
                echo 'Producto insertado correctamente';
            } else {
                echo 'Error al insertar el producto: ' . $stmt->error;
            }
            // header('Content-Type:'.$image_file_type);
            // readfile($target_file);
            $stmt->close();
            header("location: .$tienda/tienda_insertar.php");
        } else {
            echo "Error al preparar la consulta: " . $mysqli->error;
        }
    }
}

$mysqli = null;
