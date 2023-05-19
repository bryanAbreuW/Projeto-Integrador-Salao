<?php

class Cliente
{
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $logradouro;
    public $numero_casa;
    public $bairro;
    public $cidade;
    public $uf;
    public $telefone;
    public $celular1;
    public $celular2;
    public $data_nasc;
    public $observacoes;

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
        if ($this->celular1 == "" || $this->celular1 == null) {
            throw new Exception("Celular em branco");
        }
    }

    function mount(Object $dados)
    {
        $this->id = $dados->matricula;
        $this->nome = $dados->nome;
        $this->email = $dados->email;
        $this->senha = $dados->senha;
        $this->data_nasc = $dados->data_nasc;
    }
}
