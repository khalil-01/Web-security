<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "test1";

$conn = new mysqli($host, $username, $password, $database_name);

if (isset($_POST["add_comment"])) {  
    // استخدام htmlspecialchars لمنع XSS عند استقبال التعليق
    $comment = htmlspecialchars($_POST["comment"], ENT_QUOTES, 'UTF-8');
}

$username = htmlspecialchars($_GET["username"], ENT_QUOTES, 'UTF-8');
?>  


<!DOCTYPE html>  
<html lang="ar">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>الصفحة الرئيسية</title>  
</head>  
<body>  
    <h1>مرحباً <?php echo $username; ?> في الصفحة الرئيسية</h1>  

    <form action="" method="post">  
        <textarea name="comment"></textarea>  
        <input type="submit" name="add_comment" value="أضف تعليق">  
    </form>  
</body>  
</html>
