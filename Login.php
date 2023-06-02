<?php

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get the email and password from the POST request
  $email = $_POST['email'];
  $pswd = $_POST['password'];

  // Connect to the database using PDO
  $dsn = "mysql:dbname=wa_library;port=8888;host=localhost";
  $username = "root";
  $password = "Abcdefghij123";
  $pdo = new PDO($dsn, $username);

  // Prepare and execute the SQL statement to select matching users
  $stmt = $pdo->prepare("CALL check_login(?,?)");
  $stmt->execute([$pswd, $email]);


}
/*
<html>
  <body>
    <form method="POST" action="Login.php">
      Email: <input type="text" name="email"><br>
      Password: <input type="password" name="password"><br>
      <input type="submit" value="Login">
    </form>
    
  </body>
</html>
*/
?>


