<?php
$username='root';
$password='';
try {
  $conn = new PDO('mysql:host=localhost;dbname=controle_devedores', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "conectado";
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>