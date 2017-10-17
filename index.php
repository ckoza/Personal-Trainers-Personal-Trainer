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
if (isset ( $_GET ['mode'] )) {
  if ($_GET ['mode'] === 'clients')
    require_once ("./Clients.html");
  elseif ($_GET ['mode'] === 'examples')
    require_once ("./Examples.html");
  elseif ($_GET ['mode'] === 'login')
    require_once ("./Login.html");
  elseif ($_GET ['mode'] === 'main')
    require_once ("./Main.html");
} else // default
  require_once ("./Login.html");

?>
</body>
</html>