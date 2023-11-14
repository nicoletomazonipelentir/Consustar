<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
require('header.php');
?>
<script type="text/javascript" src="js/cep.js"> </script>

<body id="bodyRegistro">

    <div class="container" id="c.Reg">
        <?php
        if (isset($_POST["submit"])) {
            require_once('db.php');

            // Receba os dados do formulário
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $senha = $_POST["password"];
            $senhaRepeat = $_POST["repeat_password"];
            $cpf = $_POST["cpf"];
            $telefone = $_POST["telefone"];
            $numCarteira = $_POST["numCarteira"];
            $endereco = $_POST["endereco"];
            $bairro = $_POST['bairro'];
            $numero = $_POST["numero"];
            $cidade = $_POST["cidade"];
            $estado = $_POST["estado"];
            $cep = $_POST["cep"];


           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           if (empty($fullName) OR empty($email) OR empty($senha) OR empty($senhaRepeat) OR empty($cpf) OR empty($telefone) OR empty($numCarteira) OR empty($endereco) OR empty($numero) OR empty($cidade) OR empty($estado) OR empty($cep) OR empty($bairro)) {
            array_push($errors,"Você deve preencher todos os campos.");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $senha!==$senhaRepeat) {
            array_push($errors, "Login inválido.");
           }
           if (strlen($senha)<8) {
            array_push($errors,"A senha deve ter no mínimo 8 caracteres.");
           }
           //trocar o email pelo cpf
           $sql = "SELECT * FROM users WHERE cpf = '$cpf'";
           $conn=ConectaBD();
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"cpf já existe!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
           Cadastro($fullName,$email,$senha,$senhaRepeat,$cpf,$telefone,$numCarteira,$endereco,$numero,$cidade,$estado,$cep,$bairro);
           }
          

        }
        ?>
        <form action="registro.php" method="post" class="row">
            <div class="col-6">
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
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="endereco" placeholder="Endereço:">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="numero" placeholder="Número:">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="bairro" placeholder="Bairro:" id="txtBairro">
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
                    <input type="submit" class="btn btn-primary" value="Cadastrar" name="submit">
                    <div>
                        <p>Já tem conta? <button type="button"><a href="login.php">Login</a></button></p>
                    </div>
                </div>
            </div>


        </form>
        <div>

        </div>
    </div>

</body>

</html>