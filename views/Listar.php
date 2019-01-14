
<?php
$titulo_pagina = "Listado de Archivos";
require_once '../models/DTO/Datos.php';
?>


<div class="cargas">
    <h2>Listado de cargas en el Servidor</h2>

    <table class="table">
        <thead>
            <tr class="encabezado_tabla">
                <td>Nombre</td>
                <td>Carpeta</td>                             
                <td><img src="../img/white-down-arrow-png-2.png" width="25" height="25"></td>
            </tr> 
        </thead>
        <tbody>
            <?php
            $dto = new Datos();
            foreach ($datos as $dto):
            ?>
                <tr>                   
                    <td><?php echo $dto->getTitulo_img() ?></td>
                    <td><?php echo $dto->getNombre_dir() ?></td>
                    <td>
                        <a 
                            href="../controllers/DatosController.php?x=<?php echo $dto->getIddatos(); ?>">Descargar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?> 
        </tbody>
    </table>

    <?php
    echo "<br/><br/><br/><br/><a href=\"../views/Inicio.php\">Regresar</a>";
    ?>
</div>