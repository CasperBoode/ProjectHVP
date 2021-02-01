<?php

if (isset($_POST['admin-submit'])) {

  require '../includes/dbh.inc.php';

  $email = $_POST['email'];
  $rol = $_POST['Rol'];


  $stmt = mysqli_stmt_init($conn);
  $sql = "UPDATE users SET Rol = '$rol' WHERE Email = '$email' ;";
  //$sql = "UPDATE users SET `Voornaam` = '?', `Achternaam` = '?', `Email` = '?', `School` = '?', `Telefoonnummer` = '?' WHERE `users`.`ID` = $currentUser";
  if (!mysqli_stmt_prepare($stmt, $sql)) {


    header("Location: ../sites/user.php?error=sqlerror");

    exit();





  }else {
    mysqli_stmt_execute($stmt);
    header("Location: ../sites/dashboard.php?succes=Succesfull");
    exit();
  }

}
else {
  header("Location: ../sites/user.php");
  exit();

}
