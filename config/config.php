<?php
$host = 'localhost'; // Dirección del servidor MySQL
$dbname = 'smartww'; // Nombre de tu base de datos
$username = 'root'; // Tu usuario de MySQL (el predeterminado en XAMPP es 'root')
$password = ''; // Tu contraseña de MySQL (por defecto es vacío en XAMPP)
$charset = 'utf8mb4';

// Configuración del DSN
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

// Opciones para la conexión PDO
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Modo de errores
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Estilo de fetch
    PDO::ATTR_EMULATE_PREPARES => false, // Prevenir problemas con las preparaciones
];

try {
    // Crear la conexión
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // Manejo de errores en la conexión
    echo "Conexión fallida: " . $e->getMessage();
}
?>
