<?php
//based on https://fahmidasclassroom.com/create-simple-rest-api-crud-with-php-and-mysql/
//Date modified: 09/30/22 - Grant Mendoza

// indicates whether the response can be shared with requesting code from the given origin.
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//response header specifies one or more methods allowed when accessing a resource in response to a preflight request.
header("Access-Control-Allow-Methods: POST");

//response header indicates how long the results of a preflight request (that is the information contained in 
//the Access-Control-Allow-Methods and Access-Control-Allow-Headers headers) can be cached.
header("Access-Control-Max-Age: 3600");

require_once '../api/database.php';
include_once '../CRUD.php';

$item = new Employee($connect);
// $item->name->singleEmployee();
$item->singleEmployee();


if($item->singleEmployee() != null){
    // create array
    $emp_arr = array(
    "id" => $item->id,
    "name" => $item->name,
    "email" => $item->email,
    "designation" => $item->designation,
    "created" => $item->created
    );
    
    http_response_code(200);
    echo json_encode($emp_arr);
    }
    else{
    http_response_code(404);
    echo json_encode("Employee not found.");
    }

    
?>

