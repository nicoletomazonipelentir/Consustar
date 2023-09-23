<?php

require ('conexao.php');

class CadastroDAO{

    public function cadastrarPaciente(Paciente $paciente){

        if ($paciente->getSenha() == $paciente->getConfirmaSenha()) {
            $senhaCripto1 = md5($paciente->getSenha());
            $senhaCripto2 = md5($paciente->getConfirmaSenha());

        }else{
            echo "Senhas são diferentes";
        }
       
        $sql = "insert into cadastro 
        (nome_completo, email, cpf, data_nascimento, telefone, carteirinha_sus, endereco, numero, cidade, estado, cep, senha, confirma_senha) values
        (
            '{$paciente->getNomeCompleto()}',
            '{$paciente->getEmail()}',
            '{$paciente->getCpf()}',
            '{$paciente->getDataNascimento()}',
            '{$paciente->getTelefone()}', 
            '{$paciente->getCarteirinhaSus()}',
            '{$paciente->getEndereco()}',
            '{$paciente->getNumero()}',
            '{$paciente->getCidade()}',
            '{$paciente->getEstado()}'
            '{$paciente->getCep()}'
            '{$senhaCripto}',
            '{$senhaCripto}'
        )";
            

        $conexao = ConexaoBD::getConexao();
        return $conexao->query($sql);
    }

    public function validarCliente(Paciente $cliente){
        $senhaCripto = md5($cliente->getSenha());
        $sql = "select * from clientes where email='{$cliente->getEmail()}' and senha='$senhaCripto'";

        $conexao = ConexaoBD::getConexao();
        $stmt = $conexao->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}