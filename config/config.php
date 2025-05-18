<?php
// Inclusion de la configuration de la base de données
require_once __DIR__ . '/../database/database.php';
// Création de la table users si elle n'existe pas
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    role TEXT NOT NULL
)");
