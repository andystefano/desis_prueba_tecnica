<?php

class GestorBD {
    private $conexion;

    public function __construct($configuracion) {
        $this->conexion = mysqli_connect(
            $configuracion->getHost(),
            $configuracion->getUser(),
            $configuracion->getPassword(),
            $configuracion->getDatabase()
        );

        if (!$this->conexion) {
            die('Error de conexión: ' . mysqli_connect_error());
        }
    }

    public function obtenerDatosUbicacion() {
        /*
        Se Obtienen los datos ubicacion tanto de region como de comuna de una vez
         para no realizar tantas consultas al archivo asi de una vez los datos se 
         guardan en memoria javascript.
        */
        $sql = "SELECT
                    comunas.id AS comuna_id,
                    comunas.comuna,
                    regiones.id AS region_id,
                    regiones.region
                FROM
                    comunas
                JOIN
                    provincias ON comunas.provincia_id = provincias.id
                JOIN
                    regiones ON provincias.region_id = regiones.id";
    
        $resultado = mysqli_query($this->conexion, $sql);
    
        if (!$resultado) {
            die('Error en la consulta: ' . mysqli_error($this->conexion));
        } 
    
        // Convertir los datos a UTF-8
        mysqli_set_charset($this->conexion, 'utf8');
    
        $datos = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            // Convertir cada valor en la fila a UTF-8
            foreach ($fila as $clave => $valor) {
                $fila[$clave] = utf8_encode($valor);
            }
            $datos[] = $fila;
        }
    
        // Codificar los datos en JSON y retornarlos
        return json_encode($datos);
    }


    public function obtenerDatosCandidatos() {
        /*
        Se obtienen los datos de la tabla "candidatos" con los campos "id" y "nombre_candidato".
        */
        $sql = "SELECT id, nombre_candidato FROM candidatos";
    
        $resultado = mysqli_query($this->conexion, $sql);
    
        if (!$resultado) {
            die('Error en la consulta: ' . mysqli_error($this->conexion));
        }
    
        // Convertir los datos a UTF-8
        mysqli_set_charset($this->conexion, 'utf8');
    
        $datos = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            // Convertir cada valor en la fila a UTF-8
            foreach ($fila as $clave => $valor) {
                $fila[$clave] = utf8_encode($valor);
            }
            $datos[] = $fila;
        }
    
        // Codificar los datos en JSON y retornarlos
        return json_encode($datos);
    }
    
    

    public function cerrarConexion() {
        mysqli_close($this->conexion);
    }
}
