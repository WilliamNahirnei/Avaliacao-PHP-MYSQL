<?php
    namespace Server\Routes;

    
    include_once('Server/Routes/Route.php');
    require_once('./src/Controller/testecontroller.php');
    require_once('./src/Controller/ProductController.php');
    use Controller\ProductController;
    use Controller\testeController;


    Route::get("teste", [testeController::class, 'testecontroler']);

    Route::post('insertProduct',[ProductController::class, 'insertProduct']);
?>