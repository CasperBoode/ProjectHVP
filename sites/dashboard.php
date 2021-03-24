<?php
  session_start();



  if (!isset($_SESSION['userID'])) {
    header("Location: ../sites/login.php?error=notloggedin");
    exit();
  } else{

  }
  require '../includes/dbh.inc.php';

  $loggedUser = $_SESSION['userID'];

  $sql = "SELECT * from users where id = $loggedUser"; //where ID = session id
  $index_stmt = $pdo->query($sql);

  $userID = $loggedUser;
  setcookie("Cookie", $userID);

$row_count = $index_stmt->rowCount();
if ($row_count > 0) {
  // output data of each row
  foreach($pdo->query($sql) as $row) {

?>



 <!DOCTYPE html>
 <html lang="en" class="bg-dark" style="height: 90vh;">
 <head>
   <title>Vliegende Paard</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   <link rel="stylesheet" href="../stylesheets/wheel.css"/>
   <script type="text/javascript" src="../js/Winwheel.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

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
 <body style="height: 100%;">
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <a class="navbar-brand" href="#">Peerd</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
         <li class="nav-item ">
           <a class="nav-link" href="../index.php">Home </a>
         </li>
         <li>
           <a class="nav-link" href="reviews.php">Reviews </a>
         </li>
        <?php if($row["rol"] == "Beheerder"){
            echo '<li class="nav-item ">
              <a class="nav-link" href="../sites/admin.php">Admin </a>
            </li>';
          }else{

          }
          ?>

        }
         <?php if (isset($_SESSION['userID'])) {
           echo '<form action="../includes/logout.inc.php" mehtod="GET">
             <button name="logout-submit" type="submit" class="btn btn-primary">Log uit</button>
           </form>';
         } else{

         } ?>
       </ul>
     </div>
   </nav>

   <div class="container-fluid text-center" style="height: 100%;">
     <div class="row content" style="height: 100%;">
       <div class="col-sm-2 sidenav text-left">
         <div class="well">
         <p>Gebruikergegevens</p>
         <p><?php echo "Naam: " . $row["Voornaam"] . " "; ?>

         </p>
         <p>
           <?php echo "Achternaam: " . $row["Achternaam"] . " "; ?>
         </p>
         <p>
           <?php echo "Rol: " . $row["rol"] . " "; ?>
         </p>
         <p>
           <?php echo "Laadste keer gedraaid: " . $row["Date_time"] . " "; ?>
         </p>
         <a href="../sites/user.php"> naar gegevens </a>
       </div>
       <div class="well">
       <p>Inventory</p>
       <p>
      <?php




      $stmt5 = $pdo->prepare("SELECT * from inventory JOIN aanbiedingen ON inventory.a_ID = aanbiedingen.ID WHERE u_ID = ?");
      $stmt5->execute(array($userID));
      $row_count5 = $stmt5->rowCount();
       if ($row_count5 > 0) {
           while($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)) {
             echo $row5["Aanbiedings_type"] . " aantal: " . $row5["hoeveelheid"] . "</br>";
            }
          }
          else{

          }?>
        </p>
     </div>

       </div>


       <div class="col-sm-8 text-center" style="background: white;">
         <br>
         <h1>Het aanbiedingen rad</h1>
         <br />
         <table class="text-center" cellpadding="0" cellspacing="0" border="0" style="margin-left: 25%; margin-top: 10%;">
         <tr>
             <td>
                 <div class="power_controls col-sm-12">
                    <br />
                    <br />



                    <?php
                    $oneday = strtotime("-24 Hour");
                    $spinTime =  date("Y-m-d H:i:s", $oneday);
                    if($row["Date_time"] <= $spinTime && !isset($_GET["aanbieding"])){ ?>
                    <img id="spin_button" src="spin_on.png" alt="Spin" onClick="startSpin();" />
                  <?php } else { ?>
                    <img id="spin_button" src="spin_off.png" alt="Spin" onClick="none;" />
                    <?php
                  }
                     ?>

                    <br />
                 </div>
             </td>
             <td width="438" height="582" class="the_wheel" align="center" valign="center">
                 <canvas id="canvas" width="434" height="434">
                     <p style="{color: white}" align="center">Uw browser ondersteunt deze fortuin rad niet.</p>
                 </canvas>
             </td>
         </tr>
     </table>
     <script>
         // Create new wheel object specifying the parameters at creation time.
         let theWheel = new Winwheel({
             'outerRadius'     : 200,        // Set outer radius so wheel fits inside the background.
             'innerRadius'     : 55,         // Make wheel hollow so segments don't go all way to center.
             'textFontSize'    : 20,         // Set default font size for the segments.
             'textOrientation' : 'vertical', // Make text vertial so goes down from the outside of wheel.
             'textAlignment'   : 'outer',    // Align text to outside of wheel.
             'numSegments'     : 6,         // Specify number of segments.
             'segments'        :             // Define segments including colour and text.
             [                               // font size and test colour overridden on backrupt segments.
                {'fillStyle' : '#046307', 'text' : '1'},
                {'fillStyle' : '#0000FF', 'text' : '2'},
                {'fillStyle' : '#FF0000', 'text' : '3'},
                {'fillStyle' : '#FFFF00', 'text' : '4'},
                {'fillStyle' : '#FFA500', 'text' : '5'},
                {'fillStyle' : '#967BB6', 'text' : '6'}

             ],
             'animation' :           // Specify the animation to use.
             {
                 'type'     : 'spinToStop',
                 'duration' : 10,    // Duration in seconds.
                 'spins'    : 3,     // Default number of complete spins.
                 'callbackFinished' : alertPrize,
                 'callbackSound'    : playSound,   // Function to call when the tick sound is to be triggered.
                 'soundTrigger'     : 'pin'        // Specify pins are to trigger the sound, the other option is 'segment'.
             },
             'pins' :				// Turn pins on.
             {
                 'number'     : 6,
                 'fillStyle'  : 'silver',
                 'outerRadius': 4,
             }
         });

         // Loads the tick audio sound in to an audio object.
         let audio = new Audio('tick.mp3');

         // This function is called when the sound is to be played.
         function playSound()
         {
             // Stop and rewind the sound if it already happens to be playing.
             audio.pause();
             audio.currentTime = 0;

             // Play the sound.
             audio.play();
         }

         // Vars used by the code in this page to do power controls.
         let wheelPower    = 2;
         let wheelSpinning = false;


         // -------------------------------------------------------
         // Click handler for spin button.
         // -------------------------------------------------------
         function startSpin()
         {
             // Ensure that spinning can't be clicked again while already running.
             if (wheelSpinning == false) {
                 // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                 // to rotate with the duration of the animation the quicker the wheel spins.
                 if (wheelPower == 1) {
                     theWheel.animation.spins = 3;
                 } else if (wheelPower == 2) {
                     theWheel.animation.spins = 6;
                 } else if (wheelPower == 3) {
                     theWheel.animation.spins = 10;
                 }

                 // Disable the spin button so can't click again while wheel is spinning.
                 document.getElementById('spin_button').src       = "spin_off.png";
                 document.getElementById('spin_button').className = "";

                 // Begin the spin animation by calling startAnimation on the wheel object.
                 theWheel.startAnimation();

                 // Set to true so that power can't be changed and spin button re-enabled during
                 // the current animation. The user will have to reset before spinning again.
                 wheelSpinning = true;
             }
         }
         // -------------------------------------------------------
         // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
         // -------------------------------------------------------
         function alertPrize(indicatedSegment)
         {
             // Just alert to the user what happened.
             // In a real project probably want to do something more interesting than this with the result.
             if (indicatedSegment.text == 'MIS') {
                alert("Mispoes");
                document.getElementById('spin_button').src       = "spin_off.png";
                document.getElementById('spin_button').className = "";
                window.location.href="dashboard.php?aanbieding=" + "mis";


             } else {
                document.getElementById('spin_button').src       = "spin_off.png";
                document.getElementById('spin_button').className = "";
                window.location.href="dashboard.php?aanbieding=" + indicatedSegment.text;


             }
         }


     </script>

