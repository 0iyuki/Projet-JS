<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/Css/Style.css">
    <script src="./assets/Script/ScriptFiltreRecherche.js"></script>
    <title>Epic Scan</title>
</head>

<body>
    <header>
        <h1>Epic Scan</h1>
        <nav>
            <!-- menu de navigation -->
            <ul>

                <li><a href="./index.php?page=Accueil">Accueil</a></li>
                <li><a href="./index.php?page=Consultation">Consultation</a></li>
                <li><a href="index.php?page=Ajouter" class="ajout">Ajouter un livre</a></li>
                <li><a href="./views/carousel.html">Carousel</a></li>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"><img src=".\assets\images\MagnifyingGlass.png" height="30%" width="30%"></button>
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
            </ul>
        </nav>
    </header>
</body>

</html>