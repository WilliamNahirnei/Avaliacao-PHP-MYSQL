<?php
    namespace src\Model;

    include('src\Repository\ProductRepository.php');

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

        public static function getProductById($idProduct){

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

        public function update($idProduct){

        }

        public function Delete($idProduct){

        }

    }
?>