<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="style.css" type="text/css" rel="stylesheet">
<title>Personal Assistants Personal Assistant</title>
</head>
<body>
<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	if (!isset($_SESSION['login']) || !$_SESSION['login']) {
		header ( "Location: ./Login.html" );
		die;
	}
	
	require_once ("./DataBaseAdaptor.php");
	$clientInfo = $myDatabaseFunctions->getClientInfo($_SESSION['client_id']);
	
	// format dates
	$date = DateTime::createFromFormat('Y-m-d', $clientInfo[0]['dob']);
	$dob = $date->format('M j, Y');
	$date = DateTime::createFromFormat('Y-m-d', $clientInfo[0]['last_talked']);
	$last_talked = $date->format('M j, Y');
	$date = DateTime::createFromFormat('Y-m-d', $clientInfo[0]['last_visit']);
	$last_visit = $date->format('M j, Y');

	echo "<h2>" . $clientInfo[0]['first_name'] . " " . $clientInfo[0]['last_name'] . "</h2>"
?>

	<table>
		<tr>
			<td>&nbsp;Phone Number&nbsp;</td>
			<td>&nbsp;<?= $clientInfo[0]['phone_number']?>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;Sex&nbsp;</td>
			<td>&nbsp;<?= $clientInfo[0]['sex']?>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;D.O.B.&nbsp;</td>
			<td>&nbsp;<?= $dob ?>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;Weight (lbs)&nbsp;</td>
			<td>&nbsp;<?= $clientInfo[0]['weight']?>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;Last Contacted&nbsp;</td>
			<td>&nbsp;<?= $last_talked ?>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;Last Visit&nbsp;</td>
			<td>&nbsp;<?= $last_visit ?>&nbsp;</td>
		</tr>
	</table>
	<br>
	
	<button onclick="update()">Update Client Info</button>
</body>
<script type="text/javascript">
	function update() {
		window.location.href = "updateClient.php";
	}
</script>
</html>