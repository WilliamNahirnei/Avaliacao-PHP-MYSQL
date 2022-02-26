<?php
    namespace Server\Routes;

    
    include_once('Server/Routes/Route.php');
    require_once('./src/Controller/testecontroller.php');
    use Controller\testeController;


    Route::get("teste", [testeController::class, 'testecontroler']);
?>