<?php

if (isset($_POST['user-submit'])) {

  require '../includes/dbh.inc.php';

  $email = $_POST['email'];
  $name = $_POST['name'];
  $aName = $_POST['aName'];
  $school = $_POST['school'];
  $phone = $_POST['phone'];
  session_start();
  $currentUser = $_SESSION['userID'];




  $sql = "UPDATE users SET Voornaam = '$name', Achternaam = '$aName', Email = '$email', School = '$school', Telefoonnummer = '$phone' WHERE id = '$currentUser' ;";
  $stmt = $pdo->prepare($sql);
  //$sql = "UPDATE users SET `Voornaam` = '?', `Achternaam` = '?', `Email` = '?', `School` = '?', `Telefoonnummer` = '?' WHERE `users`.`ID` = $currentUser";
  if (!$pdo->prepare($sql)) {


    header("Location: ../sites/user.php?error=sqlerror" . $currentUser);

    exit();





  }else {

    $stmt->execute();
    header("Location: ../sites/dashboard.php?succes=Succesfull");
    exit();
  }

}
else {
  header("Location: ../sites/user.php");
  exit();

}
