<?php

namespace src\repository;

require_once('src\Database\databaseFunctions.php');

class PriceRepository{

    public static function getPriceById ($idPrice){
        $query = "select * from preco where preco.idpreco=".$idPrice;
        $response = executeQuery($query);
        return mysqli_fetch_array($response);
    }

    public static function insertPrirce ($price, $idProduct){
        $query = "INSERT INTO preco (idpreco, preco, idprod) VALUES (NULL, '".$price."', '".$idProduct."')";
        $response = executeInsertQuery($query);
        return $response;
    }

    public static function updatePrice($price, $idPrice) {
        $query = "UPDATE preco SET preco = '".$price."' WHERE preco.idpreco =".$idPrice;
        $response = executeQuery($query);
        return $response;
    }

    public static function deletePrice($idPrice, $idProduct) {
        $query = "DELETE FROM preco WHERE preco.idpreco=".$idPrice." AND preco.idprod = ".$idProduct;
        $response = executeQuery($query);
        return $response;
    }

    public static function getProductPrice($idPrice){
        $query = "SELECT * FROM preco
        JOIN produtos on preco.idprod = produtos.idprod
        WHERE preco.idpreco = ".$idPrice;

        $response = executeQuery($query);
        return mysqli_fetch_array($response);
    }
}

?>