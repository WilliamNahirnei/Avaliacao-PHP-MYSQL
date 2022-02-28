<?php
    namespace src\Services;

    require_once('./src/Model/Product.php');
    require_once('./src/Model/Price.php');

    require_once('src\Services\DiscountService.php');

    use src\Services\DiscountService;

use Controller\ProductController;
use src\Model\Price;
use src\Model\Product;

    class ProductService {
        public function getAllProducts(){

        }

        public function insertProduct($bodyParams){
            $response = [];
            $productName = $bodyParams->nameProduct;
            $productColor = $bodyParams->productColor;
            $price = $bodyParams->price;
            $product = new Product(
                0,
                $productName,
                $productColor,
            );
            if ($product->insert()) {
                $DiscountService = new DiscountService();
                $finalPrice = $DiscountService->calculateColorDiscount($productColor, $price);
                $price = new Price(0, $finalPrice, $product->idProduct);
                if ($price->insert()) {
                    $price->hasOne();
                    http_response_code(201);
                    $response['message'] = "Sucess create Price and Product";
                    $response['data'] = $price;
                    return $response;
                } else {
                    http_response_code(500);
                }
            } else {
                http_response_code(500);
            }
        }
                
        public function updateProductAndPrice($queryParams, $bodyParams){
    
        }
    }


?>