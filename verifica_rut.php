<?php
require_once 'include/GestorBD.php';
require_once 'configuracion.php';

$gestorBD = new GestorBD($configuracionBD);
$datosConsulta = $gestorBD->verificarRutExistente(@$_GET['rut']);

 
echo $datosConsulta;

// Cerrar la conexión a la base de datos
$gestorBD->cerrarConexion();
