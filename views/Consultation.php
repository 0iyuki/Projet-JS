
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page De Consultation</title>
    <link rel="stylesheet" href="./assets/Css/Style.css">

</head>

<body>

    <?php require("Menu.php"); ?>

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
            </tbody>
        </table>
    </main>
    
    <script src="/ProjetJS/assets/Script/bookTable.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const keys = [ "name", "author", "date", "summary", "genre", "option" ];
            const table = document.querySelector("tbody");
            updateTable(table, keys)
        })
    </script>
</body>
</html>