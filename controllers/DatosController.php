<?php

//nombre de la clase :: llamada a los metodos 

$titulo_pagina = "Cargas en el Servidor";

require_once '../models/Conexion.inc.php';
Conexion:: getConexion();
require_once '../views/Header.inc.php';
require_once '../models/DAO/DatosDAO.php';
require_once '../models/DTO/Datos.php';


/* Para subir archivos se usa el arreglo $_FILES
  File guarda diferentes propiedades del archivo
  una puede ser el nombre del archivo
  el 2do parametro puede ser un error en caso de que no se suba
  o tamaño, tipo, nombre temporal
 */

class DatosController {

    private $datosDAO = null;

    public function __construct() {
        $this->datosDAO = new DatosDAO();
    }

    public function listarDatos() {

        $datos = $this->datosDAO->consultar();

        require_once HEADER;
        require_once '../views/Listar.php';
        require_once FOOTER;
    }

    public function subida() {
        $formatos = array('.jpg', '.png', '.gif', '.jpeg');

        /* PHP devuelve un código de error apropiado junto con el array de ficheros
         * El código de error se puede encontrar en el segmento error del array de ficheros
         * que PHP crea durante la subida de ficheros. En otras palabras, el error puede 
         * encontrarse en $_FILES['fichero_usuario']['error'].
         * UPLOAD_ERR_OK Valor: 0; No hay error, fichero subido con éxito. */

        if (isset($_POST['boton'])) {
            foreach ($_FILES["archivo"]["error"] as $clave => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $directorio = '../cargas_archivos/';
                    $nombre_tmp = $_FILES["archivo"]["tmp_name"][$clave];
                    $ubicacion = $_POST['ubicacion'];
                    $ubicacion = $directorio . $ubicacion;
                    $nombre = $_FILES["archivo"]["name"][$clave];
                    $tamano_archivo = $_FILES["archivo"]["size"][$clave];
                    //strrpos busca el . de una cadena de caracteres
                    //substr extrae una parte de la cadena de tecto
                    //substr recibe dos parametros la cadena y un entero desde q posicion extraer la cadena 
                    $tipo_archivo = substr($nombre, strrpos($nombre, '.'));

                    if (!file_exists($ubicacion)) {
                        mkdir($ubicacion, 0777) or die("Directorio no creado");
                    }

                    $carpeta = opendir($ubicacion);
                    //Se indica la ruta de destino y el no,mbre del fichero
                    $destino_guardar = $ubicacion . '/' . $nombre;
                    //in_array sirve para saber si algun elemento esta dentro de otro arreglo declarado
                    if (in_array($tipo_archivo, $formatos)) {
                        if ($tamano_archivo > 1500000) {
                            echo "El archivo $nombre tiene que ser menor a 1.5 MB <br/>";
                        } else {
                            if (move_uploaded_file($nombre_tmp, $destino_guardar)) {
                                echo "El archivo $nombre se subio correctamente <br/><br/>";
                            } else {
                                echo "Error al subir el archivo $nombre<br/><br/>";
                            }
                        }
                    } else {
                        echo "<br/><br/>Solo te admite tipos de archivos .jpg, .png, .gif, .jpeg <br/><br/>";
                    }

                    closedir($carpeta);
                }//fin if error
            }//fin foreach
            echo "<br/><br/><a href=\"../views/Inicio.php\">Regresar";
        }//fin boton

        $datos = new Datos();
        $datos->setTitulo_img($_POST['titulo']);
        $datos->setNombre_dir($ubicacion);
        $datos->setUsuario($_POST['usuario']);
        $datos->setDescripcion_subida($_POST['mensaje']);

        $num_filas_afectadas = $this->datosDAO->insertar($datos);
//
//        if ($num_filas_afectadas > 0) {
//            require_once '../views/Cargas.php';
//        }
    }

    public function descargar() {   
//            $zip = new ZipArchive();
//            if ($zip->open($archivo_final, ZIPARCHIVE::CREATE) == TRUE) {
//                if ($abrir = opendir($carpeta)) {
//                    while (false !== ($archivo = readdir($abrir))) {
//                        $extension = substr($archivo, strrpos($archivo, '.') + 1);
//                        if (in_array($extension, $permitidos)) {
//                            $zip->addFile($carpeta . $archivo, $archivo);
//                        }
//                    }
//                    closedir($abrir);
//                } else {
//                    echo ' no se ha podido abrir la carpeta';
//                }
//            } else {
//                echo 'No se ha podido crear un archivo zip!';
//            }
//            $zip->close();
//            echo 'Listo';
        }
    }



$controlador = new DatosController();
if (isset($_GET) && isset($_GET['x'])) {
    if ($_GET['x'] == 'listar') {
        $controlador->listarDatos();
    } elseif ($_GET['x'] == 'cargas') {
        require_once '../views/Cargas.php';
    } elseif ($_GET['x'] == 'descargar') {
        $controlador->descargar();
    }
}
?> 


