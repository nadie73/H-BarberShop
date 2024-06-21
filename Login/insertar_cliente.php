<?php
include '../conexion/confing.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];

    $nombre_usuario = trim($_POST['nombre_usuario']);
    if ($nombre_usuario === "") {
        echo '<script>';
        echo 'alert("El campo nombre no puede estar vacío.");';
        echo 'window.location.href = "../Login/registrarse.php";';
        echo '</script>';
        exit;
    }

    $celular = trim($celular);
    if (strlen($celular) !== 10) {
        echo '<script>';
        echo 'alert("El campo celular no tiene la longitud correcta.");';
        echo 'window.location.href = "../Login/registrarse.php";';
        echo '</script>';
        exit;
    }

    // $fecha_actual = new DateTime();
    // $fecha_limite = new DateTime('-8 years');
    // $fecha_ingreso_obj = new DateTime($fecha_ingreso);
    // if ($fecha_ingreso_obj > $fecha_limite) {
    //     echo '<script>';
    //     echo 'alert("La fecha de ingreso no es coherente.");';
    //     echo 'window.location.href = "../Login/registrarse.php";';
    //     echo '</script>';
    //     exit;
    // } 

    if (!preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $contrasena)) {
        echo '<script>';
        echo 'alert("La contraseña debe contener al menos 8 caracteres, una mayúscula y un número.");';
        echo 'window.location.href = "../Login/registrarse.php";';
        echo '</script>';
    }
    else {
        // Verificar si las contraseñas coinciden
        if ($contrasena !== $confirmar_contrasena) {
            echo '<script>';
            echo 'alert("Las contraseñas no coinciden.");';
            echo 'window.location.href = "../Login/registrarse.php";';
            echo '</script>';
            exit; 
        }
    }

    $query = "SELECT * FROM tbl_usuario WHERE celular = '$celular'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0){
        echo '<script>';
        echo 'alert("El número que ingresaste ya está en uso. Por favor ingrese otro");';
        echo 'window.location.href = "../Login/registrarse.php";';
        echo '</script>';
    }
    

    else{
        $estado = 1;
        $id_rol = 1; 
        // el rol cliente es el 1
        $sql = "INSERT INTO tbl_usuario (nombre_usuario, correo, celular, fecha_ingreso, contrasena, estado, id_rol) VALUES ('$nombre_usuario', '$correo', '$celular', now(), '$contrasena', '$estado', '$id_rol')";

        if ($conexion->query($sql) === true){
            echo '<script>';
            echo 'alert("Usuario registrado con éxito");';
            echo 'window.location.href = "../Login/iniciar_sesion.php";';
            echo '</script>';
        }
        else{
            echo "Error al registrar al usuario: " . $conexion->error;
        }
    }
}
$conexion->close();
?>