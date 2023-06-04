<?php
session_start();

$id = $_SESSION['id'];

header("Content-Type: application/json; charset=UTF-8");
// Connect to the database
$dsn = "mysql:dbname=wa_library;port=8888;host=localhost";
$username = "root"; 
$pdo = new PDO($dsn, $username);

// Prepare and execute the SQL statement to select all books
$stmt = $pdo->prepare("SELECT id_book, title, author, rel_date, genre, page_count, contents, coverImgString, starRating, readState FROM books WHERE id_user = ?");
$stmt->execute([$id]);

// Fetch all rows as an associative array
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convert the books array to JSON
$booksJson = json_encode($books);

// Pass the JSON data to JavaScript
echo $booksJson;
?>
