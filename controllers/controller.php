<?php
require("./models/Connexion.php");
function DisplayHome()
// fonction pour afficher la page accueil
{
    $data = getAllBooks();
    require("./views/Accueil.php");
}
function DisplayBooks()
// fonction pour afficher la page de consulatation
{
    $data = getAllBooks();
    require("./views/Consultation.php");
}

function delete($id)
{
    deleteBook($id);
    header("Location: index.php?page=Consultation");
    exit();
}

function Display404()
{
    require("./views/404.php");
}
