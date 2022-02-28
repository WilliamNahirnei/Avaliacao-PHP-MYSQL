<?php

    namespace src\repository;

    require_once('src\Database\databaseFunctions.php');

    class ProductRepository{

        public static function getProductById ($idProduct){
            $query = "select * from produtos where produtos.idprod=".$idProduct;
            $response = executeQuery($query);
            return mysqli_fetch_array($response);
        }

        public static function insertProduct ($nameProduct, $colorProduct){
            $query = "INSERT INTO produtos (idprod, nome, cor) VALUES (NULL, '".$nameProduct."', '".$colorProduct."')";
            $response = executeInsertQuery($query);
            return $response;
        }

        public static function updateProduct($idProduct, $nameProduct){
            $query = "UPDATE produtos SET nome = '".$nameProduct."' WHERE produtos.idprod =". $idProduct;
            $response = executeQuery($query);
            return $response;
        }

        public static function deleteProduct($idProduct) {
            $query = "DELETE FROM produtos WHERE produtos.idprod=".$idProduct;
            $response = executeQuery($query);
            return $response;
        }
    }

?>