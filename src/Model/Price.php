<?php
    namespace src\Model;

use src\Services\ProductService;

    class Price {
        private int $idPrice;
        private float $price;
        private Product $product;

        function __construct(int $idPrice, float $price,Product $product){
            self::$idPrice;
            self::$price = $price;
            self::$product = $product;
        }

        public function insert(){

        }

        public function update($idProduct){

        }

        public function Delete($idProduct){

        }

    }