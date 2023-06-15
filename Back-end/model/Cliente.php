<?php

class Cliente
{
    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $senha;
    public $data_nascimento;
    public $observacao;

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

    function mount(Object $dados)
    {
        $this->id = $dados->id;
        $this->nome = $dados->nome;
        $this->email = $dados->email;
        $this->telefone = $dados->telefone;
        $this->senha = $dados->senha;
        $this->data_nascimento = $dados->data_nascimento;
        $this->observacao = $dados->observacao;

    }
}