<?php 
require "../autoload.php";

use DAO\DAO;

$credentials = [$_POST['name'], $_POST['email'], $_POST['pass']];
$verified = checkEmpty($credentials);

$login = new DAO();
$result = $login->select("usuario", "WHERE nome = '$verified[0]' AND email = '$verified[1]' AND senha = MD5('$verified[2]')" ,$conn);

if($result->personalUser != NULL){
    $_SESSION['idUser'] = $result->personalUser["id"];
}


echo $result->rows == 1 ? header('Location: ../views/to-do.php') : header('Location: ../index.php') . $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuário não existe</div>";


?>