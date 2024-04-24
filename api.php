<?php

require_once "models/Connexion.php";

$books = getAllBooks();

header('Content-Type: application/json');
echo json_encode($books, JSON_PRETTY_PRINT);
