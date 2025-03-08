<?php  
$password = "User_Password_12345";  
$hashed_password = password_hash($password, PASSWORD_BCRYPT);  

echo $password . "<br>" . $hashed_password;  
$password_2 = "User_Password";  
echo "<br>";  
echo (var_dump(password_verify($password, $hashed_password)));  

echo "<br>";  
echo "<br>";  


$hashed_md5 = md5($password_2);  
echo $hashed_md5;  
echo "<br>";  

$hashed_sha256 = hash("sha256", $password_2);  
echo $hashed_sha256;  
echo $hashed_sha256;  
?>  