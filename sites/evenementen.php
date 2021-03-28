<?php
  require '../partials/admin/_header.php';
 ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../sites/dashboard.php">Peerd</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="../index.php">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aanbiedingen.php">Aanbiedingen</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Evenementen<span class="sr-only">(current)</span></a>
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
  <div class="col-sm-3">
  </div>
  <div class="row">
    <div class="col-sm-8 animate__animated animate__bounceInUp center-text" style="margin-top:10%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
      <h1>Nieuw evenement aanmaken </h1>
      <p>Maak hier een nieuw evenement aan!</p>
      <hr>
      <form action="../includes/evenementInsert.inc.php" method="POST">

        <input name="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="" style="visibility: hidden; position: absolute;">


        <div class="col-md-4 mb-3">
          <label for="validationCustom03">Naam:</label>
          <input name="naam" type="text" class="form-control" id="validationCustom03" placeholder="" value="" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationCustom03">Type:</label>
          <input name="type" type="text" class="form-control" id="validationCustom03" placeholder="" value="" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationCustom03">Max aantal mensen:</label>
          <input name="aantalmensen" type="text" class="form-control" id="validationCustom03" placeholder="" value="" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationCustom03">Datum:</label>
          <input name="datum" type="date" class="form-control" id="validationCustom03" placeholder="" value="" required>
        </div>

        <div class="col-md-4 md-3  text-center">
          <button name="evenementen-submit" type="submit" class="btn btn-primary">Aanmaken</button>

        </div>
        </form>
    </div>
  </div>
<div class="container-fluid text-center" style="height: 91vh;">
  <div class="row content">
    <?php
    $sql = "SELECT * from evenement";
    $stmt = $pdo->query($sql);
    $row_count = $stmt->rowCount();
    if ($row_count > 0) {
        // output data of each row
        $result = $pdo->query($sql);
      foreach($pdo->query($sql) as $row) {
        $id = $row["Evenement_id"];
        $naam = $row["Evenement_naam"];
        $Type = $row["Evenement_type"];
        $aantalmensen = $row["Max_aantal_mensen"];
        $datum = $row["Evenement_datum"];

      //echo $email;


          ?>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8 d-flex justify-content-center">
      <div class="col-sm-8 animate__animated animate__bounceInUp center-text" style="margin-top:10%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

        <form action="../includes/evenementDelete.inc.php" method="POST">
             <button name="evenementen-Delete" type="submit" class="btn btn-primary" style="background-color: red; border: 1px red; float: right; margin-top: 1%;" onclick="return confirm('<?php echo $naam ?> verwijderen?')">Delete</button>
             <input name="id" type="text" class="form-control" id="id" value="<?php echo $id ?>" style="visibility: hidden; position: absolute;">
        </form>

        <h1><?php echo $naam ?> </h1>
        <p>Pas hier het evenement aan.</p>
        <hr>

        <form action="../includes/evenementUpdate.inc.php" method="POST">

          <input name="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $id ?>" style="visibility: hidden; position: absolute;">


          <div class="col-md-4 mb-3">
            <label for="validationCustom03">Naam:</label>
            <input name="naam" type="text" class="form-control" id="validationCustom03" placeholder="<?php echo "$naam"; ?>" value="<?php echo "$naam"; ?>" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom03">Type:</label>
            <input name="type" type="text" class="form-control" id="validationCustom03" placeholder="<?php echo "$Type"; ?>" value="<?php echo "$Type"; ?>" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom03">Max aantal mensen:</label>
            <input name="aantalmensen" type="text" class="form-control" id="validationCustom03" placeholder="<?php echo "$aantalmensen"; ?>" value="<?php echo "$aantalmensen"; ?>" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom03">Datum:</label>
            <input name="datum" type="date" class="form-control" id="validationCustom03" placeholder="<?php echo "$datum"; ?>" value="<?php echo "$datum"; ?>" required>
          </div>

          <div class="col-md-4 md-3  text-center">
            <button name="evenementen-submit" type="submit" class="btn btn-primary">Update</button>

          </div>
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