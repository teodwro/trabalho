<?php

namespace Controller;

use Model\ProdutoModel;
use Model\VO\ProdutoVO;

final class ProdutosController extends Controller {

    public function list() {
        $model = new ProdutoModel();
        $data = $model->selectAll(new ProdutoVO());

        $this->loadView("listaProdutos", [
            "produtos" => $data   
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $modelProduto = new ProdutoModel();
            $vo = new ProdutoVO($id);
            $produto = $modelProduto->selectOne($vo);
        } else {
            $produto = new ProdutoVO();
        }

        $modelCategoria = new CategoriaModel();
        $categoria = $modelCategoria->selectAll(new CategoriaVO());

        $this->loadView("formProduto", [
            "produto" => $produto,
            "categoria" => $categoria
        ]);
    }

    public function save() {
        $id = $_POST["id"];

        $nomeArquivo = $this->uploadFile($_FILES["foto"]);

        $vo = new ProdutoVO($id, $_POST["nome"], $_POST["id_categoria"], $_POST["descricao"], $_POST["preco"],$nomeArquivo);
        $model = new ProdutoModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("produtos.php");
    }

    public function remove() {
        $vo = new ProdutoVO($_GET["id"]);
        $model = new ProdutoModel();

        $result = $model->delete($vo);

        $this->redirect("produtos.php");
    }

}