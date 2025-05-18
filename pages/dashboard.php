<?php
session_start();
require_once __DIR__ . '/../config/config.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Tableau de bord utilisateur</h2>
    <p>Bienvenue, utilisateur !</p>
    <a href="logout.php">Déconnexion</a>
</body>
</html>
