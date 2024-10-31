<?php

namespace Controller;

abstract class Controller {

    public function __construct($obrigaLogin = true){
        session_start();

        if($obrigaLogin) {
            if(!isset($_SESSION["usuario"])) {
                $this->redirect("login.php");
                exit;
            }
        }        
    }

    public function redirect($url) {
        header("Location: " . $url);
    }

    public function loadView($view, $data = []) {
        extract($data);
        include("views/" . $view . ".php");
    }

    public function uploadFile ($file) {
        if(empty($file["name"])) {
            return "";
        }

        $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . "." . $extension;
        move_uploaded_file($file["tmp_name"], "uploads/" . $nomeArquivo);

        return $nomeArquivo;
    }
}