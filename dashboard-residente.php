<?php
session_start();


if (!isset($_SESSION['usuario']) || $_SESSION['rol_id'] !== 3) {
    header('Location: login.php');
    exit;
}




$mensajes = [

];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Residente</title>
    <link rel="stylesheet" href="dashboard-styles3.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <img src="images/logo_empresa.png" alt="Logo de la Empresa" class="login-logo">
            <h1>Dashboard - Residente</h1>
        </header>
        <section class="content-section message-section">
            <h2>Mensajes Recibidos</h2>
            <?php foreach ($mensajes as $mensaje): ?>
                <div class="message">
                    <div class="message-meta">
                        <span class="message-date"><?= $mensaje['fecha'] ?></span>
                        <span class="message-sender"><?= $mensaje['remite'] ?></span>
                    </div>
                    <h3 class="message-subject"><?= $mensaje['asunto'] ?></h3>
                    <p class="message-body"><?= $mensaje['mensaje'] ?></p>
                </div>
            <?php endforeach; ?>
            <?php if (empty($mensajes)): ?>
                <p class="no-messages">No hay mensajes disponibles.</p>
            <?php endif; ?>
        </section>
        <form action="logout.php" method="post">
            <button type="submit" class="logout-button">Cerrar sesión</button>
        </form>
        <footer class="dashboard-footer">
            <p>&copy; 2024 Llanura P.H. Todos los derechos reservados. Juan Carlos Alvarado Garzón</p>
        </footer>
    </div>
</body>
</html>
