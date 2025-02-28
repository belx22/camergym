<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'gymnastique';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer la liste des gymnastes
$sql = "SELECT * FROM gymnastes";
$stmt = $pdo->query($sql);
$gymnastes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Gymnastes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Liste des Gymnastes</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Catégorie</th>
                    <th>Discipline</th>
                    <th>Club</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gymnastes as $gymnaste) : ?>
                    <tr>
                        <td><?= htmlspecialchars($gymnaste['id']) ?></td>
                        <td><?= htmlspecialchars($gymnaste['nom']) ?></td>
                        <td><?= htmlspecialchars($gymnaste['prenom']) ?></td>
                        <td><?= htmlspecialchars($gymnaste['date_naissance']) ?></td>
                        <td><?= htmlspecialchars($gymnaste['categorie']) ?></td>
                        <td><?= htmlspecialchars($gymnaste['discipline']) ?></td>
                        <td><?= htmlspecialchars($gymnaste['club']) ?></td>
                        <td>
                            <a href="uploads/<?= htmlspecialchars($gymnaste['photo']) ?>" target="_blank">
                                <img src="uploads/<?= htmlspecialchars($gymnaste['photo']) ?>" alt="Photo" width="50">
                            </a>
                        </td>
                        <td>
                            <a href="modifier_gymnaste.php?id=<?= $gymnaste['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer_gymnaste.php?id=<?= $gymnaste['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce gymnaste ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
