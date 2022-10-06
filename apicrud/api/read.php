<?php
//based on https://fahmidasclassroom.com/create-simple-rest-api-crud-with-php-and-mysql/
//Date modified: 09/30/22 - Grant Mendoza

// indicates whether the response can be shared with requesting code from the given origin.
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../api/database.php';
include_once '../CRUD.php';

//Database class in database.php
// $database = new Database();

//getConnection function in database.php
// $connect = $database->getConnection();

//Employee class from CRUD.php
$items = new Employee($connect);

//getEmployees function from CRUD.php
$records = $items->getEmployees();

//number of rows needed in getEmployees
$itemCount = $records->num_rows;

//json_encode - Returns the JSON representation of a value
// echo json_encode($itemCount);

//Study - https://www.php.net/manual/en/language.types.array.php*** 
if($itemCount > 0){
    $employeeArr = array();
    $employeeArr["body"] = array();
    // $employeeArr["itemCount"] = $itemCount;

    while ($row = $records->fetch_assoc())
    {
        array_push($employeeArr["body"], $row);
    }
        echo json_encode($employeeArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
        array("message" => "No record found.")
        );
        }
?>