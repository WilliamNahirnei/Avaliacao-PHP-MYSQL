<?php

    namespace Controller;

    require_once('./Server/Routes/RouteParams.php');
    require_once('./src/Services/ProductService.php');

    use Server\Routes\RouteParams;
    use src\Services\ProductService;

    class ProductController {

        static function insertProduct(){
            $productService = new ProductService();
            $data = $productService->insertProduct(RouteParams::$body);

            http_response_code(404);
            $Response = [
                'Message'=> "NotFound"
            ];
    
            $Response = json_encode($Response);
        }
    }
?>