<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div clase="productos"></div>
    <a href="Registrarse.php">Registrarse</a>
    <a href="login.php">Iniciar Sesion</a>

    <?php

        include "fnc.php";
        include "SelectElementos.php";
        include "usuario.php";

        $valorOrdenado = "descripcion";
        $direccion = "ASC";

        
        if(isset($_POST["buscar"]))
        {
          $resultado = MostrarProductos($conexion, "productos", $_POST["buscar"], $valorOrdenado, $direccion);
        } else {
          // Si quiere filtrarlos debe de ingresarlo en un post, buscando un atributo de los productos(ej: precio)
          // y decidir si quiere filtrarlos por descendencia o ascendencia
          $resultado = MostrarProductos($conexion, "productos", $textoFiltro = null, $valorOrden = $valorOrdenado, $DireccionOrden = $direccion);
        }

        // Se abre una etiqueta "div"
        echo "<div>";
        // Mientras que se encuentre algo para leer:
        while($row = $resultado->fetch_assoc()){

        // Se genera un li con cada nombre
        echo "   <div>";
        echo         $row["Descripcion"];
        echo "       <form action='carrito.php' method='POST'>";
        echo "           <input type='hidden' name='ID_Usuario' value='0'>";
        echo "           <input type='hidden' name='numeroID' value='" . $row["ID"] ."'>";
        echo "           <input type='submit' value='Agregar al carrito'>";
        echo "       </form>";
        echo "   </div>";
        echo "</div>";
        }

        echo "</div>";
        // Se cierra una etiqueta "div"


        $conexion->close();
      ?>

        <br>
        <br>
        <br>

        <form method="POST" action="">
          <label for="buscar">Buscar por nombre: </label>
          <input type="text" name="buscar">
          <button type="submit" style="width: 50px; height: 25px;"></button>
        </form>

        <form method="POST" id="formulario" action="RegistrarUsuarios.php">
          <label for="nombre">Nombre: </label>
          <input type="text" name="nombre">
          <br>
          <label for="obras">obras: </label>
          <input type="text" name="obras">
          <input type="submit" style="width: 50px; height: 35px;">
        </form>

</body>
</html>
