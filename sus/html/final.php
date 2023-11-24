<?php

session_start();
require('header.php');
include('db.php');

print_r($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $row=pegaragenda($_SESSION["email"]);
   // print_r($row);
    $data=$row['dia'];
    $horario=$row['horario'];

    if ($data==NULL || $horario==NULL) {
      $data=$_POST['dataSelecionada'];
      $horario=$_POST['horarioSelecionado'];
    }

    $email = $_SESSION["email"];
    pacientes($data, $horario, $email);
    excluirHorario($data, $horario);

    
    if (isset($_POST['cancelarConsulta'])) {
      restaurarHorario($data,$horario);
      deletaPaciente($email);
      header("Location: index.php");
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
      <input type="hidden" name="dataSelecionada" value="<?php echo isset($data) ? $data : 'caca'; ?>">
      <input type="hidden" name="horarioSelecionado" value="<?php echo isset($horario) ? $horario : 'cacaa'; ?>">

      <button type="submit" name="cancelarConsulta">Cancelar Consulta</button>
    </form>

  </div>

</body>

</html>