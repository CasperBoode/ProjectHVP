<?php

if (isset($_POST['signup-submit'])) {

  require '../includes/dbh.inc.php';

  $email = $_POST['email'];
  $pwd = $_POST['psw'];
  $Repeat = $_POST['psw-repeat'];
  $name = $_POST['name'];
  $aName = $_POST['aName'];
  $school = $_POST['school'];
  $phone = $_POST['phone'];
  $bDay = $_POST['bDay'];
  $gast = "Gast";
  $date = "2000-12-31 13:05:21";



  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../sites/register.php?error=invalidmail");
    exit();
  }
  elseif ($pwd !== $Repeat) {
    header("Location: ../sites/register.php?error=passwordcheck&email=".$email);
    exit();
  }
  else {

    $sql = "SELECT Email FROM users WHERE Email=?";
    $stmt = $pdo->prepare($sql);
    if (!$pdo->prepare($sql)) {
      header("Location: ../sites/register.php?error=sqlerror1");
      exit();
    }
    else {
      $stmt->execute(array($email));
      $row_count = $stmt->rowCount();
      if ($row_count > 0) {
        header("Location: ../sites/register.php?error=emailTaken&email=".$email);
        exit();
      }
      else {
        $sql = "INSERT INTO users (Voornaam, Achternaam, Email, School, Telefoonnummer, Geboortedatum, wachtwoord, rol, date_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = $pdo->prepare($sql);
        if (!$pdo->prepare($sql)) {
          header("Location: ../sites/register.php?error=sqlerror2");
          exit();
        }
        else {
          $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);


          $stmt->execute(array($name, $aName, $email, $school, $phone, $bDay, $hashedPwd, $gast, $date));
          header("Location: ../sites/login.php");
          exit();

        }
      }
    }

  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}
else {
  header("Location: ../sites/register.php");
  exit();

}
