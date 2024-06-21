<?php
include '../conexion/confing.php';
$usuario = $_SESSION['id'];
$rol = $_SESSION['rol'];
// Verificar si el usuario ha iniciado sesión y si tiene el rol adecuado
if (!isset($usuario) && !isset($rol)) {
    header("Location: ../Login/inicio.php"); // Redirigir a la página de inicio de sesión
    exit();
}
if(empty($rol == 2)){
    header("Location: ../Login/inicio.php"); 
    exit();
}
// if (isset($_SESSION["id"]) && isset($_SESSION["id_rol"])) {
//   $id = $_SESSION["id"];
//   $id_rol = $_SESSION["id_rol"];

//   // Comprobar si el rol del usuario es el permitido (por ejemplo, administrador)
//   if ($id_rol != 2) { 
//       // Redirigir al usuario a la página de inicio u otra página
//       header("Location: ../barbero/menu_barbero.php"); // Página a la que se redirige si no tiene acceso
//       exit();
//   }else {
//   // Si el usuario no ha iniciado sesión, redirigir al login
//   header("Location: ../Login/inicio.php"); // Redirigir a la página de inicio de sesión
//   exit();
// }
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>H BarberShop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link href="../img/logo.png" rel="icon">
  <link rel="stylesheet" href="../css/tienda.css">
  <link rel="stylesheet" href="../js/bootstrap.min.css">
  <link href="../css/menu_admin.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src=""></script>
</head>

<body>


      </div>
    </div>
  </nav>
  <div class="container">
    <h3 id="tienda">Muestras De trabajo</h3>
    <div class="row">

<?php
    $sql = "SELECT m.foto, m.nombre_muestra, u.id AS id_usuario
        FROM muestras_trabajo m
        JOIN tbl_usuario u ON m.id_usuario = u.id
        WHERE m.estado = '1' AND u.id = ?";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    // Vincular el parámetro (id del usuario)
    $stmt->bind_param("i", $id_usuario);

    // Ejecutar la consulta
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
?>
        <div class="col">
          <div class="card" style="width: 18rem;">
            <img src="../img/<?php echo htmlspecialchars($row["foto"]); ?>" class="card-img-top" width="100" height="300">
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($row["nombre_muestra"]); ?></h5>
              <p class="card-text" value="">Barbero: <?php echo htmlspecialchars($row["id_usuario"]); ?></p>
            </div>
          </div>
        </div>
<?php
    }
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $mysqli->error;
}

$mysqli->close();
?>
<?php
      'include ../tienda/modal_admin.php';
      ?>
    </div>

    <script>
      // $('.openBtn').on('click',function(){
      //     $('.modal-body').load('tienda_modal.php?id_producto=2',function(){
      //         $('#miModal').modal({show:true});
      //     });
      // });
    </script>