<?php

if (isset($_POST['aanbieding-submit'])) {

  require '../includes/dbh.inc.php';

  $prijs = $_POST['prijs'];
  $aanbieding = $_POST['aanbieding'];
  $id = $_POST["id"];

  $sql = "UPDATE aanbiedingen SET prijs = '$prijs', Aanbiedings_type = '$aanbieding' WHERE id = '$id' ;";
  $stmt = $pdo->prepare($sql);
  //$sql = "UPDATE users SET `Voornaam` = '?', `Achternaam` = '?', `Email` = '?', `School` = '?', `Telefoonnummer` = '?' WHERE `users`.`ID` = $currentUser";
  if (!$pdo->prepare($sql)) {


    header("Location: ../sites/aanbiedingen.php?error=sqlerror");

    exit();





  }else {
    $stmt->execute();
    header("Location: ../sites/dashboard.php?succes=Succesfull");
    exit();
  }

}
else {
  header("Location: ../sites/aanbiedingen.php");
  exit();

}
