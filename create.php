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
if(isset($_POST['id']))
$data = json_decode($_POST['data']);
else {
$data = json_decode(file_get_contents("php://input"));
}
$item->name = $data->name;
$item->vendor_id = $data->vendor_id;
$item->price = $data->price;
$item->category_id = $data->category_id;
$item->created = date('Y-m-d H:i:s');

if($item->createProduct()){
	echo 'Product created successfully.';
} else{
	echo 'Product could not be created.';
}
?> 
