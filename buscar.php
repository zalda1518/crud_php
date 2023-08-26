<?php include('db.php'); ?>
<?php require('includes/header.php'); ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Buscar</title>
</head>

<body>

  <?php

  if (isset($_POST['btn-menu-buscar'])) {
    $valorId = $_POST['valor-buscar'];

    if (empty($_POST['valor-buscar'])) {
      $_SESSION['false'] = 'no has escrito la tarea';
      header('location:index.php');
    }

    $query = "SELECT * FROM registros WHERE  id = '$valorId'";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado) == 1) {
      $row = mysqli_fetch_array($resultado);
      $titulo = $row['tarea'];
      $descripcion = $row['descripcion'];
      $id = $row['id'];

    //no me da para hacer esta validacion, si es diferente la busqueda//
      if($id != $valorId){
        echo 'no existe';
      }
     ?>

      <div class="ventana-busqueda">
        <h3>BUSCAR</h3>
        <input type="text" class="input-titulo" name="title" placeholder="id-tarea" value="<?php echo 'Tarea Nro ' . $valorId; ?>">
        <input type="text" class="input-titulo" name="title" placeholder="titulo" value="<?php echo $titulo; ?>">
        <textarea type="text" class="input-comentario" name="description" placeholder="tarea"> <?php echo $descripcion ?></textarea>
        <a class="btn-crear-nueva" href="index.php" name="">Cerrar</a>
      </div>

  <?php }} ?>


</body>

</html>