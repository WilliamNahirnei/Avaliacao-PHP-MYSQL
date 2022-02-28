<?php

    namespace Controller;

    require_once('./Server/Routes/RouteParams.php');
    require_once('./src/Services/ProductService.php');

use Server\Routes\Route;
use Server\Routes\RouteParams;
    use src\Services\ProductService;

    class ProductController {

        static function insertProduct(){
            $productService = new ProductService();
            $data = $productService->insertProduct(RouteParams::$body);
            return json_encode($data);
        }

        static function updateProductAndPrice(){
            $productService = new ProductService();
            $data = $productService->updateProductAndPrice(RouteParams::$query, RouteParams::$body);
            return json_encode($data);
        }
    }
?>