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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register-submit'])) {
    createUserRow();
    $_POST = null;
}
?>

<html>
  <body>
    <form method="POST" action="Register.php">
      Email: <input type="text" name="email"><br>
      Password: <input type="password" name="password"><br>
      Username: <input type="text" name="nickname"><br>
      <input type="submit" value="Register">
    </form>
  </body>
</html>
