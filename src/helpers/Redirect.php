<?php 
namespace helpers;

class Redirect
{
    public function redirect($path)
    {
        header("Location: $path");
    }

}


?>