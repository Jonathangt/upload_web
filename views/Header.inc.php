<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">

        <?php
        //empty comprueba si la variable esta vacia
        if (!isset($titulo_pagina) || empty($titulo_pagina)) {
            $titulo_pagina = "Carga de imagenes";
        }
        echo "<title>$titulo_pagina</title>";
        ?>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="../img/icono.ico">
        <!-- bootstrap -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">       
        <link rel="stylesheet" href="../assets/css/hojaEstilos.css">

    </head>
    <body>
       