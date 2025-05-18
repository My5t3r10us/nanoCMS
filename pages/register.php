<?php
require_once __DIR__ . '/../config/config.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if (!empty($username) && !empty($password)) {
        $stmt = $db->prepare('SELECT id FROM users WHERE username = ?');
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            $message = 'Nom d\'utilisateur déjà pris.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $db->prepare('INSERT INTO users (username, password, role) VALUES (?, ?, ?)')->execute([$username, $hash, 'user']);
            $message = 'Inscription réussie. <a href="login.php">Connectez-vous</a>.';
        }
    } else {
        $message = 'Veuillez remplir tous les champs.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Inscription</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <button type="submit">S'inscrire</button>
    </form>
    <p style="color:red;"><?= $message ?></p>
    <a href="index.php">Retour</a>
</body>
</html>
