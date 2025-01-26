<?php
$host = 'localhost';       
$dbname = 'smarttw'; 
$username = 'root';     
$password = '';  

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
   // echo "Error en la conexión: " . $e->getMessage();
}
?>
