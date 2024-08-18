<?php
  function MostrarProductos($conexion, $tabla, // Parametros para decidir la conexion y la tabla en la que se buscan los productos
                                  $textoFiltro = null, // La bool es para decidir si se filtra o no. El texto el es lo que busca el usuario por la barra de navegacion 
                                  $valorOrden = False, $DireccionOrden = null, // Que valor quiere filtrar. La direccion para decidir si se ordena en descendente o ascendente
                                  $condicion = null){ 


                                    

    // Se realiza una consulta en una tabla de la base de datos seleccionada ($conexion)
    $consulta = "SELECT * FROM " . $tabla;


    if($condicion != null){
        $consulta .= " WHERE " . $condicion;
    }

    if($textoFiltro){
        // Despues el atributo se cambia por la descripcion de la tabla "productos"
        $consulta = $consulta . " WHERE descripcion LIKE '%$textoFiltro%'"; 
    }

    // Si se desea filtrar se añade la condicion a la consulta
    if($valorOrden != null)
    {
        $consulta = $consulta . " ORDER BY " . $valorOrden . " " . $DireccionOrden;
    }

    $resultado = $conexion->query($consulta);

    return $resultado;

}




 