<?php

function horariosVagos($dataAtual) {
    $conn = ConectaBD();
    $dataObj = DateTime::createFromFormat('d/m/Y', $dataAtual);
    $dataFormatada = $dataObj->format('Y-m-d');

    // Usando prepared statements para evitar SQL Injection
    $sql = "SELECT * FROM Horarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $dataFormatada);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["horario"] . "'>" . $row["horario"] . "</option>";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }

    // Não feche a conexão aqui se precisar dela em outras partes do código
    $conn->close();
}


function ConectaBD() {
    $hostName = "localhost";
    $dbUser = "root";
    $dbPassword = "1234";
    $dbName = "consustar";
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    return $conn;
}
$dataAtual=date("d/m/Y");
echo "\n\n".horariosVagos($dataAtual);