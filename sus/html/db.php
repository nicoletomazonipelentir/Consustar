<?php

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

function loginUser($email, $senha) {
    $conn = ConectaBD();
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($user) {
        if (password_verify($senha, $user["senha"])) {
            session_start();
            $_SESSION["user"] = "yes";
            header("Location: index.php");
            die();
        } else {
            return "<div class='alert alert-danger'>Senha incorreta. Tente novamente.</div>";
        }
    } else {
        return "<div class='alert alert-danger'>Email não existe.</div>";
    }
}

function criarTabelaHorarios() {
    $conn = ConectaBD();
    // Criação da tabela
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS Horarios (
        id DATE PRIMARY KEY,
        horario VARCHAR(5)
    )";

    if ($conn->query($sqlCreateTable) === TRUE) {
        echo "Tabela Horarios criada com sucesso.<br>";
    } else {
        echo "Erro na criação da tabela: " . $conn->error . "<br>";
    }

    $dataAtual = date("Y-m-d");
    $horarios = array('08:00', '08:20', '08:40', '09:00', '09:20', '09:40', '10:00', '10:20', '10:40', '11:00', '11:20', '11:40', '13:00', '13:20', '13:40', '14:00', '14:20', '14:40', '15:00', '15:20', '15:40', '16:00', '16:20', '16:40');

    foreach ($horarios as $horario) {
        $sqlInsert = "INSERT INTO Horarios (id, horario) VALUES ('$dataAtual', '$horario')";

        if ($conn->query($sqlInsert) === TRUE) {
            echo "Horário '$horario' inserido com sucesso.<br>";
        } else {
            echo "Erro na inserção do horário '$horario': " . $conn->error . "<br>";
        }
    }

    // Fecha a conexão
    $conn->close();
}

function limparTabelaHorarios() {
    $conn = ConectaBD();
    
    // Obtém a data atual menos dois dias
    $dataLimite = date("Y-m-d", strtotime("-2 days"));

    // Limpa os registros mais antigos
    $sqlDelete = "DELETE FROM Horarios WHERE id < '$dataLimite'";

    if ($conn->query($sqlDelete) === TRUE) {
        echo "Registros antigos removidos com sucesso.<br>";
    } else {
        echo "Erro na remoção de registros antigos: " . $conn->error . "<br>";
    }

    // Fecha a conexão
    $conn->close();
}

function Cadastro($fullname,$email,$senha,$senhaRepeat,$telefone,$cpf,$numCarteira,$endereco,$numero,$cidade,$estado,$cep,$bairro) {
    $conn = ConectaBD();

    // $nome = $conn->real_escape_string($nome);
    // $email = $conn->real_escape_string($email);
    // $senha = $conn->real_escape_string($senha);

    $sql = "INSERT INTO users (full_name,email,senha,telefone,cpf,numCarteira,endereco,numero,cidade,estado,cep,bairro) VALUES ('$fullname','$email','$senha','$telefone','$cpf','$numCarteira','$endereco','$numero','$cidade','$estado','$cep','$bairro')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>