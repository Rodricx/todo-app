<?php 
session_start();
require "../autoload.php";
require "../vendor/autoload.php";
USE Classes\DAO;

// Vendor
use Classes\Twig;
use Helpers\DD; // To-do: Remover esta linha
use Helpers\Redirect;
use Helpers\Cache;

use Controller\LoginController;


// $twig = new Twig();
// $redirect = new Redirect();

// $credentials = [$_POST['name'], $_POST['email'], $_POST['pass']];
// $verified = checkEmpty($credentials);


// $login = new DAO();
// $result = $login->select("usuario", "WHERE nome = '$verified[0]' AND email = '$verified[1]' AND senha = MD5('$verified[2]')");

// if($result != NULL){
//     $_SESSION['template'] = $twig->render("to-do.twig", ['meuNome' => $result->nome, 'tituloPagina' => "ListTeste", $_SESSION['idUser'] = $result->id]);
//     $redirect->redirect("../views/to-do.php");
// } else {
//     $redirect->redirect("../index.php") . $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuário não existe</div>";
// }

$credentials = [$_POST['name'], $_POST['email'], $_POST['pass']];
$verified = checkEmpty($credentials);

$logar = new LoginController();
$logar->login($verified);
?>