<?php 
require "../autoload.php";
require "../vendor/autoload.php";
USE classes\DAO;

// Vendor
use Classes\Twig;
use helpers\DD; // To-do: Remover esta linha
use helpers\Redirect;

$twig = new Twig();
$redirect = new Redirect();

$credentials = [$_POST['name'], $_POST['email'], $_POST['pass']];
$verified = checkEmpty($credentials);

$login = new DAO();
$result = $login->select("usuario", "WHERE nome = '$verified[0]' AND email = '$verified[1]' AND senha = MD5('$verified[2]')" ,$conn);

// DD::dd($result);

if($result->personalUser != NULL){
    $renderizar = $twig->render("to-do.twig", ['meuNome' => $result->personalUser['nome'], 'tituloPagina' => "List", $_SESSION['idUser'] = $result->personalUser['id']]);
}

if($result->rows == 1 ){
    $redirect->redirect("../views/to-do.php");
} else {
    $redirect->redirect("../index.php") . $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuário não existe</div>";
}

// echo $result->rows == 1 ? $redirect->redirectTemplate("../views/to-do.php", $renderizar) : $redirect->redirect("../index.php") . $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuário não existe</div>";
?>