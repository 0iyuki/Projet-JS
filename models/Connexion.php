<?php
function dbConnect()
// fonction pour ce connecter a la base de donnée
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=scan;charset=utf8', 'root', '');
        return $db;
    } catch (PDOException $e) {
        echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
        exit(); // Arrêter le script en cas d'erreur de connexion
    }
}

function dbAll()
// fonction pour afficher tous les livres
{
    $db = dbConnect(); // connection a la base de donnée
    $sql = "SELECT * FROM books"; // requête sql
    $statement = $db->prepare($sql); // preparation de la requête sql

    if ($statement->execute()) { // execution de la requête sql
        return $statement->fetchAll();
    } else {
        return []; // Retourner un tableau vide en cas d'échec de l'exécution de la requête
    }
}

function deleteBook($id)
// fonction pour supprimer les livres
{
    $db = dbConnect();
    $sql = "DELETE FROM books WHERE id = :id"; // connection a la base de donnée
    $statement = $db->prepare($sql); // preparation de la requête sql
    $statement->bindParam(':id', $id, PDO::PARAM_INT); // passage de l'id en paramètre
    $statement->execute(); // execution de la requête sql
}

function addBook($name, $author, $date, $genre, $summary)
// fonction pour ajouter un livre
{
    $db = dbConnect();
    $sql = "INSERT INTO books (name, author, date, genre, summary) VALUES (:name, :author, :date, :genre, :summary)";
    $statement = $db->prepare($sql);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':author', $author, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->bindParam(':genre', $genre, PDO::PARAM_STR);
    $statement->bindParam(':summary', $summary, PDO::PARAM_STR);
    $statement->execute();
}

function updateBook($id, $name, $author, $date, $genre, $summary)
{
    $db = dbConnect();
    $sql = "UPDATE books SET name = :name, author = :author, date = :date, genre = :genre, summary = :summary WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':author', $author, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->bindParam(':genre', $genre, PDO::PARAM_STR);
    $statement->bindParam(':summary', $summary, PDO::PARAM_STR);
    $statement->execute();
}

function getBookDetails($id)
{
    $db = dbConnect();
    $sql = "SELECT * FROM books WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}