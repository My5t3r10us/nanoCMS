# nanoCMS

nanoCMS est un mini-CMS PHP moderne avec authentification utilisateur/admin, panneau d'administration, routage dynamique et structure modulaire.

## Structure du projet

```
/ (racine)
├── admin/        # Interfaces d'administration
├── api/          # Endpoints API (REST, JSON, etc.)
├── assets/       # Fichiers statiques (CSS, JS, images)
├── config/       # Fichiers de configuration (config.php)
├── data/         # Données diverses (JSON, CSV, uploads...)
├── database/     # Connexion et scripts base de données
├── pages/        # Pages utilisateur (login, register, dashboard...)
├── index.php     # Routeur principal
└── README.md     # Ce fichier
```

## Installation

1. **Prérequis** : PHP 7.4+, MariaDB/MySQL, Composer (optionnel)
2. **Cloner le projet**
3. **Créer la base de données** :
   ```sql
   CREATE DATABASE nanocms;
   ```
4. **Configurer la connexion** :
   - Modifier `database/database.php` ou utiliser les variables d'environnement :
     - `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`
5. **Lancer le serveur local** :
   ```bash
   php -S localhost:8000
   ```
6. **Accéder au site** :
   - http://localhost:8000/index.php

## Fonctionnalités
- Authentification utilisateur/admin
- Routage dynamique (ajoutez des fichiers dans `pages/`, `admin/`, `api/`...)
- Panneau d'administration pour gérer le site
- Structure évolutive (ajoutez vos propres modules/pages)

## Sécurité
- Protégez vos dossiers sensibles (`config`, `database`, `data`) avec un `.htaccess` si vous utilisez Apache.
- Changez les mots de passe par défaut.

## Licence
Projet open-source, libre de droits.
