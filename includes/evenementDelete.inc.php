<?php

if (isset($_POST['evenementen-Delete'])) {

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
