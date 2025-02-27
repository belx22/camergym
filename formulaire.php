<?php

// Chemin du projet
$repoDir = "."; // Remplacez par votre chemin réel
$branch = "main"; // Assurez-vous que c'est bien la branche principale
$logFile = $repoDir . "/sync-log.txt"; // Fichier pour suivre les actions

// Exécuter une commande shell et capturer la sortie
function runCommand($command) {
    global $logFile;
    $output = [];
    $status = 0;
    exec($command . " 2>&1", $output, $status);
    file_put_contents($logFile, date("Y-m-d H:i:s") . " - " . implode("\n", $output) . "\n", FILE_APPEND);
    return $status === 0;
}

// Se déplacer dans le dossier du projet
chdir($repoDir);

// Vérifier si des fichiers ont été modifiés
$hasChanges = trim(shell_exec("git status --porcelain"));

if ($hasChanges) {
    file_put_contents($logFile, date("Y-m-d H:i:s") . " - Modifications détectées\n", FILE_APPEND);

    // Ajouter tous les fichiers modifiés
    runCommand("git add .");

    // Faire un commit
    $commitMessage = "Mise à jour automatique depuis le serveur - " . date("Y-m-d H:i:s");
    runCommand("git commit -m \"$commitMessage\"");

    // Pousser vers GitHub
    if (runCommand("git push origin $branch")) {
        file_put_contents($logFile, date("Y-m-d H:i:s") . " - Push réussi sur GitHub\n", FILE_APPEND);
    } else {
        file_put_contents($logFile, date("Y-m-d H:i:s") . " - Erreur lors du push\n", FILE_APPEND);
    }
} else {
    file_put_contents($logFile, date("Y-m-d H:i:s") . " - Aucune modification détectée\n", FILE_APPEND);
}

?>
