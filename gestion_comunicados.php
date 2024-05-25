<?php
session_start();


if (!isset($_SESSION['usuario']) || $_SESSION['rol_id'] !== 1) {
    header('Location: login.php');
    exit;
}

require 'db.php';


if (isset($_POST['eliminar'])) {
    $id = $_POST['eliminar'];
    $deleteQuery = "DELETE FROM comunicados WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: gestion_comunicados.php"); 
    exit;
}


$query = "SELECT comunicados.*, usuarios.nombre AS usuario_nombre FROM comunicados JOIN usuarios ON comunicados.usuario_id = usuarios.id";
$comunicados = $conn->query($query);

include 'gestion_comunicados.html';
