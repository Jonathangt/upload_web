<?php

require_once '../config/config.php';

Class Conexion {

    //statico se usa para no creaar una nueva conecion
    public static $conexion = null;
    private $db;

    private function __construct() {
        $usuario = 'root';
        $contrasenia = '';
        try {
            $this->db = new PDO('mysql:host=' . NOMBRE_SERVIDOR . '; dbname=' . NOMBRE_DB, NOMBRE_USER, PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->exec(CHARACTER);
        } catch (PDOException $e) {
            echo "linea del error " . $e->getLine();
            echo "</br>";
            echo "archivo " . $e->getFile();
            echo "</br>";
            die("error " . $e->getMessage());
        }
    }

    public static function getConexion() {
        // si no existe se crea un objeto de esta clase y lo retorna, asi aseguramos 
        // una unica instancia
        if (!isset(self::$conexion)) {
            self::$conexion = new Conexion();
            //print "Abierto";
        }
        return self::$conexion;
    }

// metodo de consulta, sentencias select o stores procedures que ejecuten select
    public function ejecutarConsultaClase($sql, $array, $clase) {
        try {

            $sentencia = $this->db->prepare($sql);
            $sentencia->execute($array);
            //FETCH_CLASS crea una instancia de la clase especificada 
            //y mapea las columnas de la tabla a los atributos del objeto.
            $resultset = $sentencia->fetchAll(PDO::FETCH_CLASS, $clase);
            return $resultset;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

// metodo de consulta, sentencias select o stores procedures que ejecuten select
    public function ejecutarConsultaAssoc($sql, $array) {
        try {
            $sentencia = $this->db->prepare($sql);
            $sentencia->execute($array);
            //FETCH_ASSOC crea indices asociados a los nombres de las columnas de la tabla
            $resultset = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultset;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

// metodo para modificacion de datos, sentencias INSERT, UPDATE, DELETE
    public function ejecutarActualizacion($sql, $array) {

        try {
            $sentencia = $this->db->prepare($sql);
            $sentencia->execute($array);
            $num_filas_afectadas = $sentencia->rowCount();
            return $num_filas_afectadas;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public static function cerrar_conexion() {

        if (!isset(self::$conexion)) {
            self::$conexion = null;
            print "Conexion cerrada";
        }
    }
}
