<?php 
require "autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <title>Cadastrar usuário</title>
</head>
<body>
    <div class="container mt-5 pt-5 col-md-5 mx-auto col-lg-8">        

                <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg'];}?>

                <form action="app/cad_usuario.php" method="POST" class="p-4 p-md-5 border rounded-3  bg-light d-flex flex-wrap">
                    <h1>Cadastrar Usuário</h1>
                        <div class="d-flex flex-wrap">
                            <div class="mb-3">
                                <input type="text" name="user" class="form-control" placeholder="Usuário ...">
                            </div>
                                
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email ...">
                            </div>

                            <div class="mb-3">
                                <input type="password" name="pass" class="form-control" placeholder="Senha ...">
                            </div>

                            <div class="mb-3">                            
                                <input type="submit" value="CADASTRAR" class="btn btn-success">
                            </div>
                        </div>
                    
                </form>
    </div>
</body>
</html>