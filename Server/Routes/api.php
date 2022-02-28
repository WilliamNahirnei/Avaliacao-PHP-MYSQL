<?php
    namespace Server\Routes;

    
    include_once('Server/Routes/Route.php');
    require_once('./src/Controller/ProductController.php');
    use Controller\ProductController;

    Route::post('insertProduct',[ProductController::class, 'insertProduct']);
    Route::put('updateProductAndPrice',[ProductController::class, 'updateProductAndPrice']);
    Route::delete('DeleteProductPrice',[ProductController::class, 'deleteProductPrice']);
?>