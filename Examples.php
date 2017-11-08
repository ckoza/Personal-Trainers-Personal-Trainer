
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
<label>Push Day:</label>
<Button onclick="pic('Bench')">Flat Bench</Button>
<Button onclick="pic('incline')">Incline Bench</Button>
<Button onclick="pic('tri')">Tricep Extension</Button>
<Button onclick="pic('arnold')">Arnolds Press</Button>

<br>

<label>&nbsp;Pull Day:</label>
<Button onclick="pic('Dead')">Deadlift</Button>
<Button onclick="pic('Row')">Bent Rows</Button>
<Button onclick="pic('curls')">Barbell Curls</Button>
<Button onclick="pic('Lat')">Lat Pulldown</Button>

<br>
<label>&nbsp;Leg Day:</label>
<Button onclick="pic('Squat')">Squat</Button>
<Button onclick="pic('press')">Leg Press</Button>
<Button onclick="pic('ext')">Leg Extension</Button>
<Button onclick="pic('legCurl')">Leg Curls</Button>


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
	switch(x)
	{
	case 'Bench':
		document.getElementById('src').src = "images/bench.png";
		break;
	case 'incline':
		document.getElementById('src').src = "images/incline.png";
		break;
	case 'tri':
		document.getElementById('src').src = "images/triceps.png";
		break;
	case 'arnold':
		document.getElementById('src').src = "images/arnolds.png";
		break;	
	case 'Dead':
		document.getElementById('src').src = "images/deadlift.png";
		break;
	case 'Row':
		document.getElementById('src').src = "images/bentrow.png";
		break;
	case 'curls':
		document.getElementById('src').src = "images/curls.png";
		break;
	case 'Lat':
		document.getElementById('src').src = "images/latpulls.png";
		break;
	case 'Squat':
		document.getElementById('src').src = "images/squat.png";
		break;
	case 'press':
		document.getElementById('src').src = "images/legpress.png";
		break;
	case 'ext':
		document.getElementById('src').src = "images/legextension.png";
		break;
	case 'legCurl':
		document.getElementById('src').src = "images/legcurls.png";
		break;
	default:
		//error
		break;
	}

}

</script>
</html>