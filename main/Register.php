<?php
function createUserRow() {
  $dsn = "mysql:dbname=wa_library;port=8888;host=localhost";
  $username = "root"; 
  $nickname = $_POST['nickname'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $pdo = new PDO($dsn, $username);

  $stmt1 = $pdo->prepare("CALL check_ifMailExists (?)");
  $stmt1->execute([$email]);
  
  $rowCount = $stmt1->rowCount();
  if ($rowCount == 0) {
      $stmt1->closeCursor(); // Close the result set before executing the next query

      $stmt2 = $pdo->prepare("CALL insert_user(?,?,?)");
      $stmt2->execute([$password, $nickname, $email]);
      echo "success";
  } else {
      //say that email is already being used and ask the user to log in instead
      echo "fail";
  }
}


if (isset($_POST)) {
    createUserRow();
}
?>

