<?php
require('header.php');
?>
<body id="bodyHome">
    
    <div class="container" id="cHome">
        <div class="row">
            <div class="col" id="areadetexto">
                <h3 id="h3Texto">Uma solução para o agendamento de consultas online direcionado para o Sistema Único de Saúde (SUS)</h3>
                <a id="botaoLogin" href="/sus/html/login.php" class="btn btn-primary disabled" tabindex="-1" role="button" aria-disabled="true">Login</a>
                <a id="botaoCadastro" href="/sus/html/registro.php" class="btn btn-primary disabled" tabindex="-1" role="button" aria-disabled="true">Cadastre-se</a>
            </div>
            
            <div class="col-6" id="horarios">
                <center><table width=600 border=”1″>
                <br><br>
                <p id="textoHorarios"><CENTER><h3>Horários Preenchidos</h3><time datetime="<?php echo date('c'); ?>"><?php echo date('d/m/Y'); ?></time></p>
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
        </div>
    </div> 
    
</body>