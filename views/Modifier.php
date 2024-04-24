<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/Css/Style.css">
    <title>Modifier un Livre</title>
</head>

<body>
    <?php require("Menu.php"); ?>
    <h1>Modifier un Livre</h1>
    <?php
    // Vérifier si l'ID du livre à modifier est passé en paramètre
    if (isset($_GET['id'])) {
        $book_id = $_GET['id'];
        // Récupérer les détails du livre à partir de l'ID
        $book_details = getBookDetails($book_id);

        // Vérifier si le livre existe
        if ($book_details) {
    ?>
            <form class="Ajout" action="index.php?page=Modifier" method="post">
                <input class="inputAjout" type="hidden" name="id" value="<?= $book_id; ?>">
                <label for="name">Nom:</label>
                <input class="inputAjout" type="text" id="name" name="name" value="<?= htmlspecialchars($book_details['name']); ?>" required><br>
                <label for="author">Auteur:</label>
                <input class="inputAjout" type="text" id="author" name="author" value="<?= htmlspecialchars($book_details['author']); ?>" required><br>
                <label for="date">Date:</label>
                <input class="inputAjout" type="text" id="date" name="date" value="<?= date('d/m/Y'); ?>" required><br>
                <label for="genre">Genre:</label>
                <input class="inputAjout" type="text" id="genre" name="genre" value="<?= htmlspecialchars($book_details['genre']); ?>" required><br>
                <label for="summary">Résumé:</label><br>
                <textarea id="summary" name="summary" rows="4" cols="50"><?= htmlspecialchars($book_details['summary']); ?></textarea><br>
                <button type="submit">Modifier</button>
            </form>
    <?php
        } else {
            echo "Livre non trouvé.";
        }
    } else {
        echo "ID du livre non spécifié.";
    }
    ?>
</body>

</html>