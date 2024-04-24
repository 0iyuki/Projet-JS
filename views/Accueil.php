
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
    <link rel="stylesheet" href="./assets/Css/Style.css">
</head>

<body>
    <?php include_once("Menu.php"); ?>

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
        </tbody>
    </table>

    <script src="/ProjetJS/assets/Script/bookTable.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const keys = [ "name", "genre", "summary" ];
            const table = document.querySelector("tbody");
            updateTable(table, keys)
        })
    </script>
</body>
</html>
</body>


</html>