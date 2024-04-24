<?php require("Menu.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre</title>
</head>

<body>
    <main>
        <h2>Ajouter un Livre</h2>
    </main>
    <form class="Ajout" action="index.php?page=Ajouter" method="post">
        <label for="name">Nom:</label>
        <input class="inputAjout" type="text" id="name" name="name" required><br>
        <label for="author">Auteur:</label>
        <input class="inputAjout" type="text" id="author" name="author" required><br>
        <label for="date">Date:</label>
        <input class="inputAjout" type="text" id="date" name="date" value="<?= date('d/m/Y'); ?>" required><br>
        <label for="genre">Genre:</label>
        <input class="inputAjout" type="text" id="genre" name="genre" required><br>
        <label for="summary">Résumé:</label><br>
        <textarea id="summary" name="summary" rows="4" cols="50"></textarea><br>
        <button type="submit">Ajouter</button>
    </form>
</body>

</html>