<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="style.css" type="text/css" rel="stylesheet">
<title>Add New Client</title>
</head>
<body>
	<?php
	session_start ();
	if (! isset ( $_SESSION ['login'] ) || ! $_SESSION ['login']) {
		header ( "Location: ./Login.html" );
		die ();
	}
	?>

	<h1>Update Client Info</h1>
	<div class="newClient">
		<form action="controller.php" method="post">
			<div>
				<label for="phone_number">Phone Number:</label> <input
					style="width: 200px; margin: 10px;" type="text" id="phone_number"
					name="phone_number" placeholder="xxx-xxx-xxxx"
					pattern="^\d{3}-\d{3}-\d{4}$">
			</div>
			<div>
				<label for="client_weight">Weight (lbs):</label> <input
					style="width: 200px; margin: 10px;" type="text" id="client_weight"
					name="client_weight">
			</div>
			<div>
				<label for="last_talked">Last Contacted:</label> <input
					style="width: 200px; margin: 10px;" type="date" id="last_talked"
					name="last_talked">
			</div>
			<div>
				<label for="last_visit">Last Visit:</label><input
					style="margin: 10px;" type="date" id="last_visit" name="last_visit">
			</div>
			<input type="hidden" name="action" value="updateClient">
			<div class="button">
				<button type="submit">Update</button>
			</div>
		</form>

	</div>
</body>
</html>