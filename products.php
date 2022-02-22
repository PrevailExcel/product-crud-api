<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'config.php';
include_once 'Classes/Product.php';
$database = new Database();
$db = $database->getConnection();
$items = new Product($db);
$stmt = $items->getProducts();
$productsCount = $stmt->rowCount();

echo json_encode($productsCount);
if($productsCount > 0){
	
	$productArr = array();
	$productArr["body"] = array();
	$productArr["productsCount"] = $productsCount;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$e = array(
			"id" => $id,
			"name" => $name,
			"vendor_id" => $vendor_id,
			"price" => $price,
			"category_id" => $category_id,
			"created" => $created
			);
			array_push($productArr["body"], $e);
	}
	echo json_encode($productArr);
}
else{
	http_response_code(404);
	echo json_encode(
		array("message" => "No record found.")
		);
}
?> 
