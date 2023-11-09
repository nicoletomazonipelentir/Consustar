<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
require('header.php');


require_once('db.php');

// Receba os dados do formulário
$fullName = $_POST["fullname"];
$email = $_POST["email"];
$password = $_POST["password"];
$passwordRepeat = $_POST["repeat_password"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];
$numCarteira = $_POST["numCarteira"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];


Cadastro($nome, $email, $senha);
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro conSUStar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head> -->
<script type="text/javascript" src="js/cep.js"> </script>
<body>
    
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
        //    $fullName = $_POST["fullname"];
        //    $email = $_POST["email"];
        //    $password = $_POST["password"];
        //    $passwordRepeat = $_POST["repeat_password"];
        //    $cpf = $_POST["cpf"];
        //    $telefone = $_POST["telefone"];
        //    $numCarteira = $_POST["numCarteira"];
        //    $endereco = $_POST["endereco"];
        //    $numero = $_POST["numero"];
        //    $cidade = $_POST["cidade"];
        //    $estado = $_POST["estado"];
        //    $cep = $_POST["cep"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat) OR empty($cpf) OR empty($telefone) OR empty($numCarteira) OR empty($endereco) OR empty($numero) OR empty($cidade) OR empty($estado) OR empty($cep)) {
            array_push($errors,"Você deve preencher todos os campos.");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password!==$passwordRepeat) {
            array_push($errors, "Login inválido.");
           }
           if (strlen($password)<8) {
            array_push($errors,"A senha deve ter no mínimo 8 caracteres.");
           }
           require_once "db.php";
           //trocar o email pelo cpf
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email já existe!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            //$fullName,$email,$password,$passwordRepeat,$cpf,$telefone,$numCarteira,$endereco,$numero,$cidade,$estado,$cep 
            //eu acho q isso aqui cadastra o login, precisa fazer uma parte pra cadastrar o cadastro, com as variaveis de cima
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Registro concluído com sucesso!</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="registro.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Nome completo:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Senha:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repetir senha:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="cpf" placeholder="CPF:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="telefone" placeholder="Telefone:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="numCarteira" placeholder="Número da carteira do SUS:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="endereco" placeholder="Endereço:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="numero" placeholder="Número:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="cidade" placeholder="Cidade:" id="txtCidade">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="estado" placeholder="Estado:" id="txtEstado">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="cep" placeholder="CEP:" id="txtCep">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Já tem conta? <a href="login.php">Login</a></p></div>
      </div>
    </div>
    
</body>
</html>