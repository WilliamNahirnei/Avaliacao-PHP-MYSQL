<?php
    namespace src\Services;

    require_once('./src/Model/Product.php');
    require_once('src\Services\DiscountService.php');

    use src\Services\DiscountService;

use Controller\ProductController;
use src\Model\Product;

    class ProductService {
        public function getAllProducts(){

        }

        public function insertProduct($bodyParams){
            $productName = $bodyParams->nameProduct;
            $productColor = $bodyParams->productColor;
            $product = new Product(
                0,
                $productName,
                $productColor,
                null
            );
            if ($product->insert()) {
                $DiscountService = new DiscountService();
                $finalPrice = $DiscountService->calculateColorDiscount($productColor);
                var_dump($finalPrice);
            }
        }
    }

?>