<?php
if (isset($_POST['admin-delete'])) {

  require '../includes/dbh.inc.php';

  $email = $_POST['email'];

  $sql = "DELETE FROM users WHERE Email = '$email';";
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

}else {
  header("Location: ../sites/dashboard.php");
  exit();
}
?>