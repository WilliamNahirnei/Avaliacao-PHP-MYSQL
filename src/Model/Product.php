<?php
    namespace src\Model;

use src\Services\ProductService;

    class Product {
        private int $idProduct;
        private string $nameProduct;
        private string $colorProduct;
        private Price $price;

        function __construct(int $idProduct, string $nameProduct, string $colorProduct, Price $price){
            self::$idProduct;
            self::$nameProduct;
            self::$idProduct;
            self::$price = $price;
        }

        public static function getProductById($idProduct){

        }
        public function insert(){

        }

        public function update($idProduct){

        }

        public function Delete($idProduct){

        }

    }