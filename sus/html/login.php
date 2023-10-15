<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/stylelogin.css">
</head>
<body>
<?php
    if (isset($_SESSION['msg'])) :
      $msg = $_SESSION['msg'];
      unset($_SESSION['msg']);
    ?>
    <div id="area">
    <?= $msg ?>
    <?php
    endif;
    ?>
        <form id="login" autocomplete="off" action="efetua_login.php" method="POST">
            <fieldset>
                <div class="classecpf">
                    <label id="cpf" for="floatingInput">CPF</label>
                    <br>
                    <input id="cpfInput" type="text" class="form-control" id="floatingInput" placeholder="111.111.111-11" name="cpf" maxlength="11" oninput="validar(this)">   
                </div>
                <div class="classesenha">
                    <label id="senha" for="floatingPassword">Senha</label>
                    <br>
                    <input id="senha" type="password" class="form-control" id="floatingPassword" placeholder="Senha" name="senha">
                 
                </div>
              
                <input id="bEntrar" class="btn btn-primary" type="submit">Entrar</input>
                
                <div class="funcionais">
                    <a id="esquecisenha" href="botar o link que vai ser redirecionado aq" class="btn btn-primary disabled" tabindex="-1" role="button" aria-disabled="true">Esqueci minha senha</a>
                    <a id="semcad" href="botar o link que vai ser redirecionado aq" class="btn btn-primary disabled" tabindex="-1" role="button" aria-disabled="true">Não possuo cadastro</a>
                </div>
            </fieldset>
        </form>
        <?php print_r($_POST); ?>

        <script src="../js/index.js"></script>
</body>
</html>