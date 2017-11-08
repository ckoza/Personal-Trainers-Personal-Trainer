<!DOCTYPE html>
<!-- Author: Carson Koza -->
<html>
<head>
<meta charset="UTF-8">
<meta name="google-signin-client_id" content="1019396401836-pb91nphffsjarbkstvhd8vuuukgv199c.apps.googleusercontent.com">
<link href="mainStyle.css" type="text/css" rel="stylesheet" >
<title>Personal Trainer's Personal Assistant</title>
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
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

<header><h2 class="headfoot">Personal Trainers Personal Assistant</h2></header>

<div class="main">
<button onclick="clients()">View Clients</button>
<button onclick="newClient()">Add New Client</button>
<button onclick="calendar()">View Calender</button>
<button onclick="bodySize()">Measurements</button>
<button onclick="examples()">View Examples</button>

<form action="controller.php" method="post">
<button href="Login.html" name="action" value="logout" onclick="signOut();" name="action" value="logout">Log Out</button>
</form>
<!-- <p>
<?php
print_r($_SESSION['email']);
echo "The user is ";
?>
</p> -->
<script>
function clients(){
	document.getElementById('section').src = "Clients.php";
}
function newClient(){
	document.getElementById('section').src = "newClient.php";
}
function calendar(){
	document.getElementById('section').src = "calender.php";
}
function examples(){
	document.getElementById('section').src = "Examples.php";
}
function bodySize(){
	document.getElementById('section').src = "bodySize.php";
}
</script>

<script>
function onLoad() {
		 gapi.load('auth2', function() {
			 gapi.auth2.init();
		 });
	 }
function signOut() {
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function () {
		auth2.disconnect();  //revoke authorization, prevent auto-login
		console.log('User signed out.');
	});
}
</script>
</div>
<iframe id="section" src="Clients.php"></iframe>
<footer><h3 class="headfoot">Fitness Bros</h3></footer>
</body>
</html>
