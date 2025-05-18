<?php
session_start();

// Routage simple
$page = $_GET['page'] ?? 'home';
if ($page === 'home') {
    // Page d'accueil
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Accueil - nanoCMS</title>
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body>
        <h1>Bienvenue sur nanoCMS</h1>
        <a href="?page=login">Connexion</a> | <a href="?page=register">Inscription</a>
    </body>
    </html>
    <?php
    exit();
}

// Redirection selon le rôle
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin' && $page === 'admin') {
        require __DIR__ . '/admin/admin.php';
        exit();
    } elseif ($_SESSION['role'] === 'user' && $page === 'dashboard') {
        require __DIR__ . '/pages/dashboard.php';
        exit();
    }
}

// Routage dynamique
$tryPaths = [
    __DIR__ . '/pages/' . $page . '.php',
    __DIR__ . '/admin/' . $page . '.php',
];

// Gestion des sous-dossiers (ex: ?page=admin/users)
if (strpos($page, '/') !== false) {
    $segments = explode('/', $page, 2);
    $tryPaths[] = __DIR__ . '/' . $segments[0] . '/' . $segments[1] . '.php';
}

$found = false;
foreach ($tryPaths as $path) {
    if (is_file($path)) {
        require $path;
        $found = true;
        break;
    }
}
if (!$found) {
    http_response_code(404);
    echo '<h1>404 - Page non trouvée</h1>';
}

