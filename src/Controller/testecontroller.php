<?php

    namespace Controller;

    require_once('./Server/Routes/RouteParams.php');
    use Server\Routes\RouteParams;

    class testeController {

        static function testecontroler(){
            print_r(RouteParams::$query);
            http_response_code(404);
            $Response = [
                'Message'=> "NotFound"
            ];
    
            $Response = json_encode($Response);
        }
    }
?>