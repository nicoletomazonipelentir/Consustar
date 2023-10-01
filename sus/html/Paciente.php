<?php

class Cadastro{
    private string $nome_completo;
    private string $email;
    private string $cpf;
    private string $data_nascimento;
    private int $telefone;
    private int $carteirinha_sus;
    private string $endereco;
    private int $numero;
    private string $cidade;
    private string $estado;
    private int $cep;
    private string $senha;
    private string $confirma_senha;

    public function getNomeCompleto(): string {
        return $this->nome_completo;
    }

    public function setNomeCompleto(string $nome_completo): void {
        $this->nome_completo = $nome_completo;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void {
        $this->cpf = $cpf;
    }

    public function getDataNascimento(): string {
        return $this->data_nascimento;
    }

    public function setDataNascimento(string $data_nascimento): void {
        $this->data_nascimento = $data_nascimento;
    }

    public function getTelefone(): int {
        return $this->telefone;
    }

    public function setTelefone(int $telefone): void {
        $this->telefone = $telefone;
    }

    public function getCarteirinhaSus(): int {
        return $this->carteirinha_sus;
    }

    public function setCarteirinhaSus(int $carteirinha_sus): void {
        $this->carteirinha_sus = $carteirinha_sus;
    }

    public function getEndereco(): string {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): void {
        $this->endereco = $endereco;
    }

    public function getNumero(): int {
        return $this->numero;
    }

    public function setNumero(int $numero): void {
        $this->numero = $numero;
    }

    public function getCidade(): string {
        return $this->cidade;
    }

    public function setCidade(string $cidade): void {
        $this->cidade = $cidade;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    public function setEstado(string $estado): void {
        $this->estado = $estado;
    }

    public function getCep(): int {
        return $this->cep;
    }

    public function setCep(int $cep): void {
        $this->cep = $cep;
    }

    public function getSenha(): string {
        return $this->senha;
    }

    public function setSenha(string $senha): void {
        $this->senha = $senha;
    }

    public function getConfirmaSenha(): string {
        return $this->confirma_senha;
    }

    public function setConfirmaSenha(string $confirma_senha): void {
        $this->confirma_senha = $confirma_senha;
    }

}