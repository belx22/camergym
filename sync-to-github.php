o<?php

// 📌 Configuration
$repoDir = "./";  // 🔴 Remplace avec le chemin réel de ton projet
$branch = "main"; // 🔴 Assure-toi d'utiliser la bonne branche
$logFile = $repoDir . "/git-sync.log"; // 🔴 Fichier log pour suivre l'exécution
$githubRepo = "https://belx22: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@github.com/belx22/camergym.git"; // 🔴 Remplace <TOKEN> par ton token GitHub
echo 'AAAAAAA';
// Fonction pour exécuter une commande shell et récupérer le retour
function runCommand($command) {
    global $logFile;
    $output = [];
    $status = 0;
    exec($command . " 2>&1", $output, $status);
    
    $logMessage = date("Y-m-d H:i:s") . " - CMD: $command\n" . implode("\n", $output) . "\n";
    file_put_contents($logFile, $logMessage, FILE_APPEND);
    
    return $status === 0;
}

// Aller dans le dossier du projet
chdir($repoDir);

// Vérifier si le dépôt Git est bien configuré
$remoteCheck = trim(shell_exec("git remote -v"));

if (strpos($remoteCheck, "github.com/belx22/camergym.git") === false) {
    file_put_contents($logFile, date("Y-m-d H:i:s") . " - 🚀 Ajout du dépôt GitHub...\n", FILE_APPEND);
    runCommand("git remote add origin $githubRepo");
}

// Vérifier l'état des fichiers
$hasChanges = trim(shell_exec("git status --porcelain"));

if (!empty($hasChanges)) {
    file_put_contents($logFile, date("Y-m-d H:i:s") . " - 🔄 Des modifications détectées\n", FILE_APPEND);

    // Ajouter tous les fichiers modifiés
    runCommand("git add .");

    // Faire un commit avec un message
    $commitMessage = "🔄 Auto-sync depuis serveur - " . date("Y-m-d H:i:s");
    runCommand("git commit -m \"$commitMessage\"");

    // Pousser vers GitHub
    if (runCommand("git push origin $branch")) {
        file_put_contents($logFile, date("Y-m-d H:i:s") . " - ✅ Push réussi sur GitHub\n", FILE_APPEND);
    } else {
        file_put_contents($logFile, date("Y-m-d H:i:s") . " - ❌ Erreur lors du push\n", FILE_APPEND);
    }
} else {
    file_put_contents($logFile, date("Y-m-d H:i:s") . " - ✅ Aucun changement détecté\n", FILE_APPEND);
}

?>
