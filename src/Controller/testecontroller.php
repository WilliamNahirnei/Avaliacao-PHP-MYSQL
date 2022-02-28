<?php

    namespace Controller;

    require_once('./Server/Routes/RouteParams.php');
    use Server\Routes\RouteParams;
    use src\Services\ProductService;

    class testeController {

        static function testecontroler(){
            http_response_code(404);
            $Response = [
                'Message'=> "NotFound"
            ];
    
            $Response = json_encode($Response);
        }
    }
?>