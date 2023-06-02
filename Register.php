<?php
function createUserRow() {
    $dsn = "mysql:dbname=wa_library;port=8888;host=localhost";
    $username = "root"; 
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $pdo = new PDO($dsn, $username);

    $stmt = $pdo->prepare("CALL insert_user(?,?,?)");
    $stmt->execute([$password, $nickname, $email]);

    $pdo = null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createUserRow();
}
?>

