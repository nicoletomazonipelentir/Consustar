<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo "selecao" foi enviado no formulário
    if (isset($_POST["selecao"])) {
        // Armazena o valor selecionado em uma variável
        $hora = $_POST["hora"];
        $data=$_POST[""];
        // Faça o que desejar com a variável $hora
        echo "Você selecionou: " . $hora;
        echo "Voce selecionou " . $data;
    } else {
        echo "O campo 'hora' não foi enviado no formulário.";
    }
}
require('header.php');
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="styleindex.css">
</head>

<body id="bodyindex">
  <div class="container" id="c.Index">
    <h3 id="h3index">Escolha o horário de sua consulta</h3>
    <!-- fazer isso aqui puxar horarios do banco -->
    <form method="post" action="index.php" id="formIndex">
    <label for="hora" id="labelIndex#">Selecione uma opção:</label>
      <select class="form-select" aria-label="Default select example" id="selectIndex">
        <option selected>Escolha seu horário</option>
        <option value="1">08:00</option>
        <option value="2">08:20</option>
        <option value="3">08:40</option>
        <option value="4">09:00</option>
        <option value="5">09:20</option>
        <option value="6">09:40</option>
        <option value="7">10:00</option>
        <option value="8">10:20</option>
        <option value="9">10:40</option>
        <option value="10">11:00</option>
        <option value="11">11:20</option>
        <option value="12">11:40</option>
        <option value="13">13:00</option>
        <option value="14">13:20</option>
        <option value="15">13:40</option>
        <option value="16">14:00</option>
        <option value="17">14:20</option>
        <option value="18">14:40</option>
        <option value="19">15:00</option>
        <option value="20">15:20</option>
        <option value="21">15:40</option>
        <option value="22">16:00</option>
        <option value="23">16:20</option>
        <option value="24">16:40</option>
      </select>
      <!-- <input type="submit" value="Escolhi a hora"> -->

      <!-- <h3>Você quer marcar consulta para hoje ou amanhã?</h3>
      <input type="submit" name="date" value="Hoje"></input>
      <input type="submit" name="date" value="Amanha"></input> -->
      <?php
        // fazer uma condição pra não ser final de semana
        $date=date('N');
        if ($date==6) {
            //dar um jeito de ir pra segunda
            $currentDate = date("d/m/Y"); 
            $currentDate1 = date("d/m/Y", strtotime(" +2 day")); 
        }else{
            $currentDate = date("d/m/Y"); 
            $currentDate1 = date("d/m/Y", strtotime(" +1 day")); 
        }

        
        echo '<input type="submit" name="date" value="' . $currentDate . '"></input>';
        echo '<input type="submit" name="date" value="' . $currentDate1 . '"></input>';
        echo '</form>';
      ?>
    </form>
    <h2 id="month-year">Calendário</h2>
    <table id="calendar"></table>
    <!-- <button onclick="previousMonth()">Mês Anterior</button>
    <button onclick="nextMonth()">Próximo Mês</button> -->

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
      //Botei tudo no container, n sei se prejudica o script, mas aparentemente nao deu erro ent ta otimo
      // Inicialmente, gere o calendário para o mês atual
      generateCalendar(currentDate.getFullYear(), currentDate.getMonth() + 1);
    </script>
      <button> <a href="final.php">Confirmar</button>
  </div> 
</body>
</html>