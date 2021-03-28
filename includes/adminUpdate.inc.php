<?php

if (isset($_POST['admin-submit'])) {

  require '../includes/dbh.inc.php';

  $email = $_POST['email'];
  $rol = $_POST['rol'];
  $Voornaam = $_POST['vnaam'];
  $Achternaam = $_POST['anaam'];
  $school = $_POST['school'];
  $geboortedatum = $_POST['gbdatum'];
  $telefoon = $_POST['telefoon'];

  $sql = "UPDATE users SET Voornaam = '$Voornaam', Achternaam = '$Achternaam', School = '$school', Geboortedatum = '$geboortedatum', Telefoonnummer = '$telefoon', Rol = '$rol'  WHERE Email = '$email' ;";
  $stmt = $pdo->prepare($sql);
  //$sql = "UPDATE users SET `Voornaam` = '?', `Achternaam` = '?', `Email` = '?', `School` = '?', `Telefoonnummer` = '?' WHERE `users`.`ID` = $currentUser";

  if (!$pdo->prepare($sql)) {


    header("Location: ../sites/user.php?error=sqlerror");

    exit();

  }else {
    $stmt->execute();
    header("Location: ../sites/dashboard.php?succes=Succesfull");
    exit();
  }

}else{
  header("Location: ../sites/user.php");
  exit();
}


?>
