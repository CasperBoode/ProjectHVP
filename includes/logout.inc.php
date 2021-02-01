<?php

if (isset($_GET['logout-submit'])) {
  session_start();
  session_unset();
  session_destroy();
  header("Location: ../sites/login.php?logout=succesful");
  exit();
}
else {
  header("Location: ../sites/login.php?logout=failed");
  exit();
}
