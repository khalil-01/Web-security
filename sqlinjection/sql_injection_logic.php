<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "test1";

$connection = new mysqli($host,$username,$password,$database_name);

if(isset($_POST["login"])){
      $username = $_POST["username"];
      $password = $_POST["password"];

      $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? AND password = ?");  
      $stmt->bind_param("ss", $username, $password); 
      $stmt->execute();  
      $result = $stmt->get_result();  
      
      if ($result->num_rows >= 1) {  
          echo "login data true";  
      } else {  
          echo "login data false";  
      }  



        $stmt->close();  
  }  
  ?> 

