<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="style.css" type="text/css" rel="stylesheet">
<title>Add New Client</title>
</head>
<body>
	<?php
	session_start();
	if (!isset($_SESSION['login']) || !$_SESSION['login']) {
		header ( "Location: ./Login.html" );
		die;
	}
?>

	<div class="newClient">
		<h1>Enter new client's information below</h1>
		<form action="controller.php" method="post">
			<div>
				<label for="fname">First Name:</label> <input
					style="width: 200px; margin: 10px;" type="text" id="fname"
					name="first_name" required>
			</div>
			<div>
				<label for="lname">Last Name:</label> <input
					style="width: 200px; margin: 10px;" type="text" id="lname"
					name="last_name" required>
			</div>
			<div>
				<label for="phone_number">Phone Number:</label> <input
					style="width: 200px; margin: 10px;" type="text" id="phone_number"
					name="phone_number" placeholder="xxx-xxx-xxxx" pattern="^\d{3}-\d{3}-\d{4}$" required>
			</div>
			<div>
				<label for="sex">Sex:</label> <input
					style="width: 200px; margin: 10px;" type="text" id="sex"
					name="client_sex" required>
			</div>
			<div>
				<label for="dob">Date of Birth:</label><input style="margin: 10px;"
					type="date" id="DOB" name="DOB" required>
			</div>
			<div>
				<label for="weight">Current weight (pounds):</label> <input
					style="width: 200px; margin: 10px;" type="text" id="weight"
					name="client_weight" required>
			</div>
			<input type="hidden" name="action" value="addClient">
			<div class="button">
				<button type="submit">Add new client</button>
			</div>
		</form>

	</div>
</body>
</html>