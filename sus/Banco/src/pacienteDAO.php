<?php 

require "conexao.php";

class PacienteDAO{

    public function validarPaciente(Paciente $paciente){
        $senhaCripto = md5($paciente->getSenha());
        $sql = "select * from cadastro where cpf='{$paciente->getCpf()}' and senha='$senhaCripto'";

        $conexao = ConexaoBD();
        return mysqli_query(ConexaoBD(),$sql);
    }

    public function cadastrarPaciente(Paciente $paciente){
        $senhaCripto = md5($paciente->getSenha());

        $sql=mysqli_query(ConexaoBD(),"INSERT INTO cadastro 
        (nome_completo, email, cpf, data_nascimento, telefone, carteirinha_sus, endereco, numero, cidade, estado, cep, senha, confirma_senha) VALUES
        (       '{$paciente->getNomeCompleto()}',
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
                '{$senhaCripto1}',
                '{$senhaCripto2}')
        ");
        
        $conexao = ConexaoBD();
        $conexao->exec($sql);
    }
}

?>