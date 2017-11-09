<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="mainStyle.css" type="text/css" rel="stylesheet" >
<title>Add a Workout</title>
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

<header><h2 class="headfoot">Add a Workout</h2></header>

<div class="main">
<button onclick="push()">Push Workout</button>
<button onclick="pull()">Pull Workout</button>
<button onclick="leg()">Leg Workout</button>

<script>
function push(){
	document.getElementById('section').src = "PushForm.php";
}
function pull(){
	document.getElementById('section').src = "PullForm.php";
}
function leg(){
	document.getElementById('section').src = "LegForm.php";
}
</script>
</div>
<iframe id="section" src="PushForm.php"></iframe>
<footer><h3 class="headfoot">Fitness Bros</h3></footer>
</body>
</html>
