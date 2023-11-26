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
    $sql = "SELECT * FROM users WHERE email = '".$email."'";
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

function limparTabelaHorarios() {
    $conn = ConectaBD();
    
    $dataLimite = date("Y-m-d");

    $sqlDelete = "DELETE FROM Horarios WHERE id < '$dataLimite'";
    $conn->query($sqlDelete);

    $conn->close();
}

function Cadastro($fullname,$email,$senha,$senhaRepeat,$telefone,$cpf,$numCarteira,$endereco,$numero,$cidade,$estado,$cep,$bairro) {
    $conn = ConectaBD();

    $sql = "INSERT INTO users (full_name,email,senha,telefone,cpf,numCarteira,endereco,numero,cidade,estado,cep,bairro) 
    VALUES ('$fullname','$email','$senha','$telefone','$cpf','$numCarteira','$endereco','$numero','$cidade','$estado','$cep','$bairro')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// function horariosVagos($dataAtual) {
//     $conn = ConectaBD();
//     $dataObj = DateTime::createFromFormat('d/m/Y', $dataAtual);
//     $dataFormatada = $dataObj->format('Y-m-d');

//     // Usando prepared statements para evitar SQL Injection
//     $sql = "SELECT * FROM Horarios WHERE id = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("s", $dataFormatada);
//     $stmt->execute();
    
//     $result = $stmt->get_result();
    
//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {

//             if (compararHoras($row["horario"])) {
//                 echo "<option value='" . $row["horario"] . "'>" . $row["horario"] . "</option>";
//             }
//         }
//     } else {
//         echo "Nenhum resultado encontrado.";
//     }

//     $conn->close();
// }

// function compararHoras($horaDoBanco) {
//     $horaAtual = date("H:i");
//     $horaDoBancoObjeto = DateTime::createFromFormat("H:i", $horaDoBanco);
//     $horaAtualObjeto = DateTime::createFromFormat("H:i", $horaAtual);

//     if ($horaAtualObjeto > $horaDoBancoObjeto) {
//         return true;
//     }else{
//         return false;
//     }
// }
//se esse não funcionar, descoiziei o de cima
function horariosVagos($dataAtual) {
    $conn = ConectaBD();
    $dataObj = DateTime::createFromFormat('d/m/Y', $dataAtual);
    $dataFormatada = $dataObj->format('Y-m-d');

    // Obtenha a hora atual
    $horaAtual = date("H:i:s");

    // Usando prepared statements para evitar SQL Injection
    $sql = "SELECT * FROM Horarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $dataFormatada);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $horarioNoBanco = strtotime($row["horario"]);
            $horaAtualTimestamp = strtotime($horaAtual);

            if ($dataFormatada == date("Y-m-d") && $horarioNoBanco > $horaAtualTimestamp) {
                // Exibe apenas os horários que ainda não passaram para o dia de hoje
                echo "<option value='" . $row["horario"] . "'>" . $row["horario"] . "</option>";
            } elseif ($dataFormatada != date("Y-m-d")) {
                // Exibe todos os horários para o dia seguinte
                echo "<option value='" . $row["horario"] . "'>" . $row["horario"] . "</option>";
            }
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }

    $conn->close();
}


function compararHoras($horaDoBanco) {
    $horaAtual = new DateTime();
    $horaDoBancoObjeto = DateTime::createFromFormat("H:i", $horaDoBanco);

    return $horaAtual > $horaDoBancoObjeto;
}

function pacientes($data, $horario,$email){
    $conn = ConectaBD();
    $sql_users = "SELECT full_name, cpf, numCarteira FROM users WHERE email='".$email."'";
    $result_users = $conn->query($sql_users);

    if ($result_users->num_rows > 0) {
        $row = $result_users->fetch_assoc();
        $full_name = $row['full_name'];
        $cpf = $row['cpf'];
        $num_carteira = $row['numCarteira'];

        $horario_sql = isset($horario) ? "'$horario'" : "NULL";

        $existe="SELECT * FROM pacientes WHERE carteira_sus='".$num_carteira."'";
        $result = $conn->query($existe);
        if ($result->num_rows > 0) {
            //echo "A condição existe. Há pelo menos uma linha que atende à condição.";
        } else {
            adicionarPaciente($conn, $full_name, $horario, $data, $cpf, $num_carteira, $email);
        }
    } else {
        echo "Nenhum dado encontrado na tabela users para o ID fornecido.";
    }
    $conn->close();
}

