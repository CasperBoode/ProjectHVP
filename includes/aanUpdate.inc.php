<?php

if (isset($_POST['aanbieding-submit'])) {

  require '../includes/dbh.inc.php';

  $prijs = $_POST['prijs'];
  $aanbieding = $_POST['aanbieding'];
  $id = $_POST["id"];


  $stmt = mysqli_stmt_init($conn);
  $sql = "UPDATE aanbiedingen SET prijs = '$prijs', Aanbiedings_type = '$aanbieding' WHERE id = '$id' ;";
  //$sql = "UPDATE users SET `Voornaam` = '?', `Achternaam` = '?', `Email` = '?', `School` = '?', `Telefoonnummer` = '?' WHERE `users`.`ID` = $currentUser";
  if (!mysqli_stmt_prepare($stmt, $sql)) {


    header("Location: ../sites/aanbiedingen.php?error=sqlerror");

    exit();





  }else {
    mysqli_stmt_execute($stmt);
    header("Location: ../sites/dashboard.php?succes=Succesfull");
    exit();
  }

}
else {
  header("Location: ../sites/aanbiedingen.php");
  exit();

}
