<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol_id'] !== 2) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Administrador</title>
    <link rel="stylesheet" href="dashboard-styles2.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="dashboard-container">
        <header>
            <img src="images/logo_empresa.png" alt="Logo de la Empresa" class="login-logo">
            <h1>Dashboard - Administrador</h1>
        </header>
        <section class="message-section">
            <h2>Enviar Comunicación</h2>
            <?php if ($mensaje) : ?>
                <p class="success-message"><?= $mensaje ?></p>
            <?php endif; ?>
            <?php if ($error) : ?>
                <p class="error-message"><?= $error ?></p>
            <?php endif; ?>
            <form action="dashboard-admin.php" method="post">
                <div class="input-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" required>
                </div>
                <div class="input-group">
                    <label for="destinatario">Destinatario:</label>
                    <input type="text" id="destinatario" name="destinatario" required>
                </div>
                <div class="input-group">
                    <label for="asunto">Asunto:</label>
                    <input type="text" id="asunto" name="asunto" required>
                </div>
                <div class="input-group">
                    <label for="comunicado">Mensaje:</label>
                    <textarea id="comunicado" name="comunicado" rows="5" required></textarea>
                </div>
                <button type="submit">Enviar mensaje</button>
            </form>
        </section>
        <form action="logout.php" method="post">
            <button type="submit" class="logout-button">Cerrar sesión</button>
        </form>
        <footer class="footer">
            <p>&copy; 2024 Llanura P.H. Todos los derechos reservados. Juan Carlos Alvarado Garzón</p>
        </footer>
    </div>
</body>

</html>