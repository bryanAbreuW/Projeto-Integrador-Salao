<?php

class Cliente
{
    public int $id;
    public string $nome;
    public string $email;
    public string $telefone;
    public string $senha;
    public string $data_nascimento;
    public string $observacao;
    public bool $ativo;
    public bool $validado;
    public string $roles;

    function valid()
    {
        if ($this->nome == "" || $this->nome == null) {
            throw new Exception("Nome em branco!");
        }
        if ($this->email == "" || $this->email == null) {
            throw new Exception("E-mail em branco!");
        }
        if ($this->senha == "" || $this->senha == null) {
            throw new Exception("Senha em branco!");
        }
    }

    function mount($dados) //POJO
    {
        $this->id = isset($dados, $dados->id) ? $dados->id : 0;
        $this->nome = isset($dados, $dados->nome) ? $dados->nome : null;
        $this->email = isset($dados, $dados->email) ? $dados->email : null;
        $this->telefone = isset($dados, $dados->telefone) ? $dados->telefone : null;
        $this->senha = isset($dados, $dados->senha) ? $dados->senha : null;
        $this->data_nascimento = isset($dados, $dados->data_nascimento) ? $dados->data_nascimento : null;
        $this->observacao = isset($dados, $dados->observacao) ? $dados->observacao : null;
        // $this->ativo =  $dados->ativo;
        // $this->validado =  $dados->validado;
        //$this->roles =  $dados->roles;
    }
}
