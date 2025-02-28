<?php
// submit_gymnaste.php

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
$date_naissance = $_POST['date_naissance'] ?? '';
$categorie = $_POST['categorie'] ?? '';
$discipline = $_POST['discipline'] ?? '';
$club = $_POST['club'] ?? '';

// Gestion des fichiers uploadés (photo et CNI)
$photo = $_FILES['photo']['name'] ?? '';
$cni_recto = $_FILES['cni_recto']['name'] ?? '';
$cni_verso = $_FILES['cni_verso']['name'] ?? '';

// Dossier de destination pour les fichiers uploadés
$upload_dir = 'uploads/';

// Déplacer les fichiers uploadés vers le dossier de destination
move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . basename($photo));
move_uploaded_file($_FILES['cni_recto']['tmp_name'], $upload_dir . basename($cni_recto));
move_uploaded_file($_FILES['cni_verso']['tmp_name'], $upload_dir . basename($cni_verso));

// Insertion des données dans la base de données
$sql = "INSERT INTO gymnastes (nom, prenom, date_naissance, photo, cni_recto, cni_verso, categorie, discipline, club) 
        VALUES (:nom, :prenom, :date_naissance, :photo, :cni_recto, :cni_verso, :categorie, :discipline, :club)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':date_naissance' => $date_naissance,
        ':photo' => $photo,
        ':cni_recto' => $cni_recto,
        ':cni_verso' => $cni_verso,
        ':categorie' => $categorie,
        ':discipline' => $discipline,
        ':club' => $club
    ]);

    echo "Inscription du gymnaste réussie !";
} catch (PDOException $e) {
    die("Erreur lors de l'inscription du gymnaste : " . $e->getMessage());
}
?>
