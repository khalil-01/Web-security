<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "test1";

$conn = new mysqli($host, $username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $email_form = htmlspecialchars(trim($_POST['email']));
    $password_form = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email_form);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password_form, $hashed_password)) {
            echo htmlspecialchars("Login successful! Welcome back.");
        } else {
            echo htmlspecialchars("Invalid password.");
        }
    } else {
        echo htmlspecialchars("User not found.");
    }

    $stmt->close();
}
$conn->close();
?>
