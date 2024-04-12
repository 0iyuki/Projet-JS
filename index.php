<?php
require("./controllers/controller.php");

// Vérification si une page est définie dans l'URL et si elle n'est pas vide
if (isset($_GET["page"]) && !empty($_GET["page"])) {
    // Récupération de la page demandée depuis l'URL
    $page = htmlspecialchars($_GET["page"]);

    // Traitement en fonction de la page demandée
    if ($page == "Accueil") {
        // Affichage de la page d'accueil
        DisplayHome();
    } else if ($page == "Consultation") {
        // Vérification si une action de suppression est demandée et si l'ID du livre à supprimer est défini
        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_POST['delete_id'])) {
            // Appel de la fonction de suppression avec l'ID du livre à supprimer
            delete($_POST['delete_id']);
        }
        // Affichage de la page de consultation des livres
        DisplayBooks();
    } else if ($page == "Ajouter") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $name = $_POST["name"];
            $author = $_POST["author"];
            $date = $_POST["date"];
            $genre = $_POST["genre"];
            $summary = $_POST["summary"];

            // Appeler la fonction pour ajouter le livre
            addBook($name, $author, $date, $genre, $summary);

            // Rediriger vers la page de consultation après l'ajout du livre
            header("Location: index.php?page=Consultation");
            exit();
        } else {
            // Afficher le formulaire d'ajout de livre
            require("./views/Ajouter.php");
        }
    }
    // Ajouter la gestion de la page "Modifier"
    else if ($page == "Modifier") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Vérifier si toutes les données nécessaires sont présentes
            if (isset($_POST['id'], $_POST['name'], $_POST['author'], $_POST['date'], $_POST['genre'], $_POST['summary'])) {
                // Récupérer les données du formulaire de modification
                $id = $_POST['id'];
                $name = $_POST['name'];
                $author = $_POST['author'];
                $date = $_POST['date'];
                $genre = $_POST["genre"];
                $summary = $_POST['summary'];

                // Appeler la fonction pour mettre à jour le livre
                updateBook($id, $name, $author, $date, $genre, $summary);

                // Actualiser la page de consultation après la modification
                header("Location: index.php?page=Consultation");
                exit();
            } else {
                echo "Toutes les données nécessaires ne sont pas fournies pour la modification.";
            }
        } else {
            // Afficher la page de modification de livre
            require("./views/Modifier.php");
        }
    } else if ($page == '404') {
        Display404();
    }
}
