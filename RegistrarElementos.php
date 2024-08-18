<?php

    include "fnc.php";
function registrarElementos($conexion, $atributos, $tabla)
{
    // Atributos son todos los campos de la entidad
    // Antes de registrar se fija si la persona ya se encuentra en la base de datos
    $atributosEsperados = "()";

    /* Registrar Usuario*/
    if($tabla == "usuario")
    {
        $atributosEsperados = "('Apellido', 'Nombre', 'Contraseña', 'Correo')";
        $consulta = "SELECT * FROM '$tabla' WHERE Contraseña = '$_POST[Contraseña]', Correo = '$_POST[Correo]'";
        $resultados = $conexion->query($consulta);

        if($resultados->num_rows == 0)
        {
            // Registrar usuario
            $atributosEsperados = "('Apellido', 'Nombre', 'Contraseña', 'Correo')";
            $consulta = "INSERT INTO `$tabla` $atributosEsperados VALUES ('$_POST[Apellido]', '$_POST[Nombre]', '$_POST[Contraseña]', '$_POST[Correo]')";
            $conexion->query($consulta);

            // Busca al usuario recien registrado, toma el id y crea el carrito.
            $consulta = "SELECT * FROM '$tabla' WHERE Contraseña = '$atributos[2]', Correo = '$atributos[3]'";
            $resultados = $conexion->query($consulta);
            $fila = $resultados->fetch_assoc();

            // Crear un carrito especifico para el usuario.
            $atributosEsperados = "Usuario";
            $consulta = "INSERT INTO 'carrito' (Usuario, Valor_total) VALUES ('$fila[ID]', 0)";
            return;
        }
    }

    if($tabla == "carrito-producto")
    {
        // Cambiar los 0 por los id que correspondan
        $consulta = "INSERT INTO 'carrito' (ID_Carrito, ID_Producto) VALUES (0, 0)"; 
    }

    /* Registrar Personal de Venta*/
    if($tabla == "personaldeventa")
    {   
        $consulta = "SELECT * FROM `$tabla` WHERE DNI = $_POST[DNI]";
        $resultados = $conexion->query($consulta);

        if($resultados->num_rows == 0)
        {
            $atributosEsperados = "(DNI, Nombre, Apellido, Telefono)";
            $consulta = "INSERT INTO `$tabla` $atributosEsperados VALUES ('$_POST[DNI]', '$_POST[Nombre]', '$_POST[Apellido]', '$_POST[Telefono]')";
            $conexion->query($consulta);
            return;
        }
    }

    /* Registrar proveedores*/
    if($tabla == "proveedores")
    {
        $atributosEsperados = "('CUIT', 'Apellido', 'Direccion', 'Mail', 'Telefono')";
        $consulta = "SELECT * FROM '$tabla' WHERE DNI = '$_POST[CUIT]'";
        $resultados = $conexion->query($consulta);

        if($resultados->num_rows == 0)
        {
            $atributosEsperados = "('CUIT', 'nombre', 'Direccion', 'Mail', 'Telefono')";
            $consulta = "INSERT INTO `$tabla` $atributosEsperados VALUES ('$_POST[CUIT]', '$_POST[nombre]', '$_POST[mail]', '$_POST[Telefono]')";
            $conexion->query($consulta);
            return;
        }
    }

}

