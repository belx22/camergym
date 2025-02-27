<?php


// Exemple : vider le cache
exec('php artisan cache:clear');

// Exemple : exécuter une migration
exec('php artisan migrate --force');

echo "Déploiement terminé";
?>
