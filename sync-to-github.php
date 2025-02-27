<?php

// Configuration
$projectPath = __DIR__;  // Chemin du projet
$logFile = $projectPath . "/git_auto_push.log";  // Fichier de logs
$adminEmail = "bellofidele@gmail.com";  // Remplace avec ton e-mail

// Fonction pour enregistrer les logs
function logMessage($message) {
    global $logFile;
    $timestamp = date("Y-m-d H:i:s");
    file_put_contents($logFile, "[$timestamp] $message\n", FILE_APPEND);
}

// Vérification des changements
exec("cd $projectPath && git status --porcelain", $output);

if (!empty($output)) {
    logMessage("🔍 Changements détectés : " . implode(", ", $output));

    // Ajout des fichiers modifiés
    exec("cd $projectPath && git add .");

    // Récupérer la date et l'heure pour un message de commit
    $commitMessage = "Auto-commit: " . date("Y-m-d H:i:s");

    // Commit des changements
    exec("cd $projectPath && git commit -m \"$commitMessage\"");

    // Pousser sur le dépôt distant
    exec("cd $projectPath && git push origin main 2>&1", $pushOutput, $returnCode);

    if ($returnCode === 0) {
        logMessage("✅ Modifications poussées avec succès sur Git.");
        
        // Envoi d'un e-mail de notification
        $subject = "Notification Git : Commit Auto";
        $message = "Les changements ont été poussés avec succès sur le repo.\n\nDétails :\n" . implode("\n", $output);
        $headers = "From: noreply@example.com";  // Remplace avec ton domaine

        mail($adminEmail, $subject, $message, $headers);
        logMessage("📧 Notification envoyée à $adminEmail.");
    } else {
        logMessage("❌ Erreur lors du push sur Git : " . implode("\n", $pushOutput));
    }
} else {
    logMessage("ℹ️ Aucune modification détectée.");
}

?>
