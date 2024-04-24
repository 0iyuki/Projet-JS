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
                </div>
            </div>
        </ul>
    </nav>
</header>
<script src="./assets/Script/ScriptFiltreRecherche.js"></script>