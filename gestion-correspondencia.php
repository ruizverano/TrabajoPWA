<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol_id'] !== 1) {
    header('Location: login.php');
    exit;
}


require 'db.php';


if (isset($_POST['eliminar'])) {
    $id = filter_input(INPUT_POST, 'eliminar', FILTER_VALIDATE_INT);
    if ($id) {
        
        $stmt = $conn->prepare('DELETE FROM comunicaciones WHERE id = ?');
        $stmt->execute([$id]);
    }
}


$stmt = $conn->query('SELECT * FROM comunicaciones');
$comunicaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
