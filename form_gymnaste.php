<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Gymnaste</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Inscription Gymnaste</h2>
        <form action="submit_gymnaste.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de Naissance</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" required>
            </div>
            <div class="form-group">
                <label for="cni_recto">CNI Recto</label>
                <input type="file" class="form-control" id="cni_recto" name="cni_recto" required>
            </div>
            <div class="form-group">
                <label for="cni_verso">CNI Verso</label>
                <input type="file" class="form-control" id="cni_verso" name="cni_verso" required>
            </div>
            <div class="form-group">
                <label for="categorie">Catégorie</label>
                <select class="form-control" id="categorie" name="categorie" required>
                    <option value="senior">Senior</option>
                    <option value="junior">Junior</option>
                </select>
            </div>
            <div class="form-group">
                <label for="discipline">Discipline</label>
                <select class="form-control" id="discipline" name="discipline" required>
                    <option value="GAM">GAM</option>
                    <option value="GAF">GAF</option>
                    <option value="Parkour">Parkour</option>
                    <option value="AE">AE</option>
                    <option value="RTH">RTH</option>
                </select>
            </div>
            <div class="form-group">
                <label for="club">Nom du Club</label>
                <input type="text" class="form-control" id="club" name="club" required>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
