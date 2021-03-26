<?php

if (isset($_POST['evenementen-submit'])) {

  require '../includes/dbh.inc.php';

  $id = $_POST["id"];
  $naam = $_POST["naam"];
  $type = $_POST["type"];
  $datum = $_POST["datum"];
  $aantalmensen = $_POST["aantalmensen"];



  $sql = "INSERT INTO evenement (Evenement_id, Evenement_naam, Evenement_type, Max_aantal_mensen, Evenement_datum) VALUES (NULL, '$naam', '$type', '$aantalmensen', '$datum') ;";
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
else {
  header("Location: ../sites/evenementen.php");
  exit();

}
