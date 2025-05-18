<?php
session_start();
require_once __DIR__ . '/../config/config.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}
// Gestion simple des utilisateurs
$users = $db->query('SELECT id, username, role FROM users')->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panneau Admin</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Panneau d'administration</h2>
    <p>Bienvenue, <?= htmlspecialchars($_SESSION['role']) ?> !</p>
    <a href="logout.php">Déconnexion</a>
    <h3>Utilisateurs</h3>
    <table border="1">
        <tr><th>ID</th><th>Nom</th><th>Rôle</th></tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= $user['role'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
