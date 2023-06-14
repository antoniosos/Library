<?php

session_start();

// Read the JSON _POST sent from JS
//$data = json_decode(file_get_contents('php://input'), true);

// Extract the values from the JSON _POST
$title = $_POST['title'];
$author = $_POST['author'];
$rel_date = $_POST['rel_date'];
$genre = $_POST['genre'];
$page_count = $_POST['page_count'];
$contents = $_POST['contents'];
$id_user = $_SESSION['id'];
$starRating = $_POST['starRating'];
$readState = $_POST['readState'];

$dsn = "mysql:dbname=wa_library;port=8888;host=localhost";
$username = "root"; 
$pdo = new PDO($dsn, $username);

$stmt = $pdo->prepare("INSERT INTO books (title, author, rel_date, genre, page_count, contents, id_user, starRating, readState) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$title, $author, $rel_date, $genre, $page_count, $contents, $id_user, $starRating, $readState]);

// Return a response if needed
// You can echo a success message or return some data back to the JS script

?>
