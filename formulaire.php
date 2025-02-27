<?php

// Définir les variables
$projectName = "app";
$projectPath = __DIR__ . "/$projectName";

// Étape 1 : Télécharger Laravel avec Composer
if (!is_dir($projectPath)) {
    echo "📥 Téléchargement de Laravel...\n";
    exec("composer create-project --prefer-dist laravel/laravel $projectName", $output, $returnVar);
    if ($returnVar !== 0) {
        die("❌ Échec du téléchargement de Laravel.\n");
    }
    echo "✅ Laravel installé avec succès !\n";
} else {
    echo "ℹ️ Le dossier $projectName existe déjà. Passons à l'étape suivante.\n";
}

// Étape 2 : Configurer l'environnement (.env)
echo "🛠 Configuration de l'environnement...\n";
copy("$projectPath/.env.example", "$projectPath/.env");
exec("cd $projectPath && php artisan key:generate");

// Étape 3 : Installer les dépendances
echo "📦 Installation des dépendances...\n";
exec("cd $projectPath && composer install");

// Étape 4 : Configurer les permissions (important sur un mutualisé)
echo "🔑 Configuration des permissions...\n";
exec("chmod -R 775 $projectPath/storage $projectPath/bootstrap/cache");

// Étape 5 : Exécuter les migrations de la base de données
echo "📊 Exécution des migrations...\n";
exec("cd $projectPath && php artisan migrate --force");

// Étape 6 : Démarrer Laravel (uniquement si vous avez un accès SSH et pouvez exécuter PHP)
echo "🚀 Déploiement terminé !\n";
echo "Votre application Laravel est prête.\n";

// Message final
echo "\n🎉 Déploiement réussi ! Accédez à votre site via : https://votre-domaine.com/$projectName/public\n";
?>
