<?php
  require '../partials/login/_header.php';
 ?>


<div class="container-fluid text-center" style="height: 91vh;">
  <div class="row content">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8 d-flex justify-content-center">
      <div class="col-sm-4 animate__animated animate__bounceInUp card" style="margin-top:20%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <h1>Login</h1>
        <p>Vul hier je email adress en wachtwoord in om in te kunnen loggen.</p>
        <hr>
        <form action="../includes/login.inc.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Email adress</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="voorbeeld@voorbeeld.nl">
            <small id="emailHelp" class="form-text text-muted">We delen je gegevens met niemand.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Wachtwoord</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="VO0rB3eLd!^%">
          </div>
          <button name="login-submit" type="submit" class="btn btn-primary">Login</button>
        </form>
        <h3>Geen account?</h3>
        <p>Klik <a href="../sites/register.php">hier</a> om er een te maken</p>
      </div>


    </div>
    <div class="col-sm-2">
    </div>
  </div>
</div>


<?php
  require '../partials/login/_footer.php';
 ?>
