<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        include "RegistrarElementos.php";

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {

            if(isset($_POST["DNI"], $_POST["Nombre"], $_POST["Nombre"], $_POST["Apellido"], $_POST["Telefono"]))
            {
            registrarPersona($conexion, 
                            [
                            $_POST["DNI"], 
                            $_POST["Nombre"],
                            $_POST["Apellido"], 
                            $_POST["Telefono"]
                            ], "personaldeventa");
            } 
            else 
            {
                echo "Falta rellenar algunos campos";
            }
        } 

        $conexion->close();
    ?>

    <form action="" method="POST">

        <label for="DNI"></label>
        <input type="text" name="DNI">

        <label for="Nombre"></label>
        <input type="text" name="Nombre">

        <label for="Apellido"></label>
        <input type="text" name="Apellido">

        <label for="Telefono"></label>
        <input type="text" name="Telefono">

        <button type="submit">Enviar</button>
    </form>
</body>
</html>