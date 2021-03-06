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
    $sql = "SELECT * FROM users WHERE Email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../sites/login.php?error=sqlerror");
      exit();
    }
    else {

      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
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
