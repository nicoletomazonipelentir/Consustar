<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

</head>
<!--BOTAR O HEADER E O FOOTER-->
<!--CSS inteiro pra isso não ficar esse nojo resto de xorume de lixo radioativo q ta agr-->
<body>
    <div id="areaTextoComBotao">
        <h3>Uma solução para o agendamento de consultas online direcionado para o Sistema Único de Saúde (SUS)</h3>
        <a id="botaoLogin" href="/sus/html/login.php" class="btn btn-primary disabled" tabindex="-1" role="button" aria-disabled="true">Login</a>
        <a id="botaoCadastro" href="/sus/html/registro.php" class="btn btn-primary disabled" tabindex="-1" role="button" aria-disabled="true">Cadastre-se</a>
        <!--Botar a logo do SUS tambem, talvez fora da div pra mexer so nela?-->
    </div>

    <div id="Tabela Horarios">
        <center><table width=600 border=”1″>
            <br><br>
            <p><CENTER>Horários Preenchidos <time datetime="<?php echo date('c'); ?>"><?php echo date('d/m/Y'); ?></time></p>
            <br><br>
            <tr>
<!-- colocar aqui as horas ocupadas-->
</tr>

            <tr>
            <td><a>08:00</td></a></td><td><a>08:20</a></td></a></td><td><a>08:40</a></td>
            </tr>  
            
            
            </tr>
            <tr><td>09:00</td><td><a>09:20</a></td><td><a>09:40
            </a></td>
            </tr>

            <td><a>10:00</a></td><td><a>10:20
            </a></td><td><a>10:40</a></td>
            </tr>

            <td><a>13:00</a></td><td><a>13:20</a></td><td>
            <a>13:40</a></td>
            </tr>

            <td><a>14:00</a></td><td><a>
            14:20</a></td><td>14:40</td>
            </tr>

            <tr><td><a>15:00</a></td><td><a>15:20</a></td><td>
            <a>15:40</a></td>
            </tr>

            <td><a>16:00</a></td><td>
            <a>16:20</a></td><td>16:40</td>
            </tr>

            </table></center>
    </div>
</body>