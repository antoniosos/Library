<?php
session_start();
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //print_r($_POST);
  // Get the email and password from the POST request
  $pswd = $_POST['password'];
  $email = $_POST['email'];
 

  // Connect to the database using PDO
  $dsn = "mysql:dbname=wa_library;port=8888;host=localhost";
  $username = "root";
  $pdo = new PDO($dsn, $username);

  // Prepare and execute the SQL statement to select matching users
  $stmt = $pdo->prepare("CALL check_login(?,?)");
  $stmt->execute([$pswd, $email]);
  if($stmt->rowCount() == 1){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $id_user = $row['id_user'];
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $id_user;

    echo 'success';
  }else{
    echo 'fail';
  }
}
?>


