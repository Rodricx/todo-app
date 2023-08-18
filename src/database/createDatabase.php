<?php 

$conex = new mysqli("dbMysql", "root", "root");
$conex->query("CREATE DATABASE IF NOT EXISTS toDoDatabase");
require "connection.php";

$conn->query("CREATE TABLE IF NOT EXISTS usuario(
	id INT PRIMARY KEY AUTO_INCREMENT
    ,nome  VARCHAR(12) NOT NULL
    ,email VARCHAR(35) NOT NULL
    ,senha VARCHAR(100) NOT NULL
)");

$conn->query("CREATE TABLE IF NOT EXISTS tarefa(
	idTarefa INT PRIMARY KEY AUTO_INCREMENT
    ,titulo VARCHAR(15) NOT NULL
    ,descricao VARCHAR(100) NOT NULL
    ,dataCriacao DATE NOT NULL
    ,tarefaStatus ENUM('pendente', 'concluida')
    ,idUsuario INT NOT NULL
    ,CONSTRAINT fkTarefa FOREIGN KEY (idUsuario) REFERENCES usuario(id)
)");

?>