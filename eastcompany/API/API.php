<?php
include("Product.php");
include("arrays.php");
header('Content-Type: application/json');
$products = array();

$limit = 0;
// get the parameter "limit" if its set and assign
// its value to $limit variable, els set $limit to 10

if (isset($_GET['limit']) && $_GET['limit'] !="") {
    	$limit = $_GET['limit'];
}
else {
    $limit = 10;
}

// check if $limit is between 1 and 10 and is an int
if($limit < 1 || $limit > 10 || !is_numeric($limit)){
    $error['error'] = "Invalid value for limit parameter";
    
    echo json_encode($error);
}
else {
    //gör 10 produktobjekt och stoppar dom i en array
    for ($i = 0; $i < $limit; $i++) {
        $name = $productNames[$i];
        $price = $productPrices[$i];
        $image = "http://localhost/eastcompany/API/images/$i.jpg";
        $product = new Product($name, $image, $price);
        array_push($products, $product->toArray());
    }

    echo json_encode($products);
}
