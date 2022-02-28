<?php
    namespace src\Model;

    include('src\Repository/PriceRepository.php');

    use src\Repository\PriceRepository;

    class Price {
        public int $idPrice;
        public float $price;
        public int $idProduct;

        function __construct(int $idPrice, float $price, int $idProduct){
            $this->idPrice = $idPrice;
            $this->price = $price;
            $this->idProduct = $idProduct;
        }

        public function insert(){
            $response = PriceRepository::insertPrirce($this->price, $this->idProduct);

            if($response){
                $this->idPrice = $response;
                return true;
            } else {
                return false;
            }
        }

        public function update(){
            $response = PriceRepository::updatePrice($this->price, $this->idPrice);
            if($response){
                return true;
            } else {
                return false;
            }
        }

        public function Delete(){
            $response = PriceRepository::deletePrice($this->idPrice, $this->idProduct);
            if($response){
                return true;
            } else {
                return false;
            }
        }

        public function hasOne(){
            $response = PriceRepository::getProductPrice($this->idPrice);

            if ($response) {
                $this->product = new Product($response['idprod'], $response['nome'], $response['cor']);
                return true;
            } else
                return false;
        }

    }