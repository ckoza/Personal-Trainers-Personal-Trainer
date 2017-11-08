<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Body Measurements</title>
</head>

<script>
var data = [
            {
            	"Chest": 40,
            	"Waist": 32,
            	"LBicep": 12,
            	"RBicep": 12,
            	"LLeg": 30,
            	"RLeg": 31
            }
            ];

</script>
<body onload="start()">
<?php
	session_start();
	if (!isset($_SESSION['login']) || !$_SESSION['login']) {
		header ( "Location: ./Login.html" );
		die;
	}
?>

<div style="width: 300px; ">

<div style="width: 180px; float: left">
<form action="" >
<br>
<br>
<br>
  <label style="display: inline-block; width: 100px; text-align: right;">Chest:</label> <input style="display: inline-block; float: right; width: 60px;" type="text" id="chest"><br>
  <br> <label style="display: inline-block; width: 100px; text-align: right;">Waist:</label> <input style="display: inline-block; float: right; width: 60px;" type="text" id="waist"><br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<br>
  <br>  <label style="display: inline-block; width: 100px; text-align: right;">L Bicep:</label> <input style="display: inline-block; float: right; width: 60px;" type="text" id="lbicep"><br>
  <br> <label style="display: inline-block; width: 100px; text-align: right;">R Bicep:</label> <input style="display: inline-block; float: right; width: 60px;" type="text" id="rbicep"><br>
  <br>
  <br>
<br>
<br>
  <br>  <label style="display: inline-block; width: 100px; text-align: right;">L Leg:</label> <input style="display: inline-block; float: right; width: 60px;" type="text" id="lleg"><br>
  <br> <label style="display: inline-block; width: 100px; text-align: right;">R Leg:</label> <input style="display: inline-block; float: right; width: 60px;" type="text" id="rleg"><br>
</form>
</div>

<div style="float: left ;">
<img width="100" height="150" src="images/Outline-body.png"/> 
<br>
<br>
<br>
<img width="100" height="150" src="images/bicep.png"/>
<br>
<br>
<br>
<img width="100" height="150" src="images/leg.png"/>
</div>

<Button style="margin: 20px; width: 80%" onclick="update()"> Update </Button>

</div>

<script>
function start(){
	//Grab the DB table and place into var data
	
	document.getElementById("chest").placeholder = data[0].Chest;
	document.getElementById("waist").placeholder = data[0].Waist;
	
	document.getElementById("lbicep").placeholder = data[0].LBicep;
	document.getElementById("rbicep").placeholder = data[0].RBicep;
	
	document.getElementById("lleg").placeholder = data[0].LLeg;
	document.getElementById("rleg").placeholder = data[0].RLeg;
}

function update(){
	
	//var str = ((document.getElementById("cal_preview")||{}).value)||"";
	
	var newChest = document.getElementById("chest").value || document.getElementById("chest").placeholder;
	var newWaist = document.getElementById("waist").value || document.getElementById("waist").placeholder;
	
	var newChest = document.getElementById("lbicep").value || document.getElementById("lbicep").placeholder;
	var newWaist = document.getElementById("rbicep").value || document.getElementById("rbicep").placeholder;

	var newChest = document.getElementById("lleg").value || document.getElementById("lleg").placeholder;
	var newWaist = document.getElementById("rleg").value || document.getElementById("rleg").placeholder;
	
	//set all those new data points into the DB
	//reload page to grab new points
	window.location.reload();
}

</script>
</body>
</html>