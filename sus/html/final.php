<?php
session_start();
require('header.php');
include('db.php');

if (isset($_SESSION["email"])) {
  $data=$_POST['dataSelecionada'];
  $data_formatada = DateTime::createFromFormat('Y-m-d', $data)->format('d/m/Y');
  $horario=$_POST['horarioSelecionado'];
  $email = $_SESSION["email"];
  pacientes($data, $horario,$email);

} 
?>
<body>
  <div class="container" id="c.F">
    <h1>Sua consulta foi agendada!</h1>
    <h2>Data: <?php echo $data_formatada;?></h2>
    <h2>Hora: <?php echo $horario;  ?></h2>

  <button><a href="logout.php">Sair</button>
  <input type="button" value="Cancelar Consulta">
  </div>
    
</body>
</html>