<?php 
session_start();
require "../vendor/autoload.php";

echo $_SESSION['template'];

/* use Helpers\Cache;

$cache = new Cache();
echo $cache->cacheMemory(); */

// use Classes\Twig;
// $twig = new Twig();

// echo $twig->render("to-do.twig", ['meuNome' => 'Rodrigo', 'tituloPagina' => "List", 'dados' => ['titulo1', 'descricao1', '2023-10-10', 'pendente']]);
// echo $twig->render("to-do.twig", ['meuNome' => 'Rodrigo', 'tituloPagina' => "List", 'dados' => [['titulo' => 'titulo1', 'descricao' => 'descricao1', 'data' => '2023-10-10', 'status' => 'pendente']]]);
?>