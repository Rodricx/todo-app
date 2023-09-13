<?php 
require "../autoload.php";

USE classes\DAO;


$user = [$_POST['user'], $_POST['email'], $_POST['pass']];

$insert = new DAO();
$insert->insert("usuario", "nome, email, senha", "'$user[0]', '$user[1]', MD5('$user[2]')",$conn);
$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
Usuário cadastrado com sucesso !
</div>";

header('Location: ../index.php');


?>