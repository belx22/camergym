<?php
echo "debut operation";
$projectPath = __DIR__; // Changez si besoin

echo $projectPath;
// Vérification de l'état du dépôt Git
exec("git --version",$out);

vardump($out) ;
?>
