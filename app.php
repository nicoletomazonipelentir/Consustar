<?php

$ans = [];

$servername = "localhost";
$username = "root";
$password = "1234";
$database = "nicole";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = "7";
$cpf = "11490776974";

$sql = "INSERT INTO nicole (id, cpf) VALUES ('$id', '$cpf')"; // Replace 'your_table_name' with the actual table name

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$ans[] = $sql;

$conn->close();

print_r($ans);
?>


