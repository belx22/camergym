<?php
if ($_GET['token'] !== 'votre_token_secret') {
    die('Accès interdit');
}

// Exemple : vider le cache
exec('php artisan cache:clear');

// Exemple : exécuter une migration
exec('php artisan migrate --force');

echo "Déploiement terminé";
?>
