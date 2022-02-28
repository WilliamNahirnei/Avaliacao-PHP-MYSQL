<?php

namespace src\repository;

include('src\Database\databaseFunctions.php');

class ProductRepository{

    public static function insertProduct ($nameProduct, $colorProduct){
        $query = "INSERT INTO produtos (idprod, nome, cor) VALUES (NULL, '".$nameProduct."', '".$colorProduct."')";
        $response = executeInsertQuery($query);
        return $response;
    }
}

?>