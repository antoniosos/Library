<?php

session_start();

// Read the JSON data sent from JS
$data = json_decode(file_get_contents('php://input'), true);

// Extract the values from the JSON data
$title = $data['title'];
$author = $data['author'];
$rel_date = $data['rel_date'];
$genre = $data['genre'];
$page_count = $data['page_count'];
$contents = $data['contents'];
$id_user = $_SESSION['id'];
$starRating = $data['starRating'];
$readState = $data['readState'];

$dsn = "mysql:dbname=wa_library;port=8888;host=localhost";
$username = "root"; 
$pdo = new PDO($dsn, $username);

$stmt = $pdo->prepare("INSERT INTO books (title, author, rel_date, genre, page_count, contents, id_user, starRating, readState) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$title, $author, $rel_date, $genre, $page_count, $contents, $id_user, $starRating, $readState]);

// Return a response if needed
// You can echo a success message or return some data back to the JS script

?>
