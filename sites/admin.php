<?php
  require '../partials/admin/_header.php';
 ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../sites/dashboard.php">Vliegend Paard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="../index.php">Home </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Users<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="aanbiedingen.php">Aanbiedingen</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="evenementen.php">Evenementen</a>
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




<div class="container-fluid text-center" style="height: 91vh;">
  <div class="row content">
    <?php
    $sql = "SELECT * from users";
    $stmt= $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row_count = $stmt->rowCount();
    if ($row_count > 0) {
        // output data of each row
      foreach($pdo->query($sql) as $row) {
      $rol = $row["rol"];
      $email = $row["Email"];
	  $voornaam = $row["Voornaam"];
	  $achternaam = $row["Achternaam"];
	  $school = $row["School"];
	  $geboortedatum = $row["Geboortedatum"];
	  $telefoon = $row["Telefoonnummer"];
      //echo $email;


          ?>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8 d-flex justify-content-center">
      <div class="col-sm-8 animate__animated animate__bounceInUp" style="margin-top:10%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <form action="../includes/adminUpdate.inc.php" method="POST">
          <div class="col-sm-12 ">
            <label for="exampleInputEmail1">Email adress:</label>
            <?php echo $email ?>
			<input name="email" type="email" class="form-control" id="exampleInoutEmail1" value="<?php echo $email ?>" style="visibility: hidden; position: absolute;">

          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom01">Voornaam</label>
            <input name="vnaam" type="text" class="form-control" id="validationCustom01" value="<?php echo $voornaam ?>">

          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom02">Achternaam</label>
            <input name="anaam" type="text" class="form-control" id="validationCustom02" value="<?php echo $achternaam ?>">

          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom04">Telefoonnummer</label>
            <input name="telefoon" type="text" class="form-control" id="validationCustom04" value="<?php echo $telefoon ?>">

          </div>
		  <div class="col-md-3 mb-3">
            <label for="validationCustom05">Geboortedatum</label>
            <input name="gbdatum" type="date" class="form-control" id="validationCustom05" value="<?php echo $geboortedatum ?>">

          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom03">Rol</label>
            <!-- <input type="text" class="form-control" id="validationCustom03" placeholder="Adress" required> -->
            <select name="rol" id="validationCustom03" value="<?php echo "$rol"; ?>" >
			<option
				selected="selected"> <?php echo "$rol"; ?>
			</option>
              <option value="Beheerder">Beheerder</option>
              <option value="Gast">Gast</option>
              <option value="Stagiar">Stagiar</option>
              <option value="Medewerker">Medewerker</option>
            </select>

          </div>
		  <div class="col-md-3 mb-3">
            <label for="validationCustom06">School</label>
            <!-- <input type="text" class="form-control" id="validationCustom03" placeholder="Adress" required> -->
            <select name="school" id="validationCustom06" value="<?php echo $school ?>">
			<option
				selected="selected"> <?php echo "$school"; ?>
			</option>
              <option value="Windesheim">Windesheim</option>
              <option value="Stenden">Stenden</option>
            </select>

          </div>

          <div class="col-md-8 md-8 text-center">
            <button name="admin-submit" type="submit" class="btn btn-primary">Update</button>
			</div>
          </form>
          <form action="../includes/adminDelete.inc.php" method="POST">
			         <button name="admin-delete" type="submit" class="btn btn-primary" onclick="return confirm('Weet je het zeker?')">Delete</button>
               <input name="email" type="email" class="form-control" id="exampleInoutEmail1" value="<?php echo $email ?>" style="visibility: hidden; position: absolute;">
			    </form>
      </div>
    </div>
    <div class="col-sm-2">
    </div>
<?php
    }};
 ?>


  </div>
</div>

<?php
  require '../partials/admin/_footer.php';
 ?>
