<?php 
 require('db.php');

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "DELETE FROM registros WHERE  id = $id";
  $resultado = mysqli_query($conn, $query);

if(!$resultado){
  die('query fallo al eliminar item');
}
 $_SESSION['true'] = 'Tarea Eliminada';
header("location:index.php");

}
