<?php
  require '../partials/register/_header.php';
 ?>
 <div class="container-fluid text-center" style="height: 91vh;">
   <div class="row content">
     <div class="col-sm-2">
     </div>
     <div class="col-sm-8 d-flex justify-content-center">
       <div class="col-sm-4 animate__animated animate__bounceInUp card" style="margin-top:20%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
         <h1>Registreren</h1>
         <p>Vul hier je gegevens in om een account aan te maken.</p>
         <hr>
         <form method="post" action="../includes/signup.inc.php" class="needs-validation" novalidate>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationCustom01">Voornaam</label>
              <input name="name" type="text" class="form-control" id="validationCustom01" placeholder="Mark" required>
              <div class="valid-feedback">
                Vul een geldige voornaam in.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustom02">Achternaam</label>
              <input name="aName" type="text" class="form-control" id="validationCustom02" placeholder="Olivantion" required>
              <div class="valid-feedback">
                Vul een geldige achternaam in.
              </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="exampleInputEmail1">Email adress</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="voorbeeld@voorbeeld.nl" required>
                <div class="invalid-feedback">
                  Kies een geldige email.
                </div>
              </div>
            </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationCustom03">School</label>
              <!-- <input type="text" class="form-control" id="validationCustom03" placeholder="Adress" required> -->
              <select name="school" id="validationCustom03" name="school">
                <option value="Windesheim">Windesheim</option>
                <option value="Stenden">Stenden</option>
                <option value="Nog1">Nog een</option>
                <option value="Nog2">Nog eentje</option>
              </select>
              <div class="invalid-feedback">
                Selecteer een school.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationCustom04">Telefoonnummer</label>
              <input name="phone" type="text" class="form-control" id="validationCustom04" placeholder="0612345678" required>
              <div class="invalid-feedback">
                Vul een geldig telefoonnummer in.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationCustom05">Geboortedatum</label>
              <input name="bDay" class="form-control" type="date" id="example-datetime-local-input">
              <div class="invalid-feedback">
                Vul een geldige geboortedatum in. DD-MM-JJJJ
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <label for="exampleInputPassword1">Wachtwoord</label>
              <input name="psw" type="password" class="form-control" id="exampleInputPassword1" placeholder="VO0rB3eLd!^%" required>
              <div class="invalid-feedback">
                Niet goed.
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <label for="exampleInputPassword1">Wachtwoord check</label>
              <input name="psw-repeat" type="password" class="form-control" id="exampleInputPassword1" placeholder="Zelfde als je vorige" required>
              <div class="invalid-feedback">
                Niet goed.
              </div>
            </div>
          </div>
          <button type="submit" name="signup-submit" class="btn btn-primary">Registreer</button>
        </form>

        <script>
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
        </script>
         <h3>al een account?</h3>
         <p>log dan <a href="../sites/login.php">hier</a> in!</p>

       </div>


     </div>
     <div class="col-sm-2">
     </div>
   </div>
 </div>
 <?php
   require '../partials/register/_footer.php';
  ?>
