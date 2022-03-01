<?php
    require_once('./Config/server.php');
    require_once('./Server/Routes/api.php');
    require_once('./Server/Routes/RouteParams.php');
    
    use Server\Routes\Route;
    use Server\Routes\RouteParams;

    header("Content-type: application/json; charset=utf-8");

    $totalRoute = $_SERVER["QUERY_STRING"];
    
    //take route prefix
    $prefix = explode('=',substr($totalRoute,0,7))[1];
    if($prefix != "Api"){
        http_response_code(404);
        $Response = [
            'Message'=> "Api NotFound"
        ];

        $Response = json_encode($Response);
        echo $Response;
    } else{
        $route = $_REQUEST["url"];
        //Remove toute prefix
        $route = str_replace('Api/','' ,$route);

        //take request body
        $bodyJson = file_get_contents('php://input');
    
        $method = $_SERVER["REQUEST_METHOD"];
    
        RouteParams::mountQuery($_REQUEST);
        RouteParams::mountBody($bodyJson);
        
        if (array_key_exists($route,Route::fecthRouteList()[$method])){
            $class = Route::fecthRouteList()[$method][$route][0];
            $method = Route::fecthRouteList()[$method][$route][1];
            echo call_user_func(array($class, $method)); 
        } else {
            http_response_code(404);
            $Response = [
                'Message'=> "NotFound"
            ];
    
            $Response = json_encode($Response);
            echo $Response;
        }
    }
?>