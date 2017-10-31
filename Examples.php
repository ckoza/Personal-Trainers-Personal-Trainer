
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link href="style.css" type="text/css" rel="stylesheet" >
<title>Examples Page</title>
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
<Button onclick="pic('Bench')">Bench Press</Button>
<Button onclick="pic('Squat')">Squat</Button>
<Button onclick="pic('Lat')">Lat Pulldown</Button>
</div>
<br>
<br>
<br>
<br>
<div>
<img id="src" src="images/bench.png"/>
</div>
</body>

<script>
function pic(x){
	if(x == 'Bench'){
		document.getElementById('src').src = "images/bench.png";
		console.log("Bench");
	}
	else if(x == 'Squat'){
		document.getElementById('src').src = "images/squat.png";
		console.log("Squat");
	}
	else if(x == 'Lat'){
		document.getElementById('src').src = "images/latpulls.png";
		console.log("Lat");
	}
	else{
		//error
	}
}

</script>
</html>