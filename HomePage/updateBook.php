<?php

// Read the JSON data sent from js
$data = json_decode(file_get_contents('php://input'), true);

// Extract the values from the JSON data
$id_book = $data['id_book'];
$title = $data['title'];
$author = $data['author'];
$rel_date = $data['rel_date'];
$genre = $data['genre'];
$page_count = $data['page_count'];
$contents = $data['contents'];
$starRating = $data['starRating'];
$readState = $data['readState'];


$dsn = "mysql:dbname=wa_library;port=8888;host=localhost";
$username = "root"; 
$pdo = new PDO($dsn, $username);

$stmt = $pdo->prepare("UPDATE books SET title = ?, author = ?, rel_date = ?, genre = ?, page_count = ?, contents = ?, starRating = ?, readState = ? WHERE id_book = ?");
$stmt->execute([$title, $author, $rel_date, $genre, $page_count, $contents,$starRating, $readState, $id_book]);

?>