<?php

class ConexaoBD{

    public static function getConexao(){
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $database = "nicole";
        
        $conn = new mysqli($servername, $username, $password, $database);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conexao;
    }
}
