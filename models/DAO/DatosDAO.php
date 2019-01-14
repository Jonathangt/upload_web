
<?php

class DatosDAO {

    private $conexion = null;

    public function __construct() {
        $this->conexion = Conexion::getConexion();
    }

    public function insertar(Datos $datos) {
        $sql = "INSERT INTO datos (titulo_img, nombre_dir, usuario, descripcion_subida) "
                . "VALUES (?, ?, ?, ?)";
        $array = array(
            $datos->getTitulo_img(),
            $datos->getNombre_dir(),
            $datos->getUsuario(),
            $datos->getDescripcion_subida()
        );
        $num_filas_afectadas = $this->conexion->ejecutarActualizacion($sql, $array);
        return $num_filas_afectadas;
    }

    public function consultar() {

        $sql = "SELECT * FROM datos";
        $array = array();

        $resulset = $this->conexion->ejecutarConsultaClase($sql, $array, 'Datos');
        return $resulset;
    }
}

?>