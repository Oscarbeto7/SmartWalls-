<?php
session_start();
require_once '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        echo "Por favor, rellena todos los campos.";
    } else {
        $sql = "SELECT * FROM usuarios WHERE correo = :email";
        $stmt = $conexion->prepare($sql); 
        $stmt->bindParam(':email', $email);

        $stmt->execute(); 

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['pass'])) {
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['correo'];
                
                header("Location: ../src/IndexIniciados.php");
                exit();
            } else {
                echo "La contraseña o correo son incorrectos";
            }
        } else {
            echo "La contraseña o correo son incorrectos";
        }
    }
}
?>
