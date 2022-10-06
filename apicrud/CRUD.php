<?php
//based on https://fahmidasclassroom.com/create-simple-rest-api-crud-with-php-and-mysql/
//Date modified: 09/30/22 - Grant Mendoza

require ("../api/database.php");




class Employee{

    
    // $connect = $database->getConnection();

    private $connect;
    //db from database
    //database table declared
    private $db_table ='employee';
    //databse fields
    // public $id;
    // public $name;
    // public $email;
    // public $designation;
    // public $created;
    // public $result;

    

    //allows you to initialize an object's properties upon creation of the object.
    public function __construct($connect){
        //$this - current object of the class
        $this->connect = $connect;
    }

    public function singleEmployee(){
        // $key = $this->getname();

        $key = $this->getname();
        $sqlQuery = "SELECT * from ".$this->db_table." WHERE name = '".$key."'";

        $record = $this->connect->query($sqlQuery);
        if(mysqli_num_rows($record)>0){

        while ($row = mysqli_fetch_array($record))
        {   
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->email = $row['email'];
            $this->designation = $row['designation'];
            $this->created = $row['created'];
        } 

    }else{
        $record = null;
    }
    return $record;
    }

    //Read
    //Get all employees to set valies
    //check if needed***
    public function getEmployees(){
        $sqlQuery = "SELECT id, name, email, designation, created FROM " . $this->db_table . "";

        $this->result = $this->connect->query($sqlQuery);
        return $this->result;
        
    }

    //Create
    public function createEmployees(){
        //$this - current object of the class
        //htmlspecialchars - Convert special characters to HTML entities
        //strip-tags - Strip HTML and PHP tags from a string
        // $this->name = htmlspecialchars(strip_tags($this->name));
        // $this->email=htmlspecialchars(strip_tags($this->email));
        // $this->designation=htmlspecialchars(strip_tags($this->designation));
        // $this->created=htmlspecialchars(strip_tags($this->created));

        //insert query
        // $sqlQuery = "INSERT INTO ". $this->db_table ." SET name = '".$this->name."',
        // email = '".$this->email."', designation = '".$this->designation."',created = '".$this->created."'";

        $sqlQuery = "INSERT INTO " .$this->db_table. " SET name = 'Grant V. Mendoza', email = 'grantvmendoza@gmail.com', designation = 'ICT', 
        created = NOW()";

        //check if connected and executed
        //$conn doesn't work so I used $this->conn
        if(mysqli_query($this->connect,$sqlQuery)){
            return true;
        }else{
            return false;
        }
            
    }

    //update employee record in
    public function updateEmployee(){
        
        //get employee data from database based on ID
        $get_sqlQuery = "select * from employee where id = ''";


        //performs a query against a database.
        $result = mysqli_query($this->connect, $get_sqlQuery); 

        //fetches a result row as an associative array, a numeric array, or both.
        while ($row = mysqli_fetch_array($result))
         {
            $name = $row['name'];
            $email = $row['email'];
            $designation = $row['designation'];
            $created = $row['created'];

            //strip html tags and converts special characters to html entities
        $this->name=htmlspecialchars(strip_tags($name));
        $this->email=htmlspecialchars(strip_tags($$email));
        $this->designation=htmlspecialchars(strip_tags($designation));
        $this->created=htmlspecialchars(strip_tags($created));
        } 
        


        //update employee data in database
        $update_sqlQuery = "UPDATE ".$this->db_table." SET name = ".$name.", email = ".$this->email." , designation = ".$this->designation.
        ", created = NOW() WHERE id = ".$this->id." OR name = ".$this->name." OR email = ".$this->email." OR designation = ".$this->designation."";


        //check sql and conn
        if(mysqli_query($this->connect,$update_sqlQuery)){
            return true;
        }else{
            return false;
        }
    }

    public function deleteEmployee(){

        // if(isset($_GET['id'])) $id = $_GET['id'];

        $key = $this->getname();

        $sqlQuery = "DELETE FROM ".$this->db_table." WHERE name = '$key'";
        
        if(mysqli_query($this->connect,$sqlQuery)){
            return true;
        }else{
            return false;
        }
        
    }  
    
    // public function getID(){

    //     if(isset($_GET['id'])) $id = $_GET['id'];
    //     $this->id=htmlspecialchars(strip_tags($id));

    //     return $id;
    // }

    public function getname(){
        if(isset($_GET['name'])) $name = $_GET['name'];
        $this->id=htmlspecialchars(strip_tags($name));

        return $name;
    }
    
    // public function getemail(){
    //     if(isset($_GET['email'])) $email = $_GET['email'];
    //     $this->id=htmlspecialchars(strip_tags($email));

    //     return $email;
    // }

    // public function getdesig(){
    //     if(isset($_GET['designation'])) $designation = $_GET['designation'];
    //     $this->id=htmlspecialchars(strip_tags($designation));

    //     return $designation;
    // }
}

?>
