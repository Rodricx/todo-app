<?php 
namespace Classes;
// require "../vendor/autoload.php";
// require "../database/DataBase.php";

use Database\DataBase;

class DAO extends DataBase {

    public function selectAll($table, $args){
        $this->connection();
        $result = $this->conn->query("SELECT * FROM $table $args");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $this->conn->close();

        return $data;
    }

    public function select($table, $args){
        $result = $this->connection()->query("SELECT * FROM $table $args")->fetch_object();
        // $data = $result->fetch_assoc(); // Reajustar esta linha
        $this->connection()->close();

        // return $data;
        return $result;
    }

    public function delete($table, $args){
        $result = $this->conn->query("DELETE FROM $table $args");
        $this->conn->close();
    }
    
    public function update($table, $args){
        $result = $this->conn->query("UPDATE $table $args");
    }
    
    public function insert($table, $fields, $args){
        $result = $this->conn->query("INSERT INTO $table($fields) VALUES($args)");
        $this->conn->close();
    }

}

/* $x = new DAO();
var_dump($x->select("usuario", "where nome = 'deox' AND email='deox@email.com' AND senha=MD5('d123')")); */

?>