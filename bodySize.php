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
  require_once './DataBaseAdaptor.php';
	session_start();
	if (!isset($_SESSION['login']) || !$_SESSION['login']) {
		header ( "Location: ./Login.html" );
		die;
	}
  else{
    $query = $myDatabaseFunctions->queryMeasurements($_SESSION ['client_id']);
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
  var data = <?php echo json_encode($query); ?>;
	document.getElementById("chest").placeholder = data[0].chest||0;
	document.getElementById("waist").placeholder = data[0].waist||0;

	document.getElementById("lbicep").placeholder = data[0].l_bicep||0;
	document.getElementById("rbicep").placeholder = data[0].r_bicep||0;

	document.getElementById("lleg").placeholder = data[0].l_leg||0;
	document.getElementById("rleg").placeholder = data[0].r_leg||0;
}

function update(){

	var newChest = document.getElementById("chest").value;
	var newWaist = document.getElementById("waist").value;

	var newLbicep = document.getElementById("lbicep").value;
	var newRbicep = document.getElementById("rbicep").value;

	var newLleg = document.getElementById("lleg").value;
	var newRleg = document.getElementById("rleg").value;

  updateMeasurementsToDatabase(newChest,newWaist,newLbicep,newRbicep,newLleg,newRleg);
	//set all those new data points into the DB
	//reload page to grab new points
//	window.location.reload();
}

function updateMeasurementsToDatabase(newChest,newWaist,newLbicep,newRbicep,newLleg,newRleg) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var returnValue = this.responseText.trim();
      console.log(returnValue);
      if (returnValue == 'succeeded') {
        window.location = 'bodySize.php';
      } else {
//        window.location = 'Clients.php';
      }
    }
  };
  var action = 'updateMeasurements';
  xhttp.open("POST", "controller.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("chest=" + newChest + "&waist=" + newWaist + "&l_bicep=" + newLbicep +"&r_bicep=" + newRbicep +
            "&l_leg=" + newLleg +"&r_leg=" + newRleg +"&action=" + action);
}

</script>
</body>
</html>
