<?php
    namespace src\Model;

    require_once('src\Repository\ProductRepository.php');

    use src\Model\Price;
    use src\repository\ProductRepository;

    class Product {
        public int $idProduct = 0;
        public string $nameProduct = "";
        public string $colorProduct = "";

        function __construct(int $idProduct, string $nameProduct, string $colorProduct){
            $this->idProduct = $idProduct;
            $this->nameProduct = $nameProduct;
            $this->colorProduct = $colorProduct;
        }

        public function insert(){
            $response = ProductRepository::insertProduct($this->nameProduct, $this->colorProduct);

            if($response){
                $this->idProduct = $response;
                return true;
            } else {
                return false;
            }
        }

        public function update(){
            $response = ProductRepository::updateProduct($this->idProduct, $this->nameProduct);

            if($response){
                return true;
            } else {
                return false;
            }
        }

        public function Delete(){
            $response = ProductRepository::deleteProduct($this->idProduct);
            
            if($response){
                return true;
            } else {
                return false;
            }
        }

    }
?>