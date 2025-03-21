<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "testdatabase";

$conn = new mysqli($host, $username, $password, $database_name);

if (isset($_POST['login'])) {
    $email_form = $_POST['email'];
    $password_form = $_POST['password'];

    $sql_select = "SELECT * FROM users WHERE email = '$email_form'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $hashed_password = $result->fetch_assoc()['password'];
        if (password_verify($password_form, $hashed_password)) {
            echo "login data true";
        }
    }
}