<?php

namespace Model\VO;

final class ProdutoVO extends VO {

    private $id_categoria;
    private $categoria;
    private $nome;
    private $descricao;
    private $preco;
    private $foto;

    public function __construct($id = 0, $id_categoria = 0, $categoria = "", $nome = "", $descricao = "", $preco = 0, $foto = "") {
        parent::__construct($id);
        $this->id_categoria = $id_categoria;
        $this->categoria = $categoria;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->foto = $foto;
    }

    public function getIdCategoria() {
        return $this->id_categoria;
    }

    public function setIdCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getPreco() {
        return $this->preco;
    }
    
    public function setPreco($preco) {
        $this->preco = $preco;
    }
    
    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

}