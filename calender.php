<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<?php
	session_start();
	if (!isset($_SESSION['login']) || !$_SESSION['login']) {
		header ( "Location: ./Login.html" );
		die;
	}
?>
<div>
<iframe src="https://calendar.google.com/calendar/embed?src=cwkoza%40gmail.com&ctz=America/Phoenix" style="border: 0" width="800" height="600"></iframe>
</div>
</body>
</html>