
<?php
include '../conexion/confing.php';
//mirar si la imagen si se subio
if (isset($_FILES['foto'])) {
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //Permitir ciertos formatos de archivos
    $allowed_file_types = array('jpg', 'png', 'jpeg', 'gif');
    if (!in_array($image_file_type, $allowed_file_types)) {
        echo "Solo jpg, png, jeng o gif son permitidos.";
        exit;
    }
    // $mysqli = null;
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        // Datos a insertar
        $nombre_muestra = $_POST['nombre_muestra'];
        $descripcion = $_POST['descripcion'];
        // $fecha_modificacion = date('Y-m-d H:i:s');
        $id_usuario = $_POST['id_usuario'];//el id que recoge es el id que corresponde a los usuarios con el rol 2(barbero)
        $estado = 1;

        // Verifica si el id existe en la tabla de usuarios
        $stmt_check = $mysqli->prepare("SELECT id FROM tbl_usuario WHERE id = ?");
        if ($stmt_check) {
            $stmt_check->bind_param("i", $id_usuario);
            $stmt_check->execute();
            $stmt_check->store_result();
            if ($stmt_check->num_rows > 0) {
                // Inserta los datos en la base de datos
                $stmt = $mysqli->prepare("INSERT INTO muestras_trabajo (nombre_muestra, descripcion, estado, id_usuario, foto) VALUES (?, ?, ?, ?, ?)");
                if ($stmt) {
                    $stmt->bind_param("sssis", $nombre_muestra, $descripcion, $estado, $id_usuario, $target_file);
                    if ($stmt->execute()) {
                        echo 'Muestra insertada correctamente';
                        $stmt->close();
                        // Redirige después de la inserción
                        header("Location: ../muestras/insertar_muestras.php");
                        exit(); // Asegúrate de salir después de la redirección
                    } else {
                        echo 'Error al insertar la muestra: ' . $stmt->error;
                    }
                } else {
                    echo "Error al preparar la consulta: " . $mysqli->error;
                }
            } else {
                echo "Error: El ID del barbero no existe.";
            }
            $stmt_check->close();
        } else {
            echo "Error al preparar la consulta de verificación: " . $mysqli->error;
        }
    } else {
        echo "Lo siento, hubo un error al subir tu archivo.";
    }
}

$mysqli->close();
?>

$mysqli = null;


