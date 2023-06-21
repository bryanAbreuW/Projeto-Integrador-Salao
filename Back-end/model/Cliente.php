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

    function mount(Object $dados) //POJO
    {
        $this->id = $dados->id;
        $this->nome = $dados->nome;
        $this->email = $dados->email;
        $this->telefone = $dados->telefone;
        $this->senha = $dados->senha;
        $this->data_nascimento = $dados->data_nascimento;
        $this->observacao = $dados->observacao;
        // $this->ativo =  $dados->ativo;
        // $this->validado =  $dados->validado;
        // $this->roles =  $dados->roles;
    }
}
