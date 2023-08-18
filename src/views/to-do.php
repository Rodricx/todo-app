<?php 
require "../autoload.php";


$idUser = $_SESSION['idUser'];
$orderBy = isset($_SESSION['orderBy']) ? $_SESSION['orderBy'] : $idUser;




 USE DAO\DAO;

 $ToDo = new DAO();
 $result = $ToDo->selectAll("tarefa", "WHERE idUsuario = $orderBy",$conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <title>To-do</title>

    <style>
        .remove-btn-style{
            background-color: transparent;
            font-weight: bold;
            border: none;
        }
    </style>

</head>
<body>

            <div class="container mt-5 pt-5">
                <div class="table-responsive-md"></div>

                        <h1>Lista de tarefas</h1>
                        <a href="../cadastrarUsuario.php">Cadastrar usuário</a>
                        <form action="../app/update_todo.php" method="POST">

                            <table class="table table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th><button class="remove-btn-style" type="submit" value="dataDeCriacao" name="fieldDataCriacao">Data Criação</button></th>
                                    <th><button class="remove-btn-style" type="submit" value="status" name="fieldStatus">Status</button></th>
                                    <th>Ação</th>
                                </thead>

                                <tbody style=' flex-direction: column; flex-wrap: wrap;'>

                                        <?php 

                                            foreach($result as $res){
                                                $idTarefa = $res['idTarefa'];
                                                $check = $res['tarefaStatus'] == "pendente" ? "<input type='checkbox' name='checar[$idTarefa]' class='form-check-input' style=' width: 25px; height: 25px;'>" : "";
                                                
                                                if(isset($_SESSION['editar']) && $_SESSION['editar'] == $res['idTarefa']){
                                                    $pendente = $res['tarefaStatus'] == 'pendente' ? 'selected' : '';
                                                    $concluido = $res['tarefaStatus'] == 'concluida' ? 'selected' : '';

                                                    echo "<tr style=' flex-direction: column; flex-wrap: wrap;'><td style=' flex-direction: column; flex-wrap: wrap;'>". $check ."</td><td><input type='text' name='save[]' value='".$res['titulo']."' class='form-control'></td><td><input type='text' name='save[]' value='".$res['descricao']."' class='form-control'></td><td><input type='date' name='save[]' value='".$res['dataCriacao']."' class='form-control'></td><td><select class='form-control' name='save[]'></option><option value='1' ".$pendente.">pendente</option><option value='2' ".$concluido.">concluida</option></select></td><td><button type='submit' value='".$idTarefa."' class='btn btn-success' name='save[]'><i class='bi bi-check2-square'></i></button></td><td><button type='submit' class='btn btn-danger' value='".$idTarefa."' name='del[]'><i class='bi bi-trash'></i></button></td></tr>";
                                                } else {
                                                    echo "<tr style=' flex-direction: column; flex-wrap: wrap;'><td style=' flex-direction: column; flex-wrap: wrap;'>". $check ."</td><td>".$res['titulo']."</td><td>".$res['descricao']."</td><td>". date("d/m/Y", strtotime($res['dataCriacao']))."</td><td>".$res['tarefaStatus']."</td><td><button type='submit' class='btn btn-warning' name='edit[$idTarefa]'><i class='bi bi-pencil-square'></i></button></td><td><button type='submit' class='btn btn-danger' name='del[$idTarefa]'><i class='bi bi-trash'></i></button></td></tr>";
                                                }
                                                
                                                
                                            }


                                        ?>
                                        <tr><td colspan="2"><input type="text" class="form-control" name="novaTarefa[]" placeholder="Título..."></td><td><input type="text" class="form-control" name="novaTarefa[]" placeholder="descrição..."></td><td><input type="date" class="form-control" name="novaTarefa[]"></td><td><select class="form-control" name="novaTarefa[]"><option value="" data-default disabled selected></option><option value="1">pendente<option><option value="2">concluida<option></select></td><td><button type="submit" name="novaTarefa[]" value="<?= $idUser;?>" class="btn btn-success">NOVA TAREFA</button></td></tr>
                                </tbody>
                            </table>
                            <input type="submit" value="ATUALIZAR TAREFAS" class="btn btn-success"> 
                        </form>
                </div>
            </div>
</body>
</html>