<?php
$username = htmlspecialchars($_GET["username"])
?> 

 
 <!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Home page</title>  
</head>  
<body>  
    <h1>Hello <?php echo $_GET["username"] ?>in home page</h1>  
</body>  
</html>  