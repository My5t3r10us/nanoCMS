<?php
// Exemple de configuration pour MariaDB/MySQL
// À adapter selon votre environnement
$host = getenv('DB_HOST') ?: 'localhost';
$dbname = getenv('DB_NAME') ?: 'nanocms';
$user = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur connexion MariaDB/MySQL : ' . $e->getMessage());
}
