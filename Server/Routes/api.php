<?php
    namespace Server\Routes;
    include_once('Server/Routes/Route.php');
    Route::get('teste',function (){
        print_r("TESTE FUncçõn");
    });
    Route::get('teste2','teste2');
?>