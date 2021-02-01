<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "a";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
  die("Connectie Mislukt: ".mysqli_connect_error());
}
