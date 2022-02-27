<?php
    namespace src\Services;

    class ProductService {
        const COLORFUNCTIONS = ARRAY();

        private static function calculateDiscountValue(int $value, float $percenteValue): float{
            $preparedPercenteValue = self::preparePercenteValue($percenteValue);
            $discountValue = $value - $preparedPercenteValue;
            return $discountValue;
        }

        private static function preparePercenteValue(float $percenteValue): float{
            $preparedPercenteValue = $percenteValue/100;
        }

    }
?>