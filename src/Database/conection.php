<?php
include("Config\database.php");

function conectDatabase(){
    $mysqli_connection = new MySQLi(HOST, USUARIO, SENHA, BASE);
    if($mysqli_connection->connect_error){
        throw new Exception("Database error Erro: " . $mysqli_connection->connect_error);
    }else{
       return $mysqli_connection;
    }
}
?>