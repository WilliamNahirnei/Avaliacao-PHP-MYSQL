<?php

namespace src\repository;

require_once('src\Database\databaseFunctions.php');

class PriceRepository{

    public static function insertPrirce ($price, $idProduct){
        $query = "INSERT INTO preco (idpreco, preco, idprod) VALUES (NULL, '".$price."', '".$idProduct."')";
        $response = executeInsertQuery($query);
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