<?php

if(isset($_GET["aanbieding"])){

 if ($_GET["aanbieding"] == "1") {
  $aanbiedingid = "1";
} elseif ($_GET["aanbieding"] == "2") {
  $aanbiedingid = "2";
} elseif ($_GET["aanbieding"] == "3") {
  $aanbiedingid = "3";
} elseif ($_GET["aanbieding"] == "4") {
  $aanbiedingid = "4";
} elseif ($_GET["aanbieding"] == "5") {
  $aanbiedingid = "5";
} elseif ($_GET["aanbieding"] == "6") {
  $aanbiedingid = "6";
}} else {

}




$oneday = strtotime("-24 Hour");
$spinTime =  date("Y-m-d H:i:s", $oneday);


  if(isset($_GET["mis"])){
    $curTime = date("Y-m-d H:i:s");
    $stmt4 = $pdo->prepare("UPDATE users set date_time = ? where ID = ?");
    $stmt4->execute(array($curTime, $loggedUser));
  }
  elseif(isset($_GET["aanbieding"]) && ($_GET["aanbieding"] !== "mis") && ($row["Date_time"] <= $spinTime)){

    $curTime = date("Y-m-d H:i:s");
    // invetory add
    $count = 0;
    ////$check = mysqli_query($conn, $aanbiedingCheckSql);

    $stmt34 = $pdo->prepare("SELECT count(a_ID) FROM inventory where a_ID = ?");
    $stmt34->execute(array($aanbiedingid));
    $row_count34 = $stmt34->rowCount();
     if ($row_count34 > 0) {
         while($row34 = $stmt34->fetch(PDO::FETCH_ASSOC)) {
           $count = $row34["count(a_ID)"];
    }}


    // $row34 = $check->fetch_assoc();
    // $patatje = $row34[0];
    ////echo $check->fetch_assoc()['a_ID'] . "eeeeeeeeeeeeeeeeeeee";
    echo $count;
    if($count >= 1){ //count(array)

      $stmt3 = $pdo->prepare("UPDATE inventory set hoeveelheid = hoeveelheid + 1 where u_ID = ? and a_ID = ?;");


      //$sql3 = "UPDATE inventory set hoeveelheid = hoeveelheid + 1 where u_ID = '$loggedUser' and a_ID = $aanbiedingid;";
  } else {
      $stmt3 = $pdo->prepare("INSERT INTO inventory (ID, u_ID, a_ID, aanbieding, hoeveelheid) VALUES (NULL, ?, ?, (SELECT Aanbiedings_type FROM aanbiedingen WHERE ID = $aanbiedingid), '1');");
      //$sql3 = "INSERT INTO inventory (ID, u_ID, a_ID, aanbieding, hoeveelheid) VALUES (NULL, '$loggedUser', $aanbiedingid, (SELECT Aanbiedings_type FROM aanbiedingen WHERE ID = $aanbiedingid), '1');";
  }
    $stmt4 = $pdo->prepare("UPDATE users set date_time = ? where ID = ? ;");
    //$sql4 = "UPDATE users set date_time = '$curTime' where ID = '$loggedUser' ;";
    if ($stmt3->execute(array($loggedUser, $aanbiedingid))) { //$stmt3->execute(array($loggedUser, $aanbiedingid)); mysqli_query($conn, $sql3)
        $stmt4->execute(array($curTime, $loggedUser));//mysqli_query($conn, $sql4);
        echo '<script>window.location="../sites/dashboard.php"</script>';
  } else
  {
    header("Location: ../sites/dashboard.php?error=sqlerror");
    exit();
  }
}else {
    // code...
  }

?>
       </div>


       <div class="col-sm-2 sidenav">
         <div class="well overflow-auto">
           <p>Updates</p>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FHetVliegendePaard&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="100%" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>         </div>
         <div class="well">
           <p>Evenementen</p>
           <p><?php
           $stmt1 = $pdo->prepare("SELECT * from evenement order by evenement_datum ");
           $stmt1->execute();
           $row_count1 = $stmt1->rowCount();
            if ($row_count1 > 0) {
                while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
           echo $row1["Evenement_naam"] . " Datum: " . $row1["Evenement_datum"] . "</br>"; }?></p>
         </div>
       </div>
     </div>
   </div>



  <footer class="container-fluid text-center bg-dark">
   <p>Copyright &copy; 2021, BOICT1</p>

 </footer>

 </body>
</html>
<?php

}}
  } else {
  echo "0 results";
  }
?>
