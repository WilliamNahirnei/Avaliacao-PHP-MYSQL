<?php
    namespace src\Services;

    require_once('./src/Model/Product.php');
    include('./src/Database/conection.php');

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

            var_dump(conectDatabase());
        }
    }

?>