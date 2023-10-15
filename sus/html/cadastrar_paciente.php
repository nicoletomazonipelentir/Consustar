<?php

session_start();
require_once "Paciente.php";
require_once "pacienteDAO.php";

if(isset($_POST['submit'])){
    include_once('../Banco/src/conexao.php');

// print_r($_POST['nome_completo']);
// print_r('<br>');
// print_r($_POST['cpf']);
// print_r('<br>');
// print_r($_POST['endereco']);
// print_r('<br>');
// print_r($_POST['bairro']);
// print_r('<br>');
// print_r($_POST['telefone']);
// print_r('<br>');
// print_r($_POST['email']);

$data_original = $_POST['data_nascimento'];
$data_formatada = date('Y-m-d', strtotime($data_original));

    $nome_completo=$_POST['nome_completo'];
    $cpf=$_POST['cpf'];
    $endereco=$_POST['endereco'];
    $bairro=$_POST['bairro'];
    $telefone=$_POST['telefone'];
    $email=$_POST['email'];
    $data_nascimento=$data_formatada;
    $numero=$_POST['numero'];
    $cep=$_POST['cep'];
    $cidade=$_POST['cidade'];
    $estado=$_POST['estado'];
    $carteirinha_sus=$_POST['carteirinha_sus'];
    $senha=$_POST['senha'];
    $confirma_senha=$_POST['confirma_senha'];

    print_r($_POST);

    // $result=mysqli_query($conn, "insert into cadastro 
    // (nome_completo, email, cpf, data_nascimento, telefone, carteirinha_sus, endereco, numero, cidade, estado, cep, senha, confirma_senha) values
    // (
    //     '{$paciente->getNomeCompleto()}',
    //     '{$paciente->getEmail()}',
    //     '{$paciente->getCpf()}',
    //     '{$paciente->getDataNascimento()}',
    //     '{$paciente->getTelefone()}', 
    //     '{$paciente->getCarteirinhaSus()}',
    //     '{$paciente->getEndereco()}',
    //     '{$paciente->getNumero()}',
    //     '{$paciente->getCidade()}',
    //     '{$paciente->getEstado()}'
    //     '{$paciente->getCep()}'
    //     '{$senhaCripto1}',
    //     '{$senhaCripto2}'
    // )")

    $result=mysqli_query(ConexaoBD(),"INSERT INTO cadastro 
    (nome_completo, email, cpf, data_nascimento, telefone, carteirinha_sus, endereco, numero, cidade, estado, cep, senha, confirma_senha) VALUES
    ('$nome_completo','$email','$cpf','$data_nascimento','$telefone','$carteirinha_sus','$endereco','$numero','$cidade','$estado','$cep','$senha','$confirma_senha')");

    $login=mysqli_query(ConexaoBD(),"INSERT INTO login(cpf, senha) VALUE ('$cpf','$senha')");
}

?>