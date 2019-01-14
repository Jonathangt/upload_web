<?php

require_once '../config/config.php';

class Inicio {

    function cargarPagina($nombrePagina) {
        require_once HEADER;
        require_once '../views/' . $nombrePagina . '.php';
        require_once FOOTER;
    }

}

$principal = new Inicio();
if (isset($_GET['x'])) {
    $principal->cargarPagina($_GET['x']);
} else {
//por defecto cargo la pagina index
    require_once HEADER;
    require_once '../views/inicio.php';
    require_once FOOTER;
}
