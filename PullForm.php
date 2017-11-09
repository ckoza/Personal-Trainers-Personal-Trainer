<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="style.css" type="text/css" rel="stylesheet">
<title>Add a New Pull Workout</title>
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
		<h1>Enter a New Pull Workout</h1>
		<form action="controller.php" method="post">
			<div>
				<label for="dead_lift">Deadlift:</label> <input
					style="width: 50px; margin: 10px;" type="text" id="dead_lift"
					name="dead_lift" required>
			</div>
			<div>
				<label for="bent_row">Bent Rows:</label> <input
					style="width: 50px; margin: 10px;" type="text" id="bent_row"
					name="bent_row" required>
			</div>
			<div>
				<label for="barbell_curl">Barbell Curls:</label> <input
					style="width: 50px; margin: 10px;" type="text" id="barbell_curl"
					name="barbell_curl" required>
			</div>
			<div>
				<label for="lat">Lat Pulldown:</label> <input
					style="width: 50px; margin: 10px;" type="text" id="lat" name="lat"
					required>
			</div>
			<div>
				<label for="workout_date">Date:</label> <input style="margin: 10px;"
					type="date" id="workout_date" name="workout_date" required>
			</div>
			<br>
			<div class="button">
				<input type="hidden" name="action" value="pull">
				<button type="submit">Add Workout</button>
			</div>
		</form>

	</div>
</body>
</html>