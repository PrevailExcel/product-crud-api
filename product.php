<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once 'config.php';
include_once 'Classes/Product.php';
$database = new Database();
$db = $database->getConnection();
$item = new Product($db);
$data = json_decode(file_get_contents("php://input"));
if(isset($_POST['id']))
$item->id = isset($_POST['id']) ? $_POST['id'] : die();
else
$item->id = $data->id;
$item->getOneProduct();
if($item->name != null){
	// create array
	$emp_arr = array(
		"id" =>  $item->id,
		"name" => $item->name,
		"vendor_id" => $item->vendor_id,
		"price" => $item->price,
		"category_id" => $item->category_id,
		"created" => $item->created
		);
		
		http_response_code(200);
		echo json_encode($emp_arr);
}

else{
	http_response_code(404);
	echo json_encode("Product not found.");
}
?> 
