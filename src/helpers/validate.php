<?php 
// session_start();

function checkEmpty($fields){
    foreach($fields as $field){
        if(empty(htmlspecialchars($field))){
            $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Preencha corretamente todos os campos !</div>";
            header("location: ../index.php");
            die();
        } else {
            $data[] = $field;
        }

    }

    return $data;
} 

?>