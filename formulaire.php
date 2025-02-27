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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; }
        .container { max-width: 300px; margin: 100px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }
        input { width: 100%; padding: 10px; margin: 5px 0; }
        button { width: 100%; padding: 10px; background: blue; color: white; border: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
            <input type="password" name="password" placeholder="Mot de passe" required><br>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
