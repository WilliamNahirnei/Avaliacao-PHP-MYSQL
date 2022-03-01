
function insertProductInList(idProduct, nameProduct, colorProduct, priceProduct, idPrice){
    const productList = document.getElementById("productList")
    const visualProduct = document.createElement("tr")

    let visualProductName = document.createElement("td")
    let visualColorProduct = document.createElement("td")
    let visualPriceProduct = document.createElement("td")


    visualProductName.appendChild(document.createTextNode(nameProduct))
    visualColorProduct.appendChild(document.createTextNode(colorProduct))
    visualPriceProduct.appendChild(document.createTextNode(priceProduct))

    visualProduct.appendChild(visualProductName)
    visualProduct.appendChild(visualColorProduct)
    visualProduct.appendChild(visualPriceProduct)

    
    productList.appendChild(visualProduct)
}

function loadProductList(){
    response = getProductWithPriceList()
    console.log(response)

    response.data.forEach(element => {
        insertProductInList(element.idProduct, element.nameProduct, element.colorProduct, element.price.price, element.price.idPrice)

    });
}

function getProductWithPriceList(){
    let request = new XMLHttpRequest();
    request.open("GET", "http://localhost/Avaliacao-PHP-MYSQL/Api/getAllProductsWithPrice", false)
    request.send()
    response = JSON.parse(request.response)
    return response
}