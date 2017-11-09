<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="style.css" type="text/css" rel="stylesheet">
<title>Add a New Push Workout</title>
</head>
<body>
	<?php
	session_start ();
	if (! isset ( $_SESSION ['login'] ) || ! $_SESSION ['login']) {
		header ( "Location: ./Login.html" );
		die ();
	}
	?>

	<div class="newClient">
		<h1>Enter a New Push Workout</h1>
		<form action="controller.php" method="post">
			<div>
				<label for="flat_bench">Flat Bench:</label> <input
					style="width: 50px; margin: 10px;" type="text" id="flat_bench"
					name="flat_bench" required>
			</div>
			<div>
				<label for="incline_bench">Incline Bench:</label> <input
					style="width: 50px; margin: 10px;" type="text" id="incline_bench"
					name="incline_bench" required>
			</div>
			<div>
				<label for="tri_ext">Tricep Extension:</label> <input
					style="width: 50px; margin: 10px;" type="text" id="tri_ext"
					name="tri_ext" required>
			</div>
			<div>
				<label for="arnolds">Arnolds Press:</label> <input
					style="width: 50px; margin: 10px;" type="text" id="arnolds"
					name="arnolds" required>
			</div>
			<div>
				<label for="workout_date">Date:</label> <input style="margin: 10px;"
					type="date" id="workout_date" name="workout_date" required>
			</div>
			<br>
			<div class="button">
				<input type="hidden" name="action" value="push">
				<button type="submit">Add Workout</button>
			</div>
		</form>

	</div>
</body>
</html>