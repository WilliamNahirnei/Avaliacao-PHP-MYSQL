<?php
    namespace src\Model;
    use src\Model\Price;
    
    class Product {
        public int $idProduct = 0;
        public string $nameProduct = "";
        public string $colorProduct = "";
        public $price= null;

        function __construct(int $idProduct, string $nameProduct, string $colorProduct, $price){
            $this->idProduct = $idProduct;
            $this->nameProduct = $nameProduct;
            $this->colorProduct = $colorProduct;
            $this->price = $price;
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
?>