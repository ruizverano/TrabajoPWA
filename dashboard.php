<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol_id'] !== 1) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>SuperAdministrador</title>
    <link rel="stylesheet" href="dashboard-styles.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="dashboard-container">
        <header class="logo-container">
            <img src="images/logo_empresa.png" alt="Logo de la Empresa" class="login-logo">
            <h1>Llanura P.H - Panel de SuperAdministrador</h1>
        </header>
        <main>
            <h2>¿Qué desea hacer?</h2>
            <div class="options-container">
                <a href="gestion-usuarios.html" class="dashboard-option">Gestión de Usuarios</a>
                <a href="gestion-correspondencia.html" class="dashboard-option">Gestión de Correspondencia</a>
            </div>
        </main>
        <footer>
            <form action="logout.php" method="post">
                <button type="submit" class="logout-button">Cerrar sesión</button>
            </form>
            <p>&copy; 2024 Llanura P.H. Todos los derechos reservados. Juan Carlos Alvarado Garzón</p>
        </footer>
    </div>
</body>

</html>