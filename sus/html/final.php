<?php
session_start();
require('header.php');
include('db.php');

print_r($_POST);
if (isset($_SESSION["email"])) {
  $data = $_POST['dataSelecionada'];
  $horario = $_POST['horarioSelecionado'];

  if ($data=='' || $horario=='') {
    $data=$row['dia'];
    $horario=$row['horario'];
  }

  if ($data && $horario) {
      $data_formatada = DateTime::createFromFormat('Y-m-d', $data);
      // Verifica se a conversão foi bem-sucedida antes de chamar o formato
      if ($data_formatada !== false) {
          $data_formatada = $data_formatada->format('d/m/Y');
          $email = $_SESSION["email"];
          pacientes($data, $horario, $email);
          excluirHorario($data, $horario);

          // Verifica se o formulário foi enviado
          if (isset($_POST['cancelarConsulta'])) {
              echo "data-=".$data=$row['dia'];
              echo "data-=".$horario=$row['horario'];
              // Chama a função para cancelar a consulta
              restaurarHorario($data, $horario);
          }
      } else {
          echo "Erro ao formatar a data.";
      }
  } else {
      echo "Data e/ou horário não foram selecionados.";
  }
}

?>
<head>
  <style> 
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
    }

    .container {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 50px auto;
      text-align: center;
    }

    h1 {
      color: #333;
    }

    h2 {
      color: #555;
    }

    button {
      background-color: #005BAB;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 20px;
    }

    button:hover {
      background-color: #45a049;
    }

    input[type="button"] {
      background-color: #f44336;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 20px;
    }

    input[type="button"]:hover {
      background-color: #005BAB;
    }

    a {
      text-decoration: none;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="container" id="c.F">
    <h1>Sua consulta foi agendada!</h1>
    <?php
    mostraMarcado($_SESSION["email"]);
    //print_r(mostraMarcado($_SESSION["email"]));
    ?>

    <button><a href="logout.php">Sair</button>
   <!-- index.php -->
    <form method="post">
        <button type="submit" name="cancelarConsulta">Cancelar Consulta</button>
    </form>

  </div>

</body>

</html>