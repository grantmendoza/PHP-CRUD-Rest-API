<?php
//based on https://fahmidasclassroom.com/create-simple-rest-api-crud-with-php-and-mysql/
//Date modified: 09/30/22 - Grant Mendoza
    $dbserver = "127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "apicruddb";

        $connect = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
        
        if ($connect === false)
            die("Error".mysqli_connect_error());
        else{
        }

?>  