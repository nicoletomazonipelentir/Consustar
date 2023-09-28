<?php
//session_start();
// print_r($_REQUEST);
// exit;
if (isset($_POST['submit']) && !empty($_POST['cpf']) && !empty($_POST['senha'])){//entra
    include_once('/Banco/src/conexao.php');

    print_r($_POST['cpf']);
    print_r($_POST['senha']);
    $cpf=$_POST['cpf'];
    $senha=$_POST['senha'];
    
    $sql="SELECT * FROM cadastro WHERE email='$email' AND senha='$senha'";
    $login=mysqli_query(ConexaoBD(),$sql);

}else{//não entra
    header('Location:inicial.html');

}


?>