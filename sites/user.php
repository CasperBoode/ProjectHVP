<?php   session_start();
 require '../includes/dbh.inc.php';
  if (!isset($_SESSION['userID'])) {
    header("Location: ../sites/login.php");
    exit();
  } else{
    $loggedUser = $_SESSION['userID'];
  } ?>
<!DOCTYPE html>
<html lang="en" class="bg-dark" style="height: 100vh;">
<head>
  <title>Vliegende paard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Peerd</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="/index.php">Home </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Login<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../sites/register.php">Registreer</a>
        </li>
        <?php if (isset($_SESSION['userID'])) {
          echo '<form action="../includes/logout.inc.php" mehtod="GET">
            <button name="logout-submit" type="submit" class="btn btn-primary">Log uit</button>
          </form>';
        } else{

        } ?>

      </ul>
    </div>
  </nav>

  <?php
  $sql = "SELECT * from users WHERE id = $loggedUser ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
    $voornaam = $row["Voornaam"];
    $achternaam = $row["Achternaam"];
    $email = $row["Email"];
    $school = $row["School"];
    $telefoon = $row["Telefoonnummer"];
    }};

        ?>


<div class="container-fluid text-center" style="height: 91vh;">
  <div class="row content">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8 d-flex justify-content-center">
      <div class="col-sm-8 animate__animated animate__bounceInUp" style="margin-top:20%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <h1>Gegevens aanpassen </h1>
        <p>Pas hier je gegevens aan.</p>
        <hr>
        <form action="../includes/uUpdate.inc.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Email adress</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $email ?>">

          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom01">Voornaam</label>
            <input name="name" type="text" class="form-control" id="validationCustom01" value="<?php echo $voornaam ?>" required>

          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom02">Achternaam</label>
            <input name="aName" type="text" class="form-control" id="validationCustom02" value="<?php echo $achternaam ?>" required>

          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom04">Telefoonnummer</label>
            <input name="phone" type="text" class="form-control" id="validationCustom04" value="<?php echo $telefoon ?>" required>

          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom03">School</label>
            <!-- <input type="text" class="form-control" id="validationCustom03" placeholder="Adress" required> -->
            <select name="school" id="validationCustom03" name="school" value="<?php echo $school ?>">
              <option value="Windesheim">Windesheim</option>
              <option value="Stenden">Stenden</option>
              <option value="Nog1">Nog een</option>
              <option value="Nog2">Nog eentje</option>
            </select>

          </div>

          <div class="col-md-8 md-8 text-center">
            <button name="user-submit" type="submit" class="btn btn-primary">Update</button>

          </div>
          </form>
      </div>



    </div>
    <div class="col-sm-2">
    </div>
  </div>
</div>
<footer class="container-fluid text-center bg-dark">
  <p>Copyright (c) 2020, Jarno en Collin</p>
</footer>

</body>
</html>
