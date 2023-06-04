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
    if($rowCount == 0){
    $stmt2 = $pdo->prepare("CALL insert_user(?,?,?)");
    $stmt2->execute([$password, $nickname, $email]);
    }else{
      //say that email is already been used and ask user to log in instead
      
    }
    $pdo = null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createUserRow();
}
?>