function adicionarPaciente($conn, $full_name, $horario, $dataFormatada, $cpf, $num_carteira, $email){
    $sql_paciente = "INSERT INTO pacientes (nome, horario, dia, cpf, carteira_sus, email) 
    VALUES ('$full_name', '$horario', '$dataFormatada', '$cpf', '$num_carteira','$email')";

    $conn->query($sql_paciente);
}

function tabelaOcupados(){
    $conn = ConectaBD();

    $sql = "SELECT id, horario FROM horarios WHERE id='" . date("Y-m-d") . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $numColunas = 3;
        $colunaAtual = 0;

        $horariosArray = array();

        while ($row = $result->fetch_assoc()) {
            $horariosArray[] = $row["horario"];
        }

        function compararHorarios($a, $b) {
            return strtotime($a) - strtotime($b);
        }

        usort($horariosArray, 'compararHorarios');

        foreach ($horariosArray as $horario) {
            if ($colunaAtual == 0) {
                echo "<tr>";
            }

            echo "<td>" . $horario . "</td>";
            $colunaAtual++;

            if ($colunaAtual == $numColunas) {
                echo "</tr>";
                $colunaAtual = 0;
            }
        }

        if ($colunaAtual != 0) {
            echo "</tr>";
        }

    } else {
        echo "Todos os horários estão ocupados";
    }

    $conn->close();
}

function excluirHorario($data, $horario){
    $conn = ConectaBD();

    $sqlExcluirHorario = "DELETE FROM horarios WHERE id = '".$data."' AND horario = '".$horario."'";
    $conn->query($sqlExcluirHorario);
    $conn->close();
}

function restaurarHorario($data, $horario) {
    $conn = ConectaBD();
    
    $sqlInserirHorario = $conn->prepare("INSERT INTO horarios (id, horario) VALUES ('$data', '$horario')");
    $sqlInserirHorario->execute();
    
    $conn->close();
}

function verificaCadastro($email){
    $conn = ConectaBD();

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    return $result;
}

function verificarLogin($email) {
    $result=verificaCadastro($email);

    if ($result->num_rows > 0) {
        $_SESSION["email"] = $email;
        return true;
    } else {
        return false;
    }
    $conn->close();
}

function autenticaPaciente($email) {
    $result=verificaPaciente($email);

    if ($result->num_rows > 0) {
        $_SESSION["email"] = $email;
        return true;
    } else {
        return false;
    }
    $conn->close();
}

function mostraMarcado($email){
    $result=verificaPaciente($email);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $dataFormatada = date('d/m/Y', strtotime($row["dia"]));

            echo '<h2 style="color:#00296B;">Data: '.$dataFormatada.'</h2>
            <h2 style="color:#00296B;">Hora: '.$row["horario"].'</h2>';

            return $row;
        }
    } else {
        echo "0 resultados encontrados";
    }
}

function pegaragenda($email){
    $result=verificaPaciente($email);
    
    return $row = $result->fetch_assoc();

    $conn->close();
}

function verificaPaciente($email){
    $conn = ConectaBD();

    $sql = "SELECT * FROM pacientes WHERE email = '$email'";
    $result = $conn->query($sql);
    return $result;
}

function deletaPaciente($email){
    $conn = ConectaBD();

    $sqlExcluirPaciente = "DELETE FROM pacientes WHERE email = ?";
    
    $stmt = $conn->prepare($sqlExcluirPaciente);

    if ($stmt === false) {
        echo "Erro na preparação da consulta: " . $conn->error;
        $conn->close();
        return;
    }else{
        echo "não sei o retorno";
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Paciente excluído com sucesso.";
    } else {
        echo "Erro ao excluir paciente: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>