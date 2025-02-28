<?php
// submit_juge.php

// Connexion à la base de données
$host = 'localhost'; // Adresse du serveur MySQL
$dbname = 'gymnastique'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupération des données du formulaire
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$profession = $_POST['profession'] ?? '';
$categorie = $_POST['categorie'] ?? '';
$discipline = $_POST['discipline'] ?? '';

// Gestion du fichier uploadé (photo de profil)
$photo = $_FILES['photo']['name'] ?? '';

// Dossier de destination pour les fichiers uploadés
$upload_dir = 'uploads/';

// Déplacer le fichier uploadé vers le dossier de destination
move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . basename($photo));

// Insertion des données dans la base de données
$sql = "INSERT INTO juges (nom, prenom, profession, categorie, discipline, photo) 
        VALUES (:nom, :prenom, :profession, :categorie, :discipline, :photo)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':profession' => $profession,
        ':categorie' => $categorie,
        ':discipline' => $discipline,
        ':photo' => $photo
    ]);

    echo "Inscription du juge réussie !";
} catch (PDOException $e) {
    die("Erreur lors de l'inscription du juge : " . $e->getMessage());
}
?>
