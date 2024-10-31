<?php

namespace Controller;

use Model\UsuarioModel;
use Model\VO\UsuarioVO;

final class LoginController extends Controller {

    public function __construct() {
        parent::__construct(false);
    }

    public function login() {
        $this->loadView("login");
    }

    public function fazerLogin(){
        $vo = new UsuarioVO(0, $_POST['login'], $_POST['senha']);
        $model = new UsuarioModel();
        $result = $model->doLogin($vo);

        if(empty($result)){
            $this->redirect("login.php");
        }else {
            $this->redirect("index.php");
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect("login.php");
    }
}