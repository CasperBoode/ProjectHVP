<?php

$sql = "SELECT * from users where id = $loggedUser"; //where ID = session id
$index_stmt = $pdo->query($sql);

$row_count = $index_stmt->rowCount();
if ($row_count > 0) {
  // output data of each row
  foreach($pdo->query($sql) as $row) {
if($row["rol"] != "Beheerder"){ header("Location: dashboard.php"); }

}
}

?>
