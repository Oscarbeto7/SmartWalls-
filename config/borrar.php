<?php
// Incluir la conexión a la base de datos
require_once __DIR__ . '/conexion.php';

// Verificar si se ha enviado un id por GET
if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];

    // Preparar la consulta SQL para eliminar el usuario
    $query = "DELETE FROM usuarios WHERE idUsuario = :idUsuario";
    $stmt = $conexion->prepare($query);

    // Bind del parámetro para evitar inyecciones SQL
    $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir al index.php después de eliminar
        header('Location: ../public/index.php');
        exit;
    } else {
        echo "Error al eliminar el usuario.";
    }
} else {
    echo "No se ha proporcionado un ID de usuario.";
}
?>
