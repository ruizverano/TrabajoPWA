<?php
session_start();


if (!isset($_SESSION['usuario']) || $_SESSION['rol_id'] !== 1) {
    header('Location: login.php');
    exit;
}

$mensaje = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.php'; 

    
    $nombres = filter_input(INPUT_POST, 'nombres');
    $usuario = filter_input(INPUT_POST, 'usuario');
    $rol_id = filter_input(INPUT_POST, 'rol_id', FILTER_VALIDATE_INT);
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
    $correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL);
    $telefono = filter_input(INPUT_POST, 'telefono');
    $torre = filter_input(INPUT_POST, 'torre');
    $apartamento = filter_input(INPUT_POST, 'apartamento');

    
    if ($nombres && $usuario && $rol_id && $contraseña && $correo && $torre && $apartamento) {
        try {
            
            $stmt = $conn->prepare('INSERT INTO usuarios (nombres, usuario, rol_id, contraseña_hash, correo, telefono, torre, apartamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

            
            $stmt->execute([$nombres, $usuario, $rol_id, $contraseña, $correo, $telefono, $torre, $apartamento]);

            $mensaje = 'Usuario registrado exitosamente.';
        } catch (PDOException $e) {
            $error = 'Error al registrar el usuario: ' . $e->getMessage();
        }
    } else {
        $error = 'Por favor, complete todos los campos correctamente.';
    }
}
