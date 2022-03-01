<?php
    namespace src\Services;

    require_once('./src/Model/Product.php');
    require_once('./src/Model/Price.php');
    require_once('src\Repository\ProductRepository.php');
    require_once('src\Repository\PriceRepository.php');
    require_once('src\Services\DiscountService.php');

    use src\Services\DiscountService;
    use src\repository\ProductRepository;
    use src\repository\PriceRepository;


use Controller\ProductController;
use src\Model\Price;
use src\Model\Product;

    class ProductService {

        public function getProductPriceByIds($queryParams){
            $response = [];

            try{
                $productPriceList = [];

                $idProduct = $queryParams["idProduct"];
                $idPrice = $queryParams["idPrice"];
                $results = ProductRepository::getProductPriceByIds($idProduct, $idPrice);
                $result = mysqli_fetch_array($results);
                if($result){
                    $price = new Price($result['idpreco'], $result['preco'], $result['idprod']);
                    $product = new Product($result['idprod'], $result['nome'], $result['cor']);
                    $product->price = $price;

                    http_response_code(200);
                    $response['data'] = $product;
                    return $response;
                } else {
                    http_response_code(404);
                    $response['message'] = "Product And Price Not Found";
                    return $response;
                }
                    
            } catch (Exception $e) {
                http_response_code(200);
                $response['data'] = $e;
            }
        }

        public function getAllProductsWithPrice(){
            $response = [];

            try{
                $productPriceList = [];
                $results = ProductRepository::getAllProductWithPrice();
                while ($result = mysqli_fetch_array($results)){
                    $price = new Price($result['idpreco'], $result['preco'], $result['idprod']);
                    $product = new Product($result['idprod'], $result['nome'], $result['cor']);
                    $product->price = $price;
                    $productPriceList[] = $product; 
                }
                http_response_code(200);
                $response['data'] = $productPriceList;
                return $response;
            } catch (Exception $e) {
                http_response_code(200);
                $response['data'] = $e;
            }

        }

        public function insertProduct($bodyParams){
            $response = [];
            try{

                $productName = $bodyParams->nameProduct;
                $productColor = $bodyParams->productColor;
                $price = $bodyParams->price;
                $product = new Product(
                    0,
                    $productName,
                    $productColor,
                );
                if ($product->insert()) {
                    $DiscountService = new DiscountService();
                    $finalPrice = $DiscountService->calculateColorDiscount($productColor, $price);
                    $price = new Price(0, $finalPrice, $product->idProduct);
                    if ($price->insert()) {
                        $price->hasOne();
                        http_response_code(201);
                        $response['message'] = "Sucess create Price and Product";
                        $response['data'] = $price;
                        return $response;
                    } else {
                        http_response_code(500);
                    }
                } else {
                    http_response_code(500);
                }
            } catch (Exception $e) {
                http_response_code(200);
                $response['data'] = $e;
            }
        }

        public function updateProductAndPrice($queryParams, $bodyParams){
            $response = [];
            try{

                $idProduct = $queryParams["idProduct"];
                $idPrice = $queryParams["idPrice"];
                $productName = $bodyParams->nameProduct;
                $price = $bodyParams->price;

                $resultProductSeach = ProductRepository::getProductById($idProduct);
                if($resultProductSeach){
                    $product = new Product(
                        $idProduct,
                        $productName,
                        $resultProductSeach["cor"],
                    );

                    $productColor = $product->colorProduct;

                    if ($product->update()) {
                        $response['Message'][0] = "Update Product Sucess";
                    } else {
                        $response['Message'] = "Error in update product";
                        http_response_code(500);
                        return $response;
                    }

                } else {
                    http_response_code(404);
                    $response['message'] = "product not found";
                    return $response;
                }

                $resultPriceSeach = PriceRepository::getPriceById($idPrice);
                if($resultPriceSeach){
                    $DiscountService = new DiscountService();
                    $finalPrice = $DiscountService->calculateColorDiscount($productColor, $price);

                    $price = $price = new Price($idPrice, $finalPrice, $resultPriceSeach["idprod"]);
                    $productColor = $product->colorProduct;

                    if ($price->update()) {
                        $price->hasOne();
                        http_response_code(200);
                        $response['Message'][1] = "Update Price Sucess";
                        $response['data'] = $price;
                        return $response;
                    } else {
                        $response['Message'] = "Error in update Price";
                        http_response_code(500);
                        return $response;
                    }

                } else {
                    http_response_code(404);
                    $response['message'] = "Price not found";
                    return $response;
                }
            } catch (Exception $e) {
                http_response_code(200);
                $response['data'] = $e;
            }
        }

        public function deleteProductPrice($queryParams){
            $response = [];

            try{

                $idProduct = $queryParams["idProduct"];
                $idPrice = $queryParams["idPrice"];

                $resultPriceSeach = PriceRepository::getPriceById($idPrice);
                if($resultPriceSeach){

                    $price = $price = new Price($idPrice, 0, $resultPriceSeach["idprod"]);

                    if ($price->delete()) {
                        http_response_code(200);
                        $response['Message'][0] = "delete Price Sucess";
                    } else {
                        $response['Message'] = "Error in delete Price";
                        http_response_code(500);
                        return $response;
                    }
                } else {
                    http_response_code(404);
                    $response['message'] = "Price not found";
                    return $response;
                }

                $resultProductSeach = ProductRepository::getProductById($idProduct);
                if($resultProductSeach){
                    $product = new Product($idProduct, '', '', );

                    if ($product->delete()) {
                        $response['Message'][1] = "success delete product";
                    } else {
                        $response['Message'] = "Error in delete product";
                        http_response_code(500);
                        return $response;
                    }
                } else {
                    http_response_code(404);
                    $response['message'] = "product not found";
                    return $response;
                }

                return $response;

            } catch (Exception $e) {
                http_response_code(200);
                $response['data'] = $e;
            }

        }
    }
?>