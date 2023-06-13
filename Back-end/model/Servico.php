<?php

class Servico
{
    public $id;
    public $nome;
    public $descricao;
    public $preco;

    function valid()
    {
        if ($this->nome == "" || $this->nome == null) {
            throw new Exception("Nome em branco!");
        }
        if ($this->descricao == "" || $this->descricao == null) {
            throw new Exception("Descrição em branco!");
        }
        if ($this->preco == "" || $this->preco == null) {
            throw new Exception("Preço em branco!");
        }
    }

    function mount(Object $dados)
    {
        $this->id = $dados->id;
        $this->nome = $dados->nome;
        $this->descricao = $dados->descricao;
        $this->preco = $dados->preco;
    }
}
