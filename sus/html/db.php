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

function criarTabelaHorarios($dataAtual) {
    $conn = ConectaBD();

    $dataObj = DateTime::createFromFormat('d/m/Y', $dataAtual);
    $dataFormatada = $dataObj->format('Y-m-d');

    $horarios = array('08:00', '08:20', '08:40', '09:00', '09:20', '09:40', '10:00', '10:20', '10:40', '11:00', '11:20', '11:40', '13:00', '13:20', '13:40', '14:00', '14:20', '14:40', '15:00', '15:20', '15:40', '16:00', '16:20', '16:40');

    foreach ($horarios as $horario) {
        $sqlSelect = "SELECT * FROM Horarios WHERE id = '$dataFormatada' AND horario = '$horario'";
        $result = $conn->query($sqlSelect);

        if ($result->num_rows == 0) {
            $sqlInsert = "INSERT INTO Horarios (id, horario) VALUES ('$dataFormatada', '$horario')";
            // Executa a instrução de inserção
            $conn->query($sqlInsert);
        } 
    }

    // Fecha a conexão
    $conn->close();
}

function limparTabelaHorarios() {
    // Estabelece a conexão com o banco de dados
    $conn = ConectaBD();
    
    // Obtém a data atual menos dois dias
    $dataLimite = date("Y-m-d");

    // Cria a consulta SQL para deletar os registros mais antigos
    $sqlDelete = "DELETE FROM Horarios WHERE id < '$dataLimite'";

    // Fecha a conexão com o banco de dados
    $conn->close();
}

function Cadastro($fullname,$email,$senha,$senhaRepeat,$telefone,$cpf,$numCarteira,$endereco,$numero,$cidade,$estado,$cep,$bairro) {
    $conn = ConectaBD();

    $sql = "INSERT INTO users (full_name,email,senha,telefone,cpf,numCarteira,endereco,numero,cidade,estado,cep,bairro) 
    VALUES ('$fullname','$email','$senha','$telefone','$cpf','$numCarteira','$endereco','$numero','$cidade','$estado','$cep','$bairro')";
    
    if ($conn->query($sql) === TRUE) {
        //echo "Cadastro realizado com sucesso!";
        header("Location: login.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function horariosVagos($dataAtual) {
    $conn = ConectaBD();
    $dataObj = DateTime::createFromFormat('d/m/Y', $dataAtual);
    $dataFormatada = $dataObj->format('Y-m-d');

    // Consulta SQL usando prepared statement para evitar injeção SQL
    $sql = "SELECT id, horario FROM Horarios WHERE id = '".$dataFormatada."'";
    $stmt = $conn->prepare($sql);
    //$stmt->bind_param("s", $dataFormatada);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se há resultados
    if ($result->num_rows > 0) {
        // Iniciar o elemento select
        echo "<select name='horarioSelecionado'>";

        // Iterar sobre os resultados e gerar as opções
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["horario"] . "'>" . $row["horario"] . "</option>";
        }

        // Fechar o elemento select
        echo "</select>";
    } else {
        echo "Nenhum resultado encontrado.";
    }

    // Fechar o statement e a conexão
    $stmt->close();
    $conn->close();
}

function pacientes($data, $horario,$email){
    $conn = ConectaBD();
    // Consultar dados na tabela "users"
    $sql_users = "SELECT full_name, cpf, numCarteira FROM users WHERE email='".$email."'";
    $result_users = $conn->query($sql_users);

    if ($result_users->num_rows > 0) {
        // Extraindo os dados da tabela "users"
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
            adicionarPaciente($full_name, $horario, $data, $cpf, $num_carteira);
        }
    } else {
        echo "Nenhum dado encontrado na tabela users para o ID fornecido.";
    }
    $conn->close();
}

function adicionarPaciente($full_name, $horario, $dataFormatada, $cpf, $num_carteira){
    $conn = ConectaBD();
    $sql_paciente = "INSERT INTO pacientes (nome, horario, dia, cpf, carteira_sus) 
    VALUES ('$full_name', '$horario', '$dataFormatada', '$cpf', '$num_carteira')";

    if ($conn->query($sql_paciente) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados na tabela paciente: " . $conn->error;
    }
    $conn->close();
}

function tabelaOcupados(){
    $conn = ConectaBD();
    // Consulta SQL para recuperar os dados
    $sql = "SELECT id, horario FROM horarios WHERE id='".date("Y-m-d")."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $numColunas = 3;
        $colunaAtual = 0;

        while ($row = $result->fetch_assoc()) {
            if ($colunaAtual == 0) {
                echo "<tr>";
            }
            echo "<td>" . $row["horario"] . "</td>";

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
        echo "0 resultados encontrados";
    }
    $conn->close();
}

?>