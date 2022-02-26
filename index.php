<?php
    require_once('./Config/server.php');
    require_once('./Server/Routes/api.php');
    use Server\Routes\Route;

    header('Content-Type: application/json');

    print_r(file_get_contents('php://input'));

    $route = $_SERVER["REQUEST_URI"];
    $route = str_replace(prefixApiUrl,'',$route);
?>