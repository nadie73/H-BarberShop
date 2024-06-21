<?php
include '../conexion/confing.php';
session_start();

if (isset($_POST["iniciar"]) && !empty($_POST["celular"]) && !empty($_POST["contrasena"])) {
    $celular = $_POST["celular"];
    $contrasena = $_POST["contrasena"];

    // Definición de roles y sus respectivas rutas de redirección
    $roles = [1 => "../cliente/menu.php", 2 => "../barbero/menu_barbero.php", 3 => "../admin/menu_admin.php" ];

    // Consulta preparada
    $sql = "SELECT * FROM tbl_usuario WHERE celular = ? AND contrasena = ? AND estado = '1' AND id_rol = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Vincular los primeros dos parámetros (celular y contrasena)
        $stmt->bind_param("ssi", $celular, $contrasena, $id_rol);

        foreach ($roles as $id_rol => $redirect) {
            // Ejecutar la consulta con el rol actual
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $datos = $result->fetch_object();
                $_SESSION["id"] = $datos->id;
                $_SESSION["nombre_usuario"] = $datos->nombre_usuario;
                $_SESSION["rol"] = $id_rol; // Almacenar el rol en la sesión

                // Redirigir al usuario según su rol
                header("Location: $redirect");
                exit();
            }
        }

        // Si ninguno de los roles coincide
        echo "Error: Usuario no encontrado o credenciales incorrectas";

        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }
}

$mysqli->close();
?>

// if (!empty($_POST["btningresar"])) {
// if (!empty($_POST["celular"]) and !empty($_POST["contrasena"])) {
// $celular = $_POST["celular"];
// $contrasena = $_POST["contrasena"];
// $rol = $_P
// $sql = "SELECT * FROM tbl_usuario WHERE celular = ? AND contrasena = ? AND estado = '1' AND id_rol = ?";
// $stmt = $conexion->prepare($sql);

// if ($stmt) {
// // Bind de parámetros y ejecución de la consulta
// $stmt->bind_param("ssi", $celular, $contrasena, $id_rol);

// // Roles posibles: 1 para cliente, 2 para barbero, 3 para admin
// $roles = [1 => "../cliente/menu.php", 2 => "../barbero/menu_barbero.php", 3 => "../admin/menu_admin.php"];

// foreach ($roles as $id_rol => $redirect) {
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows == 1) {
// $datos = $result->fetch_object();
// $_SESSION["id"] = $datos->id;
// $_SESSION["nombre_usuario"] = $datos->nombre_usuario;
// header("Location: $redirect");
// exit();
// }
// }

// echo "Error: Usuario no encontrado";
// } else {
// echo "Error al preparar la consulta";
// }

// $stmt->close();
// }
// }
// $conexion->close();
// ?>
// $sql = $conexion->query("select * from tbl_usuario where celular = '$celular' and contrasena = '$contrasena' and estado = '1' and = id_rol ='1'");
// if ($datos = $sql->fetch_object()) {
// header("Location: ../cliente/menu.php");
// $_SESSION["id_usuario"] = $datos->id_usuario;
// $_SESSION["nombre_usuario"] = $datos->nombre_usuario;
// } else {
// $sql = $conexion->query("select * from tbl_usuario where celular = '$celular' and contrasena = '$contrasena' and estado = '1' and = id_rol ='2'");
// if ($datos = $sql->fetch_object()) {
// header("Location: ../barbero/menu_barbero.php");
// $_SESSION["id_usuario"] = $datos->id_usuario;
// $_SESSION["nombre_usuario"] = $datos->nombre_usuario;
// } else {
// $sql = $conexion->query("select * from tbl_usuario where celular = '$celular' and contrasena = '$contrasena' and estado = '1' and = id_rols ='3'");
// if ($datos = $sql->fetch_object()) {
// header("Location: ../admin/menu_admin.php");
// $_SESSION["id_usuario"] = $datos->id_usuario;
// $_SESSION["nombre_usuario"] = $datos->nombre_usuario;
// } else {
// echo "Error Usuario";
// }
// }
// }
// ?>
<!-- //                          ..,,:ii1,
//               .,::;;;;:::;;;;;iiii:,,,,.
//             ,;i11i;;:::::;::::,,:;;;;;ii
//          .:;iii;;;:::::;;;;;;;;;:::::::;
//        .;iii;;;::::;;;;;;;;;;;;;;;;::,,,
//       ,;;::::::;;;;ii;:::::;:::::;;::::,
//      ,::,,::;;iiii11i;;:,,,:::::::::,,,,
//     .::,,:;i111111111;;;,...,,,,,,,.,...
//     .:,::i111tttt11ii;:;:,.  ...,,. ..
//     .,,:i11tttttt11i;;,:::,.   ...
//    ..,,;111tttttt11ii;:,:;:,.   ..
//   .;,.:i111tttt11111111i;;i;,.
//    ,..,;iiiiiiii;;;;;ii11iii:,.
//    ...,,,,:;ii;:,,,,,::;;iii;,,...
//   .,..,,,,.:11i;:,,:,..,::;i;,,.,...
//   ... :iiii1Lft111ii;;;i11tt1::,,,...
//   ....;tfffCCLfffffffffLLfft1::,,,...
//  ,,...iffffLfffftfLLLLLLffft1:,,:,.....
//  :,,,,;1111ii;iii1tffffttt11i:,,:,......
//  ,;:::,;ii11iiii11iii1iiiiiii::::,......
//   ...,,.,;ii;;;;;;;:;;iiiiii;:::,,,,...
//          .:1i;;;;;iiiiiiiii;::::::,,..
//            ;tttt11111iiii;;;::::::,,.
//            .;11ttt111iiii;;;::::::::,...
//              .,::i1ii;;;::::::;;ii;:::,,
//                 .;i;;;;;;;;;;i1tfffti;;, -->