<?php
require('db.php');

if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $query = "SELECT * FROM registros WHERE id = $id";
  $resultado = mysqli_query($conn, $query);
  if (mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_array($resultado);
    $titulo = $row['tarea'];
    $descripcion = $row['descripcion'];
  }
}

if (isset($_POST['actualizar'])) {
  $id = $_GET['id'];
  $titulo = $_POST['title'];
  $descripcion = $_POST['description'];

  $query = "UPDATE registros set tarea = '$titulo', descripcion = '$descripcion' WHERE id = '$id' ";
  mysqli_query($conn, $query);

  $_SESSION['true'] = 'Tarea Actualizada';
  header("location:index.php");
}


?>

<?php include('includes/header.php') ?>

<h3 class="titulo-modo-editar">MODO EDITAR</h3>
<form action="editar.php?id=<?php echo $_GET['id']; ?>" method="post" class="form-div-editar">
  <input type="text" class="input-titulo-editar" name="title" placeholder="actualiza tutitulo" value="<?php echo $titulo; ?>">
  <textarea type="text" class="input-comentario-editar" name="description" placeholder="actualiza  tu tarea"> <?php echo $descripcion; ?></textarea>
  <button class="btn-editar" name="actualizar">ACTUALIZAR</button>
  <a class="btn-crear-nueva" href="index.php" name="">SALIR</a>
</form>