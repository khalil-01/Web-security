<?php  
session_start();  

$key = openssl_random_pseudo_bytes(32); 
$iv = openssl_random_pseudo_bytes(16); 

$_SESSION['aes_key'] = $key;  
$_SESSION['aes_iv'] = $iv;  

$encryptedMessage = '';  
$decryptedMessage = '';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    if (isset($_POST['plaintext'])) {  
        $originalMessage = $_POST['plaintext'];  
        $encryptedMessage = openssl_encrypt($originalMessage, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);  
        $decryptedMessage = openssl_decrypt($encryptedMessage, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);  
    }  
}  
?>  
<?php if ($encryptedMessage): ?>  
    <p><strong>Encrypted :</strong> <?php echo base64_encode($encryptedMessage); ?></p>  
    <p><strong>Decrypted :</strong> <?php echo htmlspecialchars($decryptedMessage); ?></p>  
<?php endif; ?>  




<form method="post">  
    <label for="plaintext">agin:</label>  
    <input type="text" id="plaintext" name="plaintext" required>  
    <button type="submit">Encrypt</button>  
</form>  