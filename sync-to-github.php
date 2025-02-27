<?php
echo "debut operation";
$projectPath = __DIR__; // Changez si besoin

echo $projectPath;
// Vérification de l'état du dépôt Git
exec("cd $projectPath && git status --porcelain", $output);

echo $output;
?>
