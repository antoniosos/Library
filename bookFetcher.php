<?php
// Connect to the database
$dsn = "mysql:dbname=wa_library;port=8888;host=localhost";
$username = "root"; 
$pdo = new PDO($dsn, $username);

// Prepare and execute the SQL statement to select all books
$stmt = $pdo->prepare("SELECT * FROM books");
$stmt->execute();

// Fetch all rows as an associative array
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convert the books array to JSON
$booksJson = json_encode($books);

// Pass the JSON data to JavaScript
echo "<script>var booksData = $booksJson;</script>";
?>
