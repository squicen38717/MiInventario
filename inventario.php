<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Consulta el inventario de herramientas disponibles.">
  <title>Inventario - Herramientas Pro</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="style.css">
  <?php include_once "server-scripts/conDB.php";?>
</head>
<body>
 <!-- Navbar -->
 <nav>
  <!-- Checkbox for toggling menu -->
  <input type="checkbox" id="check">
  <!-- Menu icon -->
  <label for="check" class="checkbtn">
    <i class="fas fa-bars"></i>
  </label>
  <!-- Site logo -->
  <label class="logo">MiInventario</label>
  <!-- Navigation links -->
  <ul>
    <li><a href="index.html">Inicio</a></li>
    <li><a href="catalogo.html">Catálogo</a></li>
    <li><a href="inventario.php">Inventario</a></li>
    <li><a href="facturacion.html">Facturación</a></li>
    <li><a href="contacto.html">Contacto</a></li>
  </ul>
</nav>
  <!-- Sección de Inventario -->
  <section class="catalogo">
    <h2>Inventario de Herramientas</h2>
    <p class="text-box">Consulta las herramientas disponibles en nuestro inventario.</p>

  <!-- Tabla de Inventario -->
    <?php 
    $sql = "SELECT * FROM producto";
    $result = $conn->query($sql);
    ?>
    
    <table class="tablaInventario">
      <thead>
        <tr>
          <th>ID</th>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th class="leftClumn">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?=$row["id"]; ?></td>
          <td><?=$row["nombre"]; ?></td>
          <td><?=$row["cantidad"]; ?></td>
          <td><?=$row["precio"]; ?></td>
          <td class="leftClumn">
            <a class="btn-secondary" href="javascript:void(0);">Modificar</a>
            <a class="btn-third" href="server-scripts/eliminar-producto.php?id=<?=$row["id"];?>" onclick ="return confirm('Quireres eliminar este producto?');" >eliminar</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </section>

    <!-- Modal -->
<div id="updateModal" class="modal">
  <div class="modal-content form-container">
    <span class="close">&times;</span>
    <h2>Modificar Producto</h2>
    <form id="updateForm" action="server-scripts/modificar-producto.php" method="POST">
      <input type="hidden" id="updateId" name="id">
      <label for="updateNombre">Nombre:</label>
      <input type="text" id="updateNombre" name="nombre">
      
      <label for="updateCantidad">Cantidad:</label>
      <input type="number" id="updateCantidad" name="cantidad">

      <label for="updatePrecio">Precio:</label>
      <input type="number" step="0.01" id="updatePrecio" name="precio">

      <button type="submit" class="btn-primary">Actualizar</button>
    </form>
  </div>
</div>

  <!-- Agregar producto -->
  <section class="catalogo">
    <h2>Agrega nuevo producto</h2>
    <div class="form-container">
      <form action="server-scripts/agregar-producto.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad">

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio">

        <button type="submit" class="btn-primary">Agregar</button>
      </form>
    </div>
  </section>

  <!-- Pie de Página -->
  <footer>
    <p>&copy; 2024 Herramientas Pro. Todos los derechos reservados.</p>
    <ul>
      <li><a href="#">Términos y Condiciones</a></li>
      <li><a href="#">Política de Privacidad</a></li>
      <li><a href="#">Contacto</a></li>
    </ul>
  </footer>
  <script src="producto-modal.js"></script>
</body>
</html>