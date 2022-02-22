<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '/config.php';
include_once '../class/Products.php';

$database = new Database();
$db = $database->getConnection();

$item = new Product($db);

$data = json_decode(file_get_contents("php://input"));

$item->id = $data->id;

// Product values
$item->name = $data->name;
$item->email = $data->email;
$item->age = $data->age;
$item->designation = $data->designation;
$item->created = date('Y-m-d H:i:s');

if($item->updateProduct()){
	echo json_encode("Product data updated.");
} else{
	echo json_encode("Data could not be updated");
}
?> 
