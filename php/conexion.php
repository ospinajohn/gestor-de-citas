<?php

class Conexion {
    public function conectar() {

        $server = "localhost";
        $user = "root";
        $db = "soporte_gestion";
        $password = "";

        $conn = mysqli_connect($server, $user,$password, $db);

        
        return $conn;
    }
}