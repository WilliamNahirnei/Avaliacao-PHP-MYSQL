<?php
    namespace src\Services;

    class DiscountService {
        private $colorDiscounts = [];
        
        function __construct(){
            self::$colorDiscounts["AZUL"] = function(float $price){
                $discountPercentage = 20;
                $priceWithDiscount = self::calculatePriceWithDiscount($price, $discountPercentage);
                return $priceWithDiscount; 
            };
            
            self::$colorDiscounts["VERMELHO"] = function(float $price){
                $discountPercentage = $price <= 50 ? 20 : 5;
                $priceWithDiscount = self::calculatePriceWithDiscount($price, $discountPercentage);
                return $priceWithDiscount; 
            };

            self::$colorDiscounts["AMARELO"] = function(float $price){
                $discountPercentage = 10;
                $priceWithDiscount = self::calculatePriceWithDiscount($price, $discountPercentage);
                return $priceWithDiscount; 
            };
        }
        
        private function calculatePriceWithDiscount(float $price, float $percentageDiscount): float{
            $percentagePrice = self::calculatePercentagePrice($percentageDiscount);
            $priceWithDiscount = $price * $percentagePrice;
            return $priceWithDiscount;
        }

        private function calculatePercentagePrice(float $percentageDiscount): float{
            $preparedPercenteDiscount = self::preparePercenteValue($percentageDiscount);
            $percentagePrice = 1 - $preparedPercenteDiscount;
            return $percentagePrice;
        }

        private function preparePercenteValue(float $percenteValue): float{
            $preparedPercenteValue = $percenteValue/100;
            return $preparedPercenteValue;
        }

    }
?>