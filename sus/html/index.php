<?php
session_start();

if (isset($_SESSION["email"])) {
  $email = $_SESSION["email"];
} else {
  header("Location: login.php");
  exit(); 
}
require('header.php');
include('db.php');
?>

<!DOCTYPE html>
<html>
 
  <body id="bodyindex">
    <div class="container row" id="c.Index">
      <!-- data e horario, marcar consulta -->
      <div class="col-4" id="col4">
      <form action="final.php" method="post">
      <label for="dataSelecionada">Selecione a data e o horário que deseja que sua consulta aconteça:</label>
        <select name="dataSelecionada" id="dataSelecionada">
            <option value="<?php echo date('Y-m-d'); ?>">Hoje: <?php echo date('d/m/Y'); ?></option>
            <option value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">Amanhã: <?php echo date('d/m/Y', strtotime('+1 day')); ?></option>
        </select>

        <label for="selectData">
          <select name='horarioSelecionado'>
            <?php
            $dataSelecionada=date("d/m/Y");
            // Definir a data com base no botão clicado
            if (isset($_POST['btnDataAtual'])) {
              $dataSelecionada = date("d/m/Y");
            } elseif (isset($_POST['btnDataFutura'])) {
              $dataSelecionada = date("d/m/Y", strtotime(" +1 day"));
            }

            $horario=horariosVagos($dataSelecionada);
            $_POST['horarioSelecionado'] = $horario;
            //criarTabelaHorarios($dataSelecionada);
            limparTabelaHorarios();?>
          </select> 
            
            
        </label>

        <input type="submit" value="Marcar Consulta">
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