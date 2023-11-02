<?php 
// require "database/connection.php";
require "helpers/validate.php";
// require "classes/DAO.php";

spl_autoload_register(function($Class){

    $path = str_replace('\\', '//' , $Class);

    require $path. ".php" ;

});

?>