<?php

function ConexaoBD(){
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $database = "nicole";
    
    $conn = new mysqli($servername, $username, $password, $database);
    return $conn;
    
}

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

    
