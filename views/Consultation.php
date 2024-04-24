<?php require("Menu.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page De Consultation</title>
</head>

<body>
    <main>
        <h2>Page De Consultation</h2>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date</th>
                    <th>Résumé</th>
                    <th>Genre</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $books = json_decode($data, true); // Décoder la chaîne JSON en tableau associatif
                foreach ($books as $book) : ?>
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
</html>