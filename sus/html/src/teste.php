<?php
//session_start();
if (isset($_POST['submit']) && !empty($_POST['cpf']) && !empty($_POST['senha'])){//entra
    include_once('/Banco/src/conexao.php');

    $cpf=$_POST['cpf'];
    $senha=$_POST['senha'];
    print_r($_POST);

}else{//não entra
    header('Location:index.html');

}


?>