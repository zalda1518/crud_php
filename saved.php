<?php
require('db.php');

if (isset($_POST['crear'])) {
  $titulo = $_POST['title'];
  $descripcion = $_POST['description'];

  if (empty($titulo) || empty($descripcion)) {
    header("location:index.php");
    die($_SESSION['false'] = 'Hay algunos campos vacios');
   }

  $query = "INSERT INTO  registros(tarea,descripcion) VALUES ('$titulo','$descripcion') ";
  $resultado = mysqli_query($conn, $query);
  if (isset($resultado)) {

    $_SESSION['true'] = 'Tarea creada exitosamente';

    header("location:index.php");
  }
}
