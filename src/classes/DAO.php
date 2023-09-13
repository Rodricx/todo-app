<?php 
namespace classes;

class DAO {

    public function selectAll($table, $args, $dbconn){
        $result = $dbconn->query("SELECT * FROM $table $args");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $dbconn->close();

        return $data;
    }

    public function select($table, $args, $dbconn){
        $result = $dbconn->query("SELECT * FROM $table $args");
        $data = (object) ['personalUser' => $result->fetch_assoc(), 'rows' => $result->num_rows];
        $dbconn->close();

        return $data;
    }

    public function delete($table, $args, $dbconn){
        $result = $dbconn->query("DELETE FROM $table $args");
        $dbconn->close();
    }
    
    public function update($table, $args, $dbconn){
        $result = $dbconn->query("UPDATE $table $args");
    }
    
    public function insert($table, $fields, $args, $dbconn){
        $result = $dbconn->query("INSERT INTO $table($fields) VALUES($args)");
        $dbconn->close();
    }

}

?>