<?php

class GestorBD {
    private $conexion;

    public function __construct($configuracion) {

        try {

        $this->conexion = mysqli_connect(
            $configuracion->getHost(),
            $configuracion->getUser(),
            $configuracion->getPassword(),
            $configuracion->getDatabase()
        );

     

        } catch (Exception $e) {
            // Se ha producido un error en la conexión, muestra un mensaje personalizado
            die("Lo sentimos, ha ocurrido un error al conectar con la base de datos. Por favor, inténtalo más tarde.");
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
  
    
    public function verificarRutExistente($rut) {
        // Validar el RUT usando filter_var con el filtro FILTER_SANITIZE_STRING
        $rut = filter_var($rut, FILTER_SANITIZE_STRING);
    
        // Escapar el RUT para evitar inyección de SQL (usar mysqli_real_escape_string o algún método similar)
        $rut = mysqli_real_escape_string($this->conexion, $rut);
    
        // Consulta SQL para verificar si el RUT ya existe en la tabla de votaciones
        $sql = "SELECT COUNT(*) as count FROM votaciones WHERE rut = '$rut'";
        
        $resultado = mysqli_query($this->conexion, $sql);
    
        if (!$resultado) {
            die('Error en la consulta: ' . mysqli_error($this->conexion));
        }
    
        $fila = mysqli_fetch_assoc($resultado);
        $count = $fila['count'];
    
        $estado = Array();

        // Si el RUT ya existe en la tabla de votaciones, retornar false
        if ($count > 0) {
            $estado['estado'] = "0";
            $estado['mensaje'] = "usado";
        }else{
            $estado['estado'] = "1";
            $estado['mensaje'] = "disponible";
        }
    
        return json_encode($estado);
    
        // Si el RUT no existe, retornar true (disponible)
      
    }





    
    public function guardarVotacion($datos) {
        // Datos de la votación enviados por POST
        $nombre_completo = $datos['nombre_completo'];
        $alias = $datos['alias'];
        $rut = $datos['rut'];
        $email = $datos['email'];
        $comuna_id = $datos['id_comuna'];
        $candidato_id = $datos['id_candidato'];

        // Insertar datos en la tabla de votaciones
        $sql = "INSERT INTO votaciones (nombre_completo, alias, rut, email, comuna_id, candidato_id, fecha, ip)
                VALUES ('$nombre_completo', '$alias', '$rut', '$email', $comuna_id, $candidato_id, NOW(), '" . $this->getIpAddress() . "')";

        $resultado = mysqli_query($this->conexion, $sql);

        if (!$resultado) {
            die('Error al guardar la votación: ' . mysqli_error($this->conexion));
        }

        // Obtener el ID generado al insertar el registro en la tabla votaciones
        $votaciones_id = mysqli_insert_id($this->conexion);

        // Insertar datos en la tabla de votaciones_medios
        $como_se_entero = $datos['como_se_entero'];
        foreach ($como_se_entero as $medios_id) {
            $sql = "INSERT INTO votaciones_medios (votaciones_id, medios_id)
                    VALUES ($votaciones_id, $medios_id)";
            $resultado = mysqli_query($this->conexion, $sql);
            if (!$resultado) {
                die('Error al guardar el medio de votación: ' . mysqli_error($this->conexion));
            }
        }

        $registro['votaciones_id'] = $votaciones_id;
        return json_encode($registro);         // Retorna json el ID de la votación generada


    }

    private function getIpAddress() {
        // Obtiene la dirección IP del cliente
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }
    

    public function cerrarConexion() {
        mysqli_close($this->conexion);
    }
}
