<?php 
require "../autoload.php";


USE classes\DAO;

if(isset($_POST['checar'])){
    $noEmpty = array_keys($_POST['checar']);
    
    foreach($noEmpty as $value){
        $update = new DAO();
        $update->update("tarefa", "SET tarefaStatus = 2 WHERE idTarefa = '$value'", $conn);
    }

    header("Location: ../views/to-do.php");
}


if(!empty($_POST['del'])){
    $noEmpty = array_keys($_POST['del']);

    $delete = new DAO();
    $delete->delete("tarefa", "WHERE idTarefa = $noEmpty[0]", $conn);

    header("Location: ../views/to-do.php");
}

if(!empty($_POST['novaTarefa'][4])){
    $noEmpty = array_values($_POST['novaTarefa']);
    
    $insert = new DAO();
    $insert->insert("tarefa", "titulo, descricao, dataCriacao, tarefaStatus, idUsuario", "'$noEmpty[0]', '$noEmpty[1]', '$noEmpty[2]', $noEmpty[3], '$noEmpty[4]'", $conn);

    header("Location: ../views/to-do.php");
    
}

if(isset($_POST['edit'])){
    $key = array_keys($_POST['edit']);
    $_SESSION['editar'] = $key[0];
    
    header("Location: ../views/to-do.php");
}

if(isset($_POST['save'])){
    $values = array_values($_POST['save']);
    
    $update = new DAO();
    $update->update("tarefa", "SET titulo = '$values[0]', descricao = '$values[1]', dataCriacao = '$values[2]', tarefaStatus = '$values[3]' WHERE idTarefa = '$values[4]' ",$conn);
    unset($_SESSION['editar']);
    header("Location: ../views/to-do.php");
}

if(isset($_POST['fieldStatus'])){
    $_SESSION['orderBy'] = "";
    $_SESSION['orderBy'] = $_SESSION['idUser'] . " ORDER BY tarefaStatus ASC";
    header("Location: ../views/to-do.php");
}

if(isset($_POST['fieldDataCriacao'])){
    $_SESSION['orderBy'] = "";
    $_SESSION['orderBy'] = $_SESSION['idUser'] . " ORDER BY dataCriacao ASC";
    header("Location: ../views/to-do.php");
}
?>