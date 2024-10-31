<?php

namespace Controller;

use Model\UsuarioModel;
use Model\VO\UsuarioVO;

final class UsuarioController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function list() {
        $model = new UsuarioModel();
        $data = $model->selectAll(new UsuarioVO());

        $this->loadView("listaUsuarios", [
            "usuarios" => $data
        ]);
    }
    public function form(){
        $id = $_GET['id'] ?? 0;

        if(empty($id)){
            $vo = new UsuarioVO();
        } else {
            $model = new UsuarioModel();
            $vo = $model->selectOne(new UsuarioVO($id));
        }
        $this->loadView("formUsuario", [
            "usuarios" => $vo
        ]);
    }
        
    public function save() {
        $id = $_POST['id'];
        $model = new UsuarioModel();

        $vo = new UsuarioVO($id, $_POST['login'], $_POST['senha']);
        
        if(empty($id)){
            $result = $model->insert($vo);
        }else{
            $result = $model->update($vo);
        }

        $this->redirect("usuarios.php");
    }

    public function remove() {
        $model = new UsuarioModel();
        $model->delete(new UsuarioVO($_GET['id']));
        $this->redirect("usuarios.php");
    }
}