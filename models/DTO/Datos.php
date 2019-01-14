<?php

/**
 * Description of config
 *
 * @author Jonathan
 */
class Datos {

    private $iddatos;
    private $titulo_img;
    private $nombre_dir;
    private $usuario;
    private $descripcion_subida;

    public function __construct() {
        
    }

    public function getIddatos() {
        return $this->iddatos;
    }

    public function getTitulo_img() {
        return $this->titulo_img;
    }

    public function getNombre_dir() {
        return $this->nombre_dir;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getDescripcion_subida() {
        return $this->descripcion_subida;
    }

    public function setIddatos($iddatos) {
        $this->iddatos = $iddatos;
    }

    public function setTitulo_img($titulo_img) {
        $this->titulo_img = $titulo_img;
    }

    public function setNombre_dir($nombre_dir) {
        $this->nombre_dir = $nombre_dir;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setDescripcion_subida($descripcion_subida) {
        $this->descripcion_subida = $descripcion_subida;
    }

}
