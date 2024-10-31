<?php

namespace Controller;

use Model\CategoriasModel;
use Model\VO\CategoriaVO;

final class CategoriaController extends Controller {

    public function list() {
        $model = new CategoriaModel();
        $data = $model->selectAll(new CategoriaVO());

        $this->loadView("listaCategorias", [
            "categorias" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new CategoriaModel();
            $vo = new CategoriaVO($id);
            $categoria = $model->selectOne($vo);
        } else {
            $categoria = new CategoriaVO();
        }

        $this->loadView("formCategoria", [
            "categoria" => $categoria
        ]);
    }

    public function save() {
        $id = $_POST["id"];

        $vo = new CategoriaVO($id, $_POST["nome"]);
        $model = new CategoriaModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("categorias.php");
    }

    public function remove() {
        $vo = new CategoriaVO($_GET["id"]);
        $model = new CategoriaModel();

        $result = $model->delete($vo);

        $this->redirect("categorias.php");
    }

}