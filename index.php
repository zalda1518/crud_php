<?php require('db.php'); ?>

<?php require('includes/header.php'); ?>

<body>

<!-- INICIAN ALERTAS MODALES-->

 <?php if (isset($_SESSION['true'])) { ?>

    <div class="alerta-exitosa" id="alerta">
      <?= $_SESSION['true'] ?>
      <button name="cerrar-alerta" onclick="cerrarAlerta()" class="cerrar-alerta">CERRAR</button>
    </div>
  <?php

    session_unset();
  } ?>

  <?php if (isset($_SESSION['false'])) { ?>

    <div class="alerta-falsa" id="alerta">
      <?= $_SESSION['false'] ?>
      <button name="cerrar-alerta" onclick="cerrarAlerta()" class="cerrar-alerta">CERRAR</button>
    </div>
  <?php

    session_unset();
  } ?>
<!-- TERMINAN ALERTAS MODALES-->

  <div class="form-padre">

    <div class="form-hijo-1">
      <form action="buscar.php" method="post">
      <h4 class="menu-item">MENU</h4>
      <input class="input-menu-buscar" name="valor-buscar"  placeholder="Buscar ID Tarea"/>
      <button  class="btn-menu-buscar" name="btn-menu-buscar" type="submit">Buscar</button>
      <button onclick="crearTarea()" class="btn-menu-crear" type="button">Crear</button>
      </form>
    </div>

<!-- INICIA VENTANA MODAL CREAR TAREA -->
    <div class="modal-fondo" id="ventana-modal">
      <form action="saved.php" method="post" class="modal">
        <input type="text" class="input-titulo" name="title" placeholder="escribe un titulo">
        <textarea type="text" class="input-comentario" name="description" placeholder="escribe tu tarea"></textarea>
        <button class="btn-crear" name="crear" type="submit">CREAR</button>
        <button class="btn-cerrar" name="cerrar" type="button" onclick="cerrarTarea()">CERRAR</button>
      </form>
    </div>
<!--TERMINA VENTANA MODAL CREAR TAREA -->

    <div class="form-hijo-3">

      <table class="table">
        <thead class="table-head">
        <th class="table-titulos">ID</th>
          <th class="table-titulos">TAREA</th>
          <th class="table-titulos">DESCRIPCION</th>
          <th class="table-titulos">FECHA</th>
          <th class="table-titulos"></th>
          <th class="table-titulos"></th>

        </thead>

        <?php
        $query = "SELECT * FROM registros";
        $resultado_registros = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($resultado_registros)) { ?>

          <tbody class="table-body">
            <td class="table-data"><?php echo $row['id'] ?> </td> 
            <td class="table-data"><?php echo $row['tarea'] ?> </td>
            <td class="table-data"><?php echo $row['descripcion'] ?> </td>
            <td class="table-data"><?php echo $row['fecha'] ?> </td>
            <td>
              <a href="editar.php?id=<?php echo $row['id'] ?>" class="acciones">EDITAR</a>
            </td>
            <td>
              <a href="delete.php?id=<?php echo $row['id'] ?>" class="acciones">ELIMINAR</a>
            </td>
          </tbody>

        <?php } ?>
      </table>

    </div>



  </div>
  <script src="app.js"></script>
</body>

</html>