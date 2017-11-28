<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="mainStyle.css" type="text/css" rel="stylesheet" >
<title>Personal Assistants Personal Assistant</title>
</head>
<body class="body">
<?php
if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
	header ( "Location: ./Login.html" );
	die;
}
?>

<header><h2 class="headfoot">Client Page</h2></header>

<div class="main">
<button onclick="home()">Home</button>
<button onclick="viewClient()">View Client Info</button>
<button onclick="viewHistory()">View History</button>
<button onclick="addWorkout()">Add Workout</button>
<button onclick="updateMeasurements()">Update Measurements</button>

<script>
function home(){
	window.location.href = "Main.php";
}
function viewClient(){
	document.getElementById('section').src = "ClientInfo.php";
}
function viewHistory(){
	document.getElementById('section').src = "Workout.php";
}
function addWorkout(){
	document.getElementById('section').src = "AddWorkout.php";
}
function updateMeasurements() {
	document.getElementById('section').src = "bodySize.php";
}
</script>
</div>
<iframe id="section" src="ClientInfo.php"></iframe>
<footer><h3 class="headfoot">Fitness Bros</h3></footer>
</body>
</html>
