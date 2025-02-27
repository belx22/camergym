<?php

$zipFile = "isgemo.zip"; // Nom du fichier ZIP contenant ton projet Laravel
$projectName = "isgemo"; // Nom du dossier où sera extrait Laravel
$projectPath = __DIR__ . "/$projectName";

// Vérifier si le fichier ZIP existe
if (!file_exists($zipFile)) {
    die("❌ Le fichier $zipFile n'existe pas. Téléverse-le sur le serveur.\n");
}

// Étape 1 : Extraire le fichier ZIP
echo "📦 Extraction de $zipFile...\n";
$zip = new ZipArchive;
if ($zip->open($zipFile) === TRUE) {
    $zip->extractTo(__DIR__);
    $zip->close();
    echo "✅ Extraction terminée !\n";
} else {
    die("❌ Échec de l'extraction du fichier ZIP.\n");
}

// Étape 2 : Supprimer le fichier ZIP après extraction
unlink($zipFile);
echo "🗑️ Fichier ZIP supprimé après extraction.\n";

// Étape 3 : Installer les dépendances avec Composer


// Étape 4 : Copier le fichier .env et générer la clé Laravel
echo "🛠 Configuration de l'environnement...\n";
copy("$projectPath/.env.example", "$projectPath/.env");
exec("cd $projectPath && php artisan key:generate");

// Étape 5 : Configurer les permissions
echo "🔑 Configuration des permissions...\n";
exec("chmod -R 775 $projectPath/storage $projectPath/bootstrap/cache");

// Étape 6 : Exécuter les migrations
echo "📊 Exécution des migrations...\n";
exec("cd $projectPath && php artisan migrate --force");

// Étape 7 : Nettoyage du cache et des sessions
echo "🧹 Nettoyage des caches...\n";
exec("cd $projectPath && php artisan config:cache && php artisan route:cache && php artisan view:cache");

// Message final
echo "\n🎉 Déploiement réussi ! Accédez à votre site via : https://votre-domaine.com/$projectName/public\n";
?>
