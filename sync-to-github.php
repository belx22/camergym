<?php

$projectPath = __DIR__; // Changez si besoin

// Vérification de l'état du dépôt Git
exec("cd $projectPath && git status --porcelain", $output);

echo $output;
?>
