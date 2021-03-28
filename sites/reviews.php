<?php
  require '../partials/reviews/_header.php';
 ?>

	    <nav class="navtop">
	    	<div>
	    		<h1>Reviews System</h1>
					<a class="nav-link" href="../index.php">Home </a>
					<?php
					if (isset($_SESSION['userID'])) { ?> <a class="nav-link" href="dashboard.php">Dashboard </a> <?php }
					?>
	    	</div>
	    </nav>
		<div class="content home">
			<h2>Reviews</h2>
			<p>Geef hier een review voor onze website!</p>
			<div class="reviews"></div>

			<?php
			  require '../partials/reviews/_footer.php';
			 ?>
