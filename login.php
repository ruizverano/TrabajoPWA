<?php
session_start();
require 'db.php';


function verificar_credenciales($usuario, $contrasena, $conn) {
    
    $stmt = $conn->prepare("SELECT usuario, contrasena, nombre FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($contrasena, $user['contrasena'])) {
            return $user;
        }
    }
    return false;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';
    $conn = require 'db.php'; 

    
    $usuario_validado = verificar_credenciales($usuario, $contrasena, $conn);

    if ($usuario_validado) {
        
        $_SESSION['usuario'] = $usuario_validado['usuario'];
        $_SESSION['nombre'] = $usuario_validado['nombre'];

        
        header("Location: dashboard.php");
        exit();
    } else {
        $error = 'Las credenciales son incorrectas.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
