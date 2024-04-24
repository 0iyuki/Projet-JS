<link rel="stylesheet" href="./assets/Css/styleF.css">
<header>
    <h1>Epic Scan</h1>
    <nav>
        <!-- menu de navigation -->
        <ul>
            <li><a href="./index.php?page=Accueil">Accueil</a></li>
            <li><a href="./index.php?page=Consultation">Consultation</a></li>
            <li><a href="index.php?page=Ajouter" class="ajout">Ajouter un livre</a></li>
            <li><a href="./views/carousel.html">Carousel</a></li>
            <li class="dropdown">
                <button onclick="myFunction()" class="myDropdown"><img src="./assets/images/MagnifyingGlass.png" class="img"></button>
                <div id="myDropdown" class="dropdown-content">
                    <!-- Champ de recherche -->
                    <input type="text" placeholder="Rechercher un livre..." id="searchInput" onkeyup="searchBooks()" class="search-input">
                </div>
            </li>
            <li><!-- Bouton d'actualisation -->
                <button onclick="window.location.reload();" class="refresh-button">Reset du Filtre</button>
            </li>
        </ul>
    </nav>
</header>

<!-- Inclure votre JavaScript -->
<script src="./assets/Script/ScriptFiltreRecherche.js"></script>
</body>

</html>