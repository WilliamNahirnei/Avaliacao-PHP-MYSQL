<?php
    require_once('./Config/server.php');
    require_once('./Server/Routes/api.php');
    use Server\Routes\Route;

    print_r(Route::fecthRouteList());
    header('Content-Type: application/json');
    $route = $_SERVER["REQUEST_URI"];
    $route = str_replace(prefixApiUrl,'',$route);
?>