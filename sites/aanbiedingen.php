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
        <li class="nav-item active">
          <a class="nav-link" href="#">Aanbiedingen<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
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
    $sql = "SELECT * from aanbiedingen";
    $stmt = $pdo->query($sql);
    $row_count = $stmt->rowCount();
    if ($row_count > 0) {
        // output data of each row
        $result = $pdo->query($sql);
      foreach($pdo->query($sql) as $row) {
      $prijs = $row["Prijs"];
      $id = $row["ID"];
      $aanbieding = $row["Aanbiedings_type"];

      //echo $email;


          ?>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8 d-flex justify-content-center">
      <div class="col-sm-8 animate__animated animate__bounceInUp center-text" style="margin-top:10%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <h1><?php echo $id ?> </h1>
        <p>Pas hier de gegevens aan.</p>
        <hr>
        <form action="../includes/aanbiedingUpdate.inc.php" method="POST">

          <input name="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $id ?>" style="visibility: hidden; position: absolute;">


          <div class="col-md-4 mb-3">
            <label for="validationCustom03">Naam:</label>
            <input name="aanbieding" type="text" class="form-control" id="validationCustom03" placeholder="<?php echo "$aanbieding"; ?>" value="<?php echo "$aanbieding"; ?>" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom03">Prijs:</label>
            <input name="prijs" type="text" class="form-control" id="validationCustom03" placeholder="<?php echo "$prijs"; ?>" value="<?php echo "$prijs"; ?>" required>
          </div>

          <div class="col-md-4 md-3  text-center">
            <button name="aanbieding-submit" type="submit" class="btn btn-primary">Update</button>

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
