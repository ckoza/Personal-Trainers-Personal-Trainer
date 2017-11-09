<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="style.css" type="text/css" rel="stylesheet">
<title>Add a New Leg Workout</title>
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
		<h1>Enter a New Leg Workout</h1>
		<form action="controller.php" method="post">
			<div>
				<label for="squat">Squat:</label> <input
					style="width: 50px; margin: 10px;" type="text" id="squat"
					name="squat" required>
			</div>
			<div>
				<label for="leg_press">Leg Press:</label> <input
					style="width: 50px; margin: 10px;" type="text" id="leg_press"
					name="leg_press" required>
			</div>
			<div>
				<label for="leg_ext">Leg Extension:</label> <input
					style="width: 50px; margin: 10px;" type="text" id="leg_ext"
					name="leg_ext" required>
			</div>
			<div>
				<label for="leg_curl">Leg Curls:</label> <input
					style="width: 50px; margin: 10px;" type="text" id="leg_curl"
					name="leg_curl" required>
			</div>
			<div>
				<label for="workout_date">Date:</label> <input style="margin: 10px;"
					type="date" id="workout_date" name="workout_date" required>
			</div>
			<br>
			<div class="button">
				<input type="hidden" name="action" value="leg">
				<button type="submit">Add Workout</button>
			</div>
		</form>

	</div>
</body>
</html>