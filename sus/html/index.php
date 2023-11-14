<?php

session_start();
if (isset($_SESSION["user"])) {
   header("Location: login.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo "selecao" foi enviado no formulário
    if (isset($_POST["selecao"])) {
        $hora = $_POST["hora"];
        $data=$_POST["criar_tabela"];
    }
}
require('header.php');
include('db.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="styleindex.css">
  </head>

  <body id="bodyindex">
    <div class="container row">
      <!-- data e horario, marcar consulta -->
      <div class="col-4">
        <form method="post" action="index.php" id="formIndex">
          <h3>Escolha o dia da sua consulta:</h3>
          <?php
            $date = date('N');
            if ($date == 6) {
                $currentDate = date("d/m/Y");
                $currentDate1 = date("d/m/Y", strtotime(" +2 day"));
            } else {
                $currentDate = date("d/m/Y");
                $currentDate1 = date("d/m/Y", strtotime(" +1 day"));
            }
            echo '<input type="submit" name="criar_tabela" value="' . $currentDate . '"></input>';
            echo '<input type="submit" name="criar_tabela" value="' . $currentDate1 . '"></input>';
            
            if (isset($_POST['criar_tabela'])) {
                $data = $_POST['criar_tabela'];
                criarTabelaHorarios($data);
                limparTabelaHorarios();
          ?>
          <h4 id="h4index">Escolha o horário de sua consulta</h4>
          <label for="hora" id="labelIndex#">Selecione uma opção:</label>
          <?php
            if (isset($_POST['criar_tabela'])) {
              $dataSelecionada = $_POST['criar_tabela'];
              horariosVagos($dataSelecionada);
            }
          ?> 
          <button type="submit"><a href="final.php"> Confirmar</a></button>
          <?php } ?>
        </form>
      </div>
      <!-- calendario -->
      <div class="col-8">
        <h2 id="month-year">Calendário</h2>
        <table id="calendar"></table>
        <script>
          let currentDate = new Date();

          function generateCalendar(year, month) {
            const calendar = document.getElementById("calendar");
            const header = document.getElementById("month-year");
            header.textContent = `${getMonthName(month)} ${year}`;

            let date = new Date(year, month - 1, 1);
            let day = 1;
            let firstDay = date.getDay();
            let lastDay = new Date(year, month, 0).getDate();
            let calendarHTML = '<tr>';

            for (let i = 0; i < firstDay; i++) {
              calendarHTML += '<td></td>';
            }

            while (day <= lastDay) {
              if (date.getDay() === 0) {
                calendarHTML += '</tr><tr>';
              }

              const className = date.getDate() === currentDate.getDate() && month === (currentDate.getMonth() + 1) ? 'today' : '';
              calendarHTML += `<td class="${className}">${day}</td>`;

              date.setDate(date.getDate() + 1);
              day++;
            }

            calendarHTML += '</tr>';
            calendar.innerHTML = calendarHTML;
          }

          function getMonthName(month) {
            const months = [
              'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
              'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
            ];
            return months[month - 1];
          }
          generateCalendar(currentDate.getFullYear(), currentDate.getMonth() + 1);
        </script>
      </div>

      </div>
    </div> 
  </body>
</html>