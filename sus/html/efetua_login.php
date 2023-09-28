<?php
session_start();
require "src/paciente.php";
require "src/pacienteDAO.php";

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

$paciente= new Paciente();

$paciente->setCpf($cpf);
$paciente->setSenha($senha);

$pacienteDAO = new pacienteDAO();

if ($cliente = $clienteDAO->validarCliente($cliente)){
    
    $_SESSION['cpf'] = $paciente['cpf'];
    $_SESSION['nome_completo'] = $paciente['nome_completo'];
    $_SESSION['cep'] = $cliente['cep'];
    $_SESSION['carteirinha_sus'] = $cliente['carteirinha_sus'];

    //var_dump($_SESSION);
    header ("Location:calendario.php");
} else{ 
    $_SESSION['msg'] = "Usuário ou senha inválido";
    header('Location:login.html');
}
?>