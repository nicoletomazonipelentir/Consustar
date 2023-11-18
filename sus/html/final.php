<?php
session_start();
require('header.php');
include('db.php');

if (isset($_SESSION["email"])) {
  $data = $_POST['dataSelecionada'];
  $data_formatada = DateTime::createFromFormat('Y-m-d', $data)->format('d/m/Y');
  $horario = $_POST['horarioSelecionado'];
  $email = $_SESSION["email"];
  pacientes($data, $horario, $email);
}
?>
<!-- Juro que não entendi como tu puxou os outros styles nos outro arquivo, vou deixar aq e dps te pergunto ja q c ta no dentist-->
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
      background-color: #4caf50;
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
      background-color: #d32f2f;
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
    <h2>Data: <?php echo $data_formatada; ?></h2>
    <h2>Hora: <?php echo $horario;  ?></h2>

    <button><a href="logout.php">Sair</button>
    <input type="button" value="Cancelar Consulta">
  </div>

</body>

</html>