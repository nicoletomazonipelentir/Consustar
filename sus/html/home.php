<?php
require('header.php');
?>
<body id="bodyHome">
    
    <div class="container" id="cHome">
        <div class="row">
            <div class="col" id="areadetexto">
                <h3 id="h3Texto">Uma solução para o agendamento de consultas online direcionado para o Sistema Único de Saúde (SUS)</h3>
                <a id="botaoLogin" href="login.php" class="btn btn-primary enabled" role="button" aria-disabled="true">Login</a>
                <a id="botaoCadastro" href="registro.php" class="btn btn-primary enabled"  role="button" aria-disabled="true">Cadastre-se</a>
            </div>
            
            <div class="col-6" id="horarios">
                <center>
                    <table width=600 border=”1″>
                    <br><br>
                    <p id="textoHorarios"><CENTER><h3>Horários Preenchidos</h3><time datetime="<?php echo date('c'); ?>"><?php echo date('d/m/Y'); ?></time></p>
                    <br><br>
                    <?php
                    include 'db.php';
                    tabelaOcupados();
                    ?>

                    </table>
                </center>
            </div>
        </div>
    </div> 
    
</body>