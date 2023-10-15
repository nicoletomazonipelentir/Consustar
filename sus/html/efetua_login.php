<?php
session_start();
require_once "Paciente.php";
require_once "pacienteDAO.php";

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

$paciente= new Paciente();

$paciente->setCpf($cpf);
$paciente->setSenha($senha);

$pacienteDAO = new pacienteDAO();

if ($clipacienteente = $pacienteDAO->validarpaciente($paciente)){
    
    $_SESSION['cpf'] = $paciente['cpf'];
    $_SESSION['nome_completo'] = $paciente['nome_completo'];
    $_SESSION['cep'] = $paciente['cep'];
    $_SESSION['carteirinha_sus'] = $paciente['carteirinha_sus'];

    //var_dump($_SESSION);
    header ("Location:calendario.php");
} else{ 
    $_SESSION['msg'] = "Usuário ou senha inválido";
    header('Location:login.html');
}
?>