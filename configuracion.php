<?php

class ConfiguracionBD {
    private $host;
    private $user;
    private $password;
    private $database;

    public function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    public function getHost() {
        return $this->host;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getDatabase() {
        return $this->database;
    }
}

// Crear una instancia del objeto ConfiguracionBD - Aqui Cambiar Datos de conección de ser necesario
$configuracionBD = new ConfiguracionBD('localhost:3307', 'root', '', 'votaciones');
