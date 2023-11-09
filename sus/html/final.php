<?php
require('header.php');
?>
<body>
    <h1>Sua consulta foi agendada!</h1>

    <h2>Data: //aqui chamar do banco de dados</h2>
    <h2>Hora: //aqui colocar a hr que selecionou e chamar do banco de dados</h2>

    <!-- linkar o botao sair com logout e ver se o cancelar fica aqui ou na proxima pagina, depois de clicar no botao da data, isso
é cadastardo no banco e chama a pagina final -->
  <button><a href="logout.php">Sair</button>
  <input type="button" value="Cancelar Consulta">
</body>
</html>