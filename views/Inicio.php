
<?php
include_once '../models/Conexion.inc.php';

$titulo_pagina = "Carga de Imagenes";
include_once '../views/Header.inc.php';
?>

<div id="formulario_ingreso">
    <!--enctype="multipart/form-data" tipo de informacion que se va a subiir-->
    <!--enctype solo se puede usar con el metodo post-->

    <form action="../controllers/DatosController.php?x=cargas" method="post" enctype="multipart/form-data">
        <h2>Carga de imagenes</h2>
        <input type="text" name="titulo" placeholder="Titulo" required>
        <input type="text" name="ubicacion" placeholder="Nombre del directorio a guardar" required>
        <input type="text" name="usuario" placeholder="Usuario" required>
        <textarea name="mensaje" placeholder="Descripcion de subida"></textarea>
        <br/> 
        <div>
            <!--con la propiedad multiple se puede seleccionar varios archivos, como se selecciona 
            varios archivos el nombre archivo[] es un arreglo-->
            <input type="file" name="archivo[]" id="botones_examniar1">
            <input type="file" name="archivo[]" id="botones_examniar2">
            <input type="file" name="archivo[]" id="botones_examniar3">

        </div>
        <input type="submit" value="Subir archivo" id="boton" name="boton">  
    </form>
</div>

<div id="boton_dos" class="derecha" method="post">
    <form action="../controllers/DatosController.php?x=listar" method="post" enctype="multipart/form-data">

        <input type="submit" value="Listar" name="boton_listar" id="boton_listar">  
    </form>
</div>

<?php
include_once '../views/Footer.inc.php';
?>