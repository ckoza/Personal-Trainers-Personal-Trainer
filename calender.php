
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<?php
require_once './DataBaseAdaptor.php';
session_start ();
if (! isset ( $_SESSION ['login'] ) || ! $_SESSION ['login']) {
	header ( "Location: ./Login.html" );
	die ();
}

if (isset ( $_SESSION ['googleLogin'] ) && $_SESSION ['googleLogin'] == 'googleLogin') {
	$str = $_SESSION ['email'];
	$str = str_replace ( "@", "%40", $str );
	$str = "<iframe src=\"" . "https://calendar.google.com/calendar/embed?src=" . $str . "&ctz=America/Phoenix" . "\" style=\"border: 0\" width=\"800\" height=\"600\"></iframe>";
	echo "<div>";
	echo $str;
	echo "</div>";
} else {
	echo "<form action=\"controller.php\" method=\"post\">";
	echo "<input style=\"width: 200px; margin: 10px;\" type=\"text\" placeholder=\"Update your gmail here.\" name=\"gmail\" pattern=\".{1,}\" required>";
	echo "<input type=\"hidden\" name=\"action\" value=\"updateGmail\">";
	echo "<input style=\"width: 210px; margin: 10px;\" type=\"submit\" name=\"submit\" value=\"Update\">";
	echo "</form>";
	$user = $_SESSION ['user'];
	$gmail = $myDatabaseFunctions->getGmail ( $user );
	if (is_null ( $gmail )) {
		echo "<div>";
		echo "You haven't set up a gmail for your googleMap, please update your gmail account";
		echo "</div>";
	} else {
		$str = $gmail;
		$str = str_replace ( "@", "%40", $str );
		$str = "<iframe src=\"" . "https://calendar.google.com/calendar/embed?src=" . $str . "&ctz=America/Phoenix" . "\" style=\"border: 0\" width=\"800\" height=\"600\"></iframe>";
		echo "<div>";
		echo $str;
		echo "</div>";
	}
}
?>
</body>
</html>
