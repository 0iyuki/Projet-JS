<?php require("Menu.php");?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page De Consultation</title>
    <script src="./assets/Script/ScriptFiltreRecherche.js"></script>
</head>

<body>
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Recherche</button>
        <div id="Dropdown" class="dropdown-content">
            <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
            <?php
            // Connexion à la base de données
            require_once("./models/Connexion.php");

            // Récupération des titres des livres depuis la base de données
            $books = dbAll();

            // Affichage des titres des livres dans le menu déroulant
            foreach ($books as $book) {
                echo '<a href="#">' . htmlspecialchars($book["name"]) . '</a>';
            }
            ?>
        </div>
    </div>

    <main>
        <h2>Page De Consultation</h2>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Update</th>
                    <th>Résumé</th>
                    <th>Genre</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book) : ?>
                    <tr>
                        <td><?= htmlspecialchars($book["name"]); ?></td>
                        <td><?= htmlspecialchars($book['author']); ?></td>
                        <td><?= htmlspecialchars($book['date']); ?></td>
                        <td><?= htmlspecialchars($book['summary']); ?></td>
                        <td><?= htmlspecialchars($book['genre']); ?></td>
                        <td>
                            <form action="index.php?page=Consultation&action=delete" method="post">
                                <input type="hidden" name="delete_id" value="<?= htmlspecialchars($book['id']); ?>">
                                <button type="submit">Supprimer</button>
                            </form>
                            <a class="modif" href="index.php?page=Modifier&id=<?= $book['id']; ?>">Modifier</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>