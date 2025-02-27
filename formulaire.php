<?php


// Exemple : vider le cache
exec('composer create-project --prefer-dist laravel/laravel nom_du_projet');

// Exemple : exécuter une migration
exec('php artisan migrate --force');

echo "Déploiement terminé";
?>
