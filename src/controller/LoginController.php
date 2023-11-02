<?php 
namespace Controller;

use Classes\DAO;
use Classes\Twig;
use Helpers\Redirect;
use Helpers\Session;

class LoginController
{
    public function login($data)
    {
        $login = new DAO();
        $twig = new Twig();
        $redirect = new Redirect();
        $result = $login->select("usuario", "WHERE nome = '$data[0]' AND email = '$data[1]' AND senha = MD5('$data[2]')");

        if($result != NULL){
            $_SESSION['template'] = $twig->render("to-do.twig", ['meuNome' => $result->nome, 'tituloPagina' => "List", $_SESSION['idUser'] = $result->id]);
            $redirect->redirect("../views/to-do.php");
        } else {
            $redirect->redirect("../index.php") . $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuário não existe</div>";
        }
    }
}
?>