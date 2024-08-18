<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        include "usuario.php";
        include "SelectElementos.php";
        include "registrarElementos.php";

    $resultado = MostrarProductos($conexion, "carrito", null, false, null, "ID = $_POST[ID_Usuario]");
    echo $_POST["ID_Usuario"];

    // Se abre una etiqueta "ul"
    ?><div><?php
    // Mientras que se encuentre algo para leer:
    while($row = $resultado->fetch_assoc())
    {

        $consulta = "SELECT * FROM 'producto' WHERE ID = $row[ID_Producto]";
        $producto = $conexion->query($consulta)->fetch_assoc();
        // Se genera un li con cada nombre
        echo "   <div>";
        echo         $row["ID"];
        echo "       <form action='' method='POST'>";
        echo "           <input type='hidden' name='numeroID' value='" . $row["ID"] ."'>";
        echo "           <input type='submit' value='Eliminar del carrito'>";
        echo "       </form>";
        echo "   </div>";
        echo "</div>";
        }

    $conexion->close(); 
    
    ?>
</body>
</html>