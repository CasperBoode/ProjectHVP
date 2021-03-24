<!DOCTYPE html>
<?php
session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Reviews System</title>
		<link href="../inc/css/reviews.css" rel="stylesheet" type="text/css">
	</head>
	<body>
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
<script>
const reviews_page_id = 1;
fetch("../includes/reviews.php?page_id=" + reviews_page_id).then(response => response.text()).then(data => {
	document.querySelector(".reviews").innerHTML = data;
	document.querySelector(".reviews .write_review_btn").onclick = event => {
		event.preventDefault();
		document.querySelector(".reviews .write_review").style.display = 'block';
		document.querySelector(".reviews .write_review input[name='name']").focus();
	};
	document.querySelector(".reviews .write_review form").onsubmit = event => {
		event.preventDefault();
		fetch("../includes/reviews.php?page_id=" + reviews_page_id, {
			method: 'POST',
			body: new FormData(document.querySelector(".reviews .write_review form"))
		}).then(response => response.text()).then(data => {
			document.querySelector(".reviews .write_review").innerHTML = data;
		});
	};
});
</script>

		</div>
	</body>
</html>
