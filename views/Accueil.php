<?php require("Menu.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
</head>

<body>
    <h2>Page D'Accueil</h2>
    <p>Ceci est la page d'accueil.</p>
    <h3>Votre Bibliothèque :</h3>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Genre</th>
                <th>Résumé</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $books = json_decode($data, true); // Décoder la chaîne JSON en tableau associatif
            foreach ($books as $book) : ?>
                <tr>
                    <!-- Affichage des données de chaque livre -->
                    <td><?= htmlspecialchars($book["name"]); ?></td>
                    <td><?= htmlspecialchars($book['genre']); ?></td>
                    <td><?= htmlspecialchars($book['summary']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>