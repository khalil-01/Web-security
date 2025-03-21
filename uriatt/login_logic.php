<?php  
$host = "localhost";  
$username = "root";  
$password = "";  
$database_name = "testdatabase";  

$conn = new mysqli($host, $username, $password, $database_name);  
if (isset($_POST["login"])) {  
    $email_form = $_POST["email"];  
    $password_form = $_POST["password"];  
    $sql_select = "SELECT * FROM users Where email ='$email_form'";  
    $result = $conn->query($sql_select);  
    $data = $result->fetch_assoc();  
    if ($result->num_rows > 1) {  
        $hashed_password = $data["password"];  
        $username = $data["username"];  
        if (password_verify($password_form, $hashed_password)) {  
            header("Location: home_page.php?username=$username");  
        } else {  
            echo "login data false";  
        }  
    }  
}  