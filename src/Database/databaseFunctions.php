<?php
include("Config\database.php");

function conectDatabase(){
    $mysqli_connection = new MySQLi(HOST, USUARIO, SENHA, BASE);
    if($mysqli_connection->connect_error){
        throw new Exception("Database error Erro: " . $mysqli_connection->connect_error);
    }else{
        $mysqli_connection->set_charset("utf8");
       return $mysqli_connection;
    }
}

function executeQuery($query){
    $conection = conectDatabase();
    $response = $conection->query($query);
    return $response;
}

function executeInsertQuery($query){
    $conection = conectDatabase();
    $response = $conection->query($query);
    $response = mysqli_insert_id($conection);
    return $response;
}

?>