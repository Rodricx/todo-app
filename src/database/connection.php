<?php 
// O host terá o nome do container
$crd = (object) ['host' => 'dbMysql', 'user' => 'root', 'password' => 'root', 'database' => 'toDoDatabase'];

$conn = new mysqli($crd->host, $crd->user, $crd->password, $crd->database);
$conn->set_charset('utf8mb4');

if(!$conn){
    die("Connection failed: " . $conn->connect_error);
}

?>