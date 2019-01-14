

<div class="cargas">
    <h2>Cargas</h2>
    <?php
    
    require_once '../controllers/DatosController.php';
    $datosController = new DatosController();
    $datosController->subida();
    
    ?>
</div>
