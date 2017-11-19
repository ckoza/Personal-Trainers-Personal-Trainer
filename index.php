<!DOCTYPE html>
<!-- Author: Carson Koza -->
<html>
<head>
<meta charset="UTF-8">
<link href="style.css" type="text/css" rel="stylesheet" >
<title>Personal Trainer's Personal Assistant</title>
</head>
<body class="body">
	<?php
	session_start();
if (isset ( $_GET ['mode'] )) {
  if ($_GET ['mode'] === 'register')
    require_once ("./RegisterTrainer.html");
  elseif ($_GET ['mode'] === 'login')
    require_once ("./Login.html");
  elseif ($_GET ['mode'] === 'main')
    require_once ("./Main.php");
} else { // default
	$_SESSION['errorMessage'] = '';
	require_once ("./Login.html");
}

?>
</body>
</html>
