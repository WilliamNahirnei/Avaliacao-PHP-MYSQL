<?php
    namespace src\Services;
    
    use src\Model\Product;

    class ProductService {
        public function getAllProducts(){

        }

        public function insertProduct($bodyParams){
            $price = 0;
            $product = new Product(
                0,
                $bodyParams["nameProduct"],
                $bodyParams["colorProduct"],
                $price
            );
        }
    }

?>