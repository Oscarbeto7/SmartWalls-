<?php
include "../config/conexion.php";
session_start();

if (isset($_GET['id'])) {
    $idNoticia = $_GET['id'];

    // Eliminar la noticia
    $sql = "DELETE FROM noticias WHERE idNoticias = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $idNoticia, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Registrar la eliminación en la tabla `cambios`
        $sqlCambio = "INSERT INTO cambios (fecha, pagina) VALUES (NOW(), :pagina)";
        $stmtCambio = $conexion->prepare($sqlCambio);
        $stmtCambio->execute([':pagina' => $idNoticia]);

        header("Location: noticias.php?msg=Noticia eliminada correctamente");
    } else {
        echo "Error al eliminar la noticia.";
    }
}
?>
