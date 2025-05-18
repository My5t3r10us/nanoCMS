<?php
session_start();
require_once __DIR__ . '/../config/config.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        if ($user['role'] === 'admin') {
            header('Location: admin.php');
        } else {
            header('Location: dashboard.php');
        }
        exit();
    } else {
        $message = 'Identifiants invalides';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Connexion</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <button type="submit">Se connecter</button>
    </form>
    <p style="color:red;"><?= htmlspecialchars($message) ?></p>
    <a href="index.php">Retour</a>
</body>
</html>
