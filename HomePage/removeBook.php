<?php
// Check if the book ID is provided
if (isset($_POST['bookId'])) {
    // Retrieve the book ID from the request
    $bookId = $_POST['bookId'];

    // Connect to the database
    $dsn = "mysql:dbname=wa_library;port=8888;host=localhost";
    $username = "root";
    $pdo = new PDO($dsn, $username);

    // Prepare and execute the SQL statement to delete the book
    $stmt = $pdo->prepare("DELETE FROM books WHERE id_book = ?");
    $stmt->execute([$bookId]);

    // Check if the deletion was successful
    if ($stmt->rowCount() > 0) {
        echo "Book removed successfully.";
    } else {
        echo "Failed to remove book.";
    }
} else {
    echo "Invalid book ID.";
}
?>
