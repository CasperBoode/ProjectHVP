<?php

if (isset($_POST['login-submit'])) {

  require '../includes/dbh.inc.php';

  $email = $_POST['email'];
  $pwd = $_POST['password'];

  if (empty($email) || empty($pwd)) {
    header("Location: ../sites/login.php?error=emptyfields");
    exit();
  }
  else {

    $stmt = $pdo->prepare("SELECT * FROM users WHERE Email= '$email'");

    if (!$stmt->execute()) {
      header("Location: ../sites/login.php?error=sqlerror");
      exit();
    }
    else {
      if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pwdCheck = password_verify($pwd, $row['wachtwoord']);
        if ($pwdCheck == false) {
          header("Location: ../sites/login.php?error=wrongpassword". $pwd);
          exit();
        }
        elseif ($pwdCheck == true) {
          session_start();
          $_SESSION['userID'] = $row['ID'];
          header("Location: ../sites/dashboard.php?login=succes");
          exit();
        }
        else {
          header("Location: ../sites/login.php?error=wrongpasword1");
          exit();
        }
      }
      else {
        header("Location: ../sites/login.php?error=nouser");
        exit();
      }

    }
  }
}
else {
  header("Location: ../sites/login.php");
  exit();
}
