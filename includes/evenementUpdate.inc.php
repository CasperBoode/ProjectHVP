<?php

if (isset($_POST['evenementen-submit'])) {

  require '../includes/dbh.inc.php';

  $id = $_POST["id"];
  $naam = $_POST["naam"];
  $type = $_POST["type"];
  $datum = $_POST["datum"];
  $aantalmensen = $_POST["aantalmensen"];



  $sql = "UPDATE evenement SET Evenement_naam = '$naam', Evenement_type = '$type', Max_aantal_mensen = '$aantalmensen', Evenement_datum = '$datum' WHERE Evenement_id = '$id' ;";
  $stmt = $pdo->prepare($sql);
  //$sql = "UPDATE users SET `Voornaam` = '?', `Achternaam` = '?', `Email` = '?', `School` = '?', `Telefoonnummer` = '?' WHERE `users`.`ID` = $currentUser";
  if (!$pdo->prepare($sql)) {


    header("Location: ../sites/evenementen.php?error=sqlerror");

    exit();

  }else {
    $stmt->execute();
    header("Location: ../sites/dashboard.php?succes=Succesfull");
    exit();
  }

}
elseif (isset($_POST['evenementen-Delete'])) {

  require '../includes/dbh.inc.php';

  $id = $_POST["id"];



  $sql = "DELETE FROM evenement WHERE Evenement_id = $id;";
  $stmt = $pdo->prepare($sql);

  if (!$pdo->prepare($sql)) {


    header("Location: ../sites/evenementen.php?error=sqlerror");

    exit();

  }else {
    $stmt->execute();
    header("Location: ../sites/dashboard.php?succes=Succesfull");
    exit();
  }

}else {
  header("Location: ../sites/evenementen.php");
  exit();

}
