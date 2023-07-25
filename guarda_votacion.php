<?php
require_once 'include/GestorBD.php';
require_once 'configuracion.php';


$gestorBD = new GestorBD($configuracionBD);
$datosConsulta = $gestorBD->guardarVotacion($_POST);

// Mostrar los datos en formato JSON
header('Content-Type: application/json');



echo $datosConsulta;

// Cerrar la conexión a la base de datos
$gestorBD->cerrarConexion();

