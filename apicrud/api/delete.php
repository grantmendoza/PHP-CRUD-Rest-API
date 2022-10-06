<?php
//based on https://fahmidasclassroom.com/create-simple-rest-api-crud-with-php-and-mysql/
//Date modified: 09/30/22 - Grant Mendoza
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// require_once '../api/database.php';
include_once '../CRUD.php';

// if (isset($_GET['id']));
$item = new Employee($connect);

if($item->deleteEmployee()){
echo json_encode("Employee deleted.");
} else{
echo json_encode("Data could not be deleted");
}
?>